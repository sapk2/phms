<?php

namespace App\Http\Controllers;

use App\Models\medication;
use App\Models\patient;
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
            ->paginate(10);

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
        $search=$request->input('search');
        $query=medication::query();
        if ($search) {
           $query->where('name','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->pagination(10);
        } 


        $medicine = medication::all();
        return view('pharmacist.medicinemngt.medindex', compact('medicine','search','query'));
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
            'quantity' => 'required',
            'price' => 'required',
            'medicine_types' => 'required',
            'photopath' => 'required'
        ]);

        $photoname = time() . '.' . $request->photopath->extesion();
        $request->photopath->move(public_path('/img'), $photoname);
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
            'quantity' => 'required',
            'price' => 'required',
            'medicine_types' => 'required',
            'photopath' => 'required'
        ]);

        $medicine = medication::find($id);
        $data['photopath'] = $medicine->photopath;
        if ($request->hasFile('photopath')) {
            $photoname = time() . '.' . $request->photopath->extension();
            $request->photopath->move(public_path('/img'), $photoname);
            //delete old photo
            File::delete(public_path('/img' . $medicine->photopath));
            $data['photopath'] = $photoname;
        }
        $medicine->update($request->all());
        return redirect(route('pharmacist.medicinemngt.medindex'))->with('updated sucessfully');
    }
    public function meddelete($id)
    {
        $medicine = medication::find($id);
        File::delete(public_path('/img' . $medicine->photopath));
        $medicine->delete();
        return redirect()->route('pharmacist.medicinemngt.medindex')->with('deleted sucessfully');
    }
}
