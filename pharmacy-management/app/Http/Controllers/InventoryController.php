<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Medication;

class InventoryController extends Controller
{
    public function  index(){
        $inventory= Inventory::with('medication')->get();
        return view('pharmacist.inventory.index',compact('inventory'));
    }
    public function create(){
        $medication=Medication::all();
        return view('pharmacist.inventory.create',compact('medication'));
    }
    public function store(Request $request){
        $request->validate([
            'medication_id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);
    
        Inventory::create($request->all());
        return redirect()->route('pharmacist.inventory.create')->with('success', 'Inventory is created successfully!');
    }
    
    public function edit($id){
        $inventory=Inventory::findorfail($id);
        return view('pharmacist.inventory.index',compact('inventory'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'medication_id'=>'required',
            'quantity'=>'required'
         ]);
         $inventory=Inventory::findorfail($id);
         $inventory->update($request);
         return redirect()->route('pharmacist.inventory.update',compact('inventory'))->with('sucess','sucessfully updated');

    }
    public function delete($id){
        $inventory=Inventory::findorfail($id);
        $inventory->delete();
        return redirect()->route('pharmacist.inventory.index',compact('inventory'));

    }
    // New method to check low stock items
    public function lowStock()
    {
        $lowStockItems = Inventory::with('medication')
            ->where('quantity', '<', 5) // Adjust the threshold as needed
            ->get();
        return view('pharmacist.inventory.low_stock', compact('lowStockItems'));
    }

    // New method for searching inventory
    public function search(Request $request)
    {
        $query = $request->input('query');
        $inventory = Inventory::with('medication')
            ->whereHas('medication', function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', "%{$query}%");
            })
            ->orWhere('quantity', 'like', "%{$query}%")
            ->get();

        return view('pharmacist.inventory.index', compact('inventory'));
    }

}
