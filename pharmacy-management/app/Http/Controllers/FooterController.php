<?php

namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use App\Models\Footer;
    use Illuminate\Http\Request;
    
    class FooterController extends Controller
    {
       public function edit(){
        $footer =Footer::first();
        return view('pharmacist.footer.edit',compact('footer'));
       }
       public function update(Request $request){
        $request->validate([
            'description' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'facebook_url' => 'required',
        'twitter_url' => 'required',
        'instagram_url' => 'required',
        'linkedin_url' => 'required',
            'copyright_text' => 'required',
        ]);
        $footer = Footer::first();
        if ($footer) {
            // Update the existing footer
            $footer->update($request->all());
        } else {
            // Optionally create a new footer if none exists
            $footer = Footer::create($request->all());
        }
        return redirect()->route('pharmacist.footer.edit')->with('success', 'Footer updated successfully.');
       }
       
    }

