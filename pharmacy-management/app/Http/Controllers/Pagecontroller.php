<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\medication;
use App\Models\site_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Pagecontroller extends Controller
{
    // public function home(){
        
    //     return view('welcome');

    // }
    public function index()
    {
        $medicines = medication::limit(4)->get();
        $settings =site_setting ::first();
        // Fetch the settings
        //$featuredProducts = medication::where('photopath', true)->limit(8)->get(); // Example query
        return view('welcome', compact('settings','medicines'));
    }
    public function aboutus(){
        return view('about');
    }
    public function contact() {
        return view('contact');
    }
    public function product()
{
    $medicines = medication::all(); // Fetch all medicines
    $settings = site_setting::first(); // Fetch the settings

    return view('product', compact('settings', 'medicines'));
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
