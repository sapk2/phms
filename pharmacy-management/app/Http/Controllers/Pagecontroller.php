<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\site_setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pagecontroller extends Controller
{
    public function home(){
        
        return view('welcome');

    }
    public function index()
    {
        $settings =site_setting ::first(); // Fetch the settings
        return view('main', compact('settings'));
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
