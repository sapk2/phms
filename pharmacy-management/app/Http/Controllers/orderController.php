<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Show checkout page
    public function checkout()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('patient_id', $userId)->with('medicine')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $price = $cartItem->medicine->discounted_price ?? $cartItem->medicine->price;
            $totalPrice += $price * $cartItem->qty;
        }

        return view('pharmacist.checkout', compact('cartItems', 'totalPrice'));
    }

    // Confirm and place the order
    public function confirmOrder(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'medication_id'=>'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $userId = Auth::id();
        $cartItems = Cart::where('patient_id', $userId)->with('medicine')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty.');
        }

        // Initialize order data
        $orderData = [
            'patient_id' => $request->input('patient_id'),
            'status' => 'Pending',
            'payment_method' => $request->input('payment_method'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ];

        // Calculate total price and prepare order items
        $totalOrderPrice = 0;
        $orderItems = [];
        foreach ($cartItems as $cartItem) {
            $inventory = Inventory::where('medication_id', $cartItem->medication_id)->first();

            if (!$inventory || $inventory->quantity < $cartItem->qty) {
                return back()->with('error', 'Insufficient stock for ' . $cartItem->medicine->name);
            }

            $price = $cartItem->medicine->discounted_price ?? $cartItem->medicine->price;
            $totalPrice = $price * $cartItem->qty;
            $totalOrderPrice += $totalPrice;

            $orderItems[] = [
                'medication_id' => $cartItem->medication_id,
                'qty' => $cartItem->qty,
                'price' => $price
            ];
        }

        // Save order and order items
        $order = Order::create(array_merge($orderData, ['price' => $totalOrderPrice]));

        foreach ($orderItems as $orderItem) {
            // Attach medication to order (assuming you have a many-to-many relationship)
            $order->medications()->attach($orderItem['medication_id'], [
                'qty' => $orderItem['qty'],
                'price' => $orderItem['price']
            ]);

            // Update inventory
            $inventory = Inventory::where('medication_id', $orderItem['medication_id'])->first();
            $inventory->quantity -= $orderItem['qty'];
            $inventory->save();
        }

        // Clear the cart
        Cart::where('user_id', $userId)->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully');
    }

    // Show all orders
    public function index()
    {
        $orders = Order::latest()->get();
        return view('pharmacist.orders.index', compact('orders'));
    }

    // Update order status
    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();

        // Send mail to user
        $data = [
            'name' => $order->name,
            'status' => $status,
        ];
        Mail::send('mail.order', $data, function ($message) use ($order) {
            $message->to($order->email, $order->name)
                ->subject('Order Status');
        });

        return back()->with('success', 'Order is now ' . $status);
    }
}
