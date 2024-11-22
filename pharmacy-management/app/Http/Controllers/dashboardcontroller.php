<?php

namespace App\Http\Controllers;

use App\Models\medication;
use App\Models\prescription;
use App\Models\Sale_mngt;
use App\Models\site_setting;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboard()
    {

        // Ensure that all model classes are imported correctly and exist
        $userCount = User::count(); // Total users
        $medicationCount = medication::count(); // Total medications
        $prescriptionCount = prescription::count(); // Total prescriptions
        $salesCount = Sale_mngt::count(); // Total sales
        // Pass all counts to the view
        return view('pharmacist.dashboard', [
            'userCount' => $userCount,
            'medicationCount' => $medicationCount,
            'prescriptionCount' => $prescriptionCount,
            'salesCount' => $salesCount,
        ]);
    }
    //
}
