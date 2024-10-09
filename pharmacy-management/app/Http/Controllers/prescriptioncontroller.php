<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // Display a list of prescriptions
    public function index()
    {
        $prescriptions = Prescription::with(['patient', 'user'])->get();
        return view('pharmacist.prescriptions.index', compact('prescriptions'));
    }

    // Show the form for creating a new prescription
    public function create()
    {
        $patients = Patient::all();
        $pharmacists = User::where('role', 'admin')->get(); // Assuming 'pharmacist' is the role
        return view('pharmacist.prescriptions.create', compact('patients', 'pharmacists')); // Change to create view
    }

    // Store a newly created prescription in storage
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'user_id' => 'required|exists:users,id', // Assuming the pharmacist's user_id
            'doctor_name' => 'required|string|max:255',
        ]);

        Prescription::create($request->only(['patient_id', 'user_id', 'doctor_name']));
        return redirect()->route('pharmacist.prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    // Show the form for editing an existing prescription
    public function edit($id)
    {
        $prescription = Prescription::findOrFail($id); // Use singular variable
        $patients = Patient::all();
        $pharmacists = User::where('role', 'admin')->get();

        return view('pharmacist.prescriptions.edit', compact('prescription', 'patients', 'pharmacists'));
    }

    // Update an existing prescription in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'user_id' => 'required|exists:users,id', // Assuming the pharmacist's user_id
            'doctor_name' => 'required|string|max:255',
        ]);

        $prescription = Prescription::findOrFail($id); // Use singular variable
        $prescription->update($request->only(['patient_id', 'user_id', 'doctor_name']));
        return redirect()->route('pharmacist.prescriptions.index')->with('success', 'Prescription updated successfully.');
    }
     

    // Delete an existing prescription
    public function delete($id)
    {
        $prescription = Prescription::findOrFail($id); // Use singular variable
        $prescription->delete();
        return redirect()->route('pharmacist.prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }
}
