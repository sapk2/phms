<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\medication;
use App\Models\site_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pagecontroller extends Controller
{
    // public function home(){
        
    //     return view('welcome');

    // }
    public function index()
    {
        $medicine=medication::orderBy('photopath','asc')->first();
        $settings =site_setting ::first(); // Fetch the settings
        $featuredProducts = medication::where('photopath', true)->limit(8)->get(); // Example query
        return view('welcome', compact('settings','medicine','featuredProducts'));
    }
    public function aboutus(){
        return view('about');
    }
    public function contact() {
        return view('contact');
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
