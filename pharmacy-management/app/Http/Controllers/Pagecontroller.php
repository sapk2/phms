<?php

namespace App\Http\Controllers;

use App\Models\aboutus;
use App\Models\cart;
use App\Models\footer;
use App\Models\medication;
use App\Models\site_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Pagecontroller extends Controller
{

    public function index()
    {
        $medicines = medication::limit(4)->get();
        $settings =site_setting ::first();
        $about = AboutUs::first(); 
        $footer = footer::first();// Fetch the first AboutUs record
        // Fetch the settings
        //$featuredProducts = medication::where('photopath', true)->limit(8)->get(); // Example query
        return view('welcome', compact('settings','medicines','about','footer'));
    }
    public function aboutus()
    {
        $about = AboutUs::first(); // Fetch the first AboutUs record
        $settings = Site_Setting::first(); // Fetch site settings if needed
        return view('about', compact('about', 'settings')); // Pass data to the view
    }
    public function contact(){
        return view('contact');
    }

    //products
    public function product(Request $request)
    {
        // Fetch all medicines
        $query = medication::query();
    
        // Search functionality
        if ($request->filled('search')) { // Ensure the 'search' parameter is not empty
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Filter by category (medicine name) if selected
        if ($request->has('category') && $request->category) {
            $query->where('name', $request->category);
        }
    
        // Get the filtered medicines
        $medicines = $query->get();
    
        // Get unique medicine names for the filter dropdown
        $medicineNames = medication::pluck('name')->unique();
    
        // Fetch the settings
        $settings = site_setting::first();
    
        return view('product', compact('settings', 'medicines', 'medicineNames'));
    }
    

public function footer(){
    $footer=footer::all();
    $settings=site_setting::first();
    return view('footer',compact('setting','footer'));
}

    /*public function checkout(){
        $patientid=Auth::id();
        $cartitem=cart::where('patient_id',$patientid)->with('medicine')->get();
        foreach ($cartitem as $cartitems) {
            if (empty($cartitems->medicine->discounted_price)) {
                $cartitems->total = $cartitems->medicine->price*$cartitems->qty;
                
            }else {
               
                $cartitems->total= $cartitems->medicine->discounted_price*$cartitems->qty;
            }
            
        }
        return view('pharmacist.checkout', compact('cartItem'));
    }*/

}
