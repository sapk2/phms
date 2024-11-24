<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\medication;
use App\Models\patient;
use App\Models\prescription;
use App\Models\prescription_details;
use App\Models\report;
use App\Models\Sale_mngt;
use App\Models\site_setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class pharmaciancontroller extends Controller
{
    //user management
    public function userindex()
    {

        $usermanagement = User::all();
        return view('pharmacist.user.userindex', compact('usermanagement'));
    }

    public function usershow(User $user)
    {
        return view('pharmacist.user.usershow', compact('user'));
    }
    public function useredit($id)
    {
        $user = User::findOrFail($id);
        return view('pharmacist.user.useredit', compact('user'));
    }
    public function userupdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            $user->role = $request->input('role'),
            // Update the password only if provided
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('pharmacist.user.userindex')->with('success', 'User updated successfully.');
    }
    public function userdelete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('pharmacist.user.userindex')->with('success', 'User deleted successfully.');
    }



    //patient controller
    public function patientindex(Request $request)
    {
        $patient = patient::all();
        $search = $request->input('search');

        // Fetch patients with search and paginate the results (10 per page)
        $patients = Patient::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->paginate(5);

        // Return the view with the patients and the search term
        return view('pharmacist.patientmngt.patientindex', compact('patients', 'search'));
    }
    public function patientcreate()
    {
        return view('pharmacist.patientmngt.patientcreate');
    }
    public function patientstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        patient::create($request->all());
        return redirect(route('pharmacist.patientmngt.patientindex'))->with('sucess');
    }
    public function patientedit($id)
    {
        $patient = patient::findorfail($id);
        return view('pharmacist.patientmngt.patientedit', compact('patient'));
    }
    public function patientupdate(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        $patient = patient::findorfail($id);
        $patient->update($data);
        return redirect(route('pharmacist.patientmngt.patientindex'))->with('sucessfully updated..');
    }
    public function patientdelete($id)
    {
        $patient = patient::findorfail($id);
        $patient->delete();
        return redirect(route('pharmacist.patientmngt.patientindex'));
    }

    //medication controller
    public function medindex(Request $request)
{
    $search = $request->input('search');
    $query = Medication::query(); // Initialize query builder

    if ($search) {
        // Apply search conditions
        $query->where('name', 'LIKE', '%' . $search . '%')
              ->orWhere('description', 'LIKE', '%' . $search . '%');
    }

    // Paginate the results, applying search filters if any
    $medicine = $query->paginate(5);

    // Pass medicines and search term to the view
    return view('pharmacist.medicinemngt.medindex', compact('medicine', 'search'));
}

    public function medcreate()
    {
        return view('pharmacist.medicinemngt.medcreate');
    }
    public function medstore(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'total_value' => 'required',
            'price' => 'required',
            'medicine_types' => 'required',
            'photopath' => 'required'
        ]);

        $photoname = time() . '.' . $request->photopath->extension();
        $request->photopath->move(public_path('/storage/medicine'), $photoname);
        $data['photopath'] = $photoname;
        medication::create($data);
        return redirect(route('pharmacist.medicinemngt.medindex'));
    }
    public function mededit($id)
    {
        $medicine = medication::findorfail($id);
        return view('pharmacist.medicinemngt.mededit', compact('medicine'));
    }
    public function medupdate(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'total_value' => 'required',
            'price' => 'required',
            'medicine_types' => 'required',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $medicine = medication::find($id);
        $data['photopath'] = $medicine->photopath;
    
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('/img'), $photoname);
    
            // Delete old photo if it exists
            if ($medicine->photopath) {
                File::delete(public_path('/img/' . $medicine->photopath));
            }
    
            $data['photopath'] = $photoname;
        }
    
        $medicine->update($data);
        return redirect(route('pharmacist.medicinemngt.medindex'))->with('message', 'Updated successfully');
    }
    
    public function meddelete($id)
    {
        $medicine = medication::find($id);
        File::delete(public_path('/img'.$medicine->photopath));

        $medicine->delete();
        return redirect()->route('pharmacist.medicinemngt.medindex')->with('deleted sucessfully');
    }

    //prescription_detail controller

    public function prescribeindex(Request $request)
    {
        $search = $request->input('search');
        $query = prescription_details::with(['prescription', 'medication']);
        if ($search) {
            $query->whereHas('prescription', function ($q) use ($search) {
                $q->where('doctor_name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('medication', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            });
        }
        $prescriptiondetail = $query->paginate(5);
        return view('pharmacist.prescriptiondetail.prescribeindex', compact('prescriptiondetail', 'search'));
    }
    

    public function prescribecreate(){
        $prescriptiondetail = prescription::all();
        $medication = medication::all();
        return view('pharmacist.prescriptiondetail.prescribecreate',compact('prescriptiondetail','medication'));
   
    }
    public function prescribestore(Request $request){
        $request->validate([
            'prescription_id'=>'required',
            'medication_id'=>'required',
            'dosage'=>'required',
            'quantity'=>'required',
        ]);
        prescription_details::create($request->all());
        return redirect()->route('pharmacist.prescriptiondetail.prescribeindex')->with('sucess','prescription detail created sucessfully');

    }
    public function show($id)
    {
        $settings = site_setting::first();
        $prescriptiondetail = prescription_details::with(['prescription', 'medication'])->findOrFail($id);
        return view('pharmacist.prescriptiondetail.show', compact('prescriptiondetail','settings'));
    }
    
    public function prescribeedit($id)
    {
        $prescriptiondetail = prescription_details::findOrFail($id);
        $prescriptions = Prescription::all();  // Fetch the list of prescriptions
        $medications = Medication::all(); // Fetch the list of medications
        
        return view('pharmacist.prescriptiondetail.prescribeedit', compact('prescriptiondetail', 'prescriptions', 'medications'));
    }
    public function prescribeupdate(Request $request, $id){
        $request->validate([
            'prescription_id' => 'required',
            'medication_id' => 'required',
            'dosage' => 'required',
            'quantity' => 'required',
        ]);
        $prescriptiondetail = prescription_details::findOrFail($id);
        $prescriptiondetail->update($request->all());
        
        // Correct the redirect to the index route after updating
        return redirect()->route('pharmacist.prescriptiondetail.prescribeindex')->with('success', 'Prescription detail updated successfully');
    }
    
    public function prescribedelete($id) {
        $prescriptiondetail = prescription_details::findOrFail($id);  // Pass $id to findOrFail
        $prescriptiondetail->delete(); 
        return redirect()->route('pharmacist.prescriptiondetail.prescribeindex');
    }

    //// Display the settings edit form
    public function siteedit(){
        $settings=site_setting::first() ?? new site_setting();
        return view('pharmacist.settings.siteedit',compact('settings'));

    }
    public function siteupdate(Request $request){
        $request->validate([
            'name' => 'required',
            'tagline' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'logo' => 'required', // Validate logo as an image
            'favicon' => 'required',
            'admin_email' => 'required', // Ensure the email is valid
        ]);
    
        $settings = site_setting::first() ?? new site_setting();
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Store the logo in the 'img' directory and get the path
            $path = $request->file('logo')->store('img', 'public'); // Store in the 'img' directory
            $settings->logo = $path; // Set the path in the settings
        }
    
        // Fill other settings, excluding the logo
        $settings->fill($request->except('logo')); // Exclude logo to avoid overwriting
        $settings->save();
    
        return redirect()->route('pharmacist.settings.siteedit')->with('success', 'Settings updated successfully.');
    }
    
    
}

