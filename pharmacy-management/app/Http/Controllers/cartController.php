<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function store(Request $request){
        $data =$request->validate([
            'mediaction_id'=>'required',
            'qty'=>'required'
        ]);

        $data['patient_id']=Auth::id();
        $inventory=Inventory::where('meditication_id',$data['medication_id'])->first();
        if (!$inventory) {return back()->with('error', 'Product not available in inventory');
           
        }
        if ($inventory->quatity<$data['qty']) {

            return back()->with('error', 'Insufficient stock available');
          
        }
        $cart= cart::where('patient_id',Auth::id())->where('medication_id',$data['medication_id'])->first();
        if($cart){
            $new_qty=$cart->qty+$data['qty'];
            if ($inventory->quantity < $new_qty) {
                return back()->with('error', 'Not enough stock to update the quantity');
            }
            $cart->qty =$new_qty;
            $cart->save(); return back()->with('success', 'Cart Updated successfully');
        }

        Cart::create($data);
        return back()->with('success', 'Product added to cart successfully');
    }
      public function mycart(){
        $carts=cart::where('patient_id',Auth::id())->with('medicine')->get();
        foreach ($carts as $cart) {
            if ($cart->product) { // Ensure the product relationship exists
                $price = $cart->product->discounted_price ?? $cart->product->price;
                $cart->total = $price * $cart->qty;
            } else {
                // Handle missing products if necessary (e.g., log, notify, etc.)
                $cart->total = 0;
            }
            }
            return view('pharmacist.mycart', compact('carts'));
            
        }
        public function destory($id){
            $cart = Cart::find($id);

            if ($cart && $cart->user_id == Auth::id()) {
                $cart->delete();
                return back()->with('success', 'Product removed from cart successfully');
            }
    
            return back()->with('error', 'Product not found or unauthorized action');
        }
       
    
}
