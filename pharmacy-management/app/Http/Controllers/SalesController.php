<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Inventory;
use App\Models\Medication;
use App\Models\Sale_mngt;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // Display all sales
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        // Query sales with related medication
        $query = Sale_mngt::with('medication');
    
        // Apply search filter
        if ($search) {
            $query->whereHas('medication', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            });
        }
    
        // Paginate results
        $sales = $query->paginate(5);
    
        // Return view with data
        return view('pharmacist.sales.index', compact('sales', 'search'));
    }
    

    // Create a new sale (form)
    public function create()
    {
        $medications = Medication::all(); // Fetch all medications
        return view('pharmacist.sales.create', compact('medications'));
    }

    // Store a new sale
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'medication_id' => 'required|exists:medications,id', // Check if the medication exists
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the medication's inventory
        $inventory = Inventory::where('medication_id', $request->medication_id)->first();

        // Check if there's enough stock
        if ($inventory && $inventory->quantity >= $request->quantity) {
            // Calculate total price (price per unit * quantity)
            $totalPrice = $inventory->medication->price * $request->quantity;

            // Store the sale
            Sale_mngt::create([
                'medication_id' => $request->medication_id,
                'quantity' => $request->quantity,
                'total_price' => $totalPrice,
                'sale_date' => now(),
            ]);

            // Deduct from inventory
            $inventory->quantity -= $request->quantity;
            $inventory->save();

            return redirect()->route('pharmacist.sales.index')->with('success', 'Sale recorded successfully.');
        } else {
            return redirect()->back()->withErrors('Not enough stock for the sale.');
        }
    }

    // View details of a specific sale
    public function show($id)
    {
        $sale = Sale_mngt::with('medication')->findOrFail($id); // Fetch the sale with medication details
        return view('pharmacist.sales.show', compact('sale'));
    }

    // Edit a sale (form)
    public function edit($id)
    {
        $sale = Sale_mngt::findOrFail($id); // Fetch the sale to be edited
        $medications = Medication::all(); // Fetch all medications for selection
        return view('pharmacist.sales.edit', compact('sale', 'medications'));
    }

    // Update a sale
    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'medication_id' => 'required|exists:medications,id', // Check if the medication exists
            'quantity' => 'required|integer|min:1',
        ]);

        $sale = Sale_mngt::findOrFail($id); // Fetch the sale to be updated
        $inventory = Inventory::where('medication_id', $request->medication_id)->first();

        // Calculate the difference in quantity if it’s being updated
        $quantityDifference = $request->quantity - $sale->quantity;

        // Check if enough stock is available for the updated quantity
        if ($inventory && $inventory->quantity >= $quantityDifference) {
            // Update inventory (add back previous sale quantity and deduct new quantity)
            $inventory->quantity += $sale->quantity; // Add back old sale quantity to inventory
            $inventory->quantity -= $request->quantity; // Deduct the updated quantity from inventory
            $inventory->save();

            // Update the sale
            $totalPrice = $inventory->medication->price * $request->quantity;
            $sale->update([
                'medication_id' => $request->medication_id,
                'quantity' => $request->quantity,
                'total_price' => $totalPrice,
            ]);

            return redirect()->route('pharmacist.sales.index')->with('success', 'Sale updated successfully.');
        } else {
            return redirect()->back()->withErrors('Not enough stock for the sale update.');
        }
    }

    // Delete a sale
    public function destroy($id)
    {
        $sale = Sale_mngt::findOrFail($id); // Fetch the sale to be deleted
        $inventory = Inventory::where('medication_id', $sale->medication_id)->first();

        // Add the sale's quantity back to inventory
        if ($inventory) {
            $inventory->quantity += $sale->quantity;
            $inventory->save();
        }

        // Delete the sale record
        $sale->delete();

        return redirect()->route('pharmacist.sales.index')->with('success', 'Sale deleted and stock adjusted successfully.');
    }
}


