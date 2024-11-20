<?php

namespace App\Http\Controllers;

use App\Models\aboutus;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $about =aboutus::first();
        return view('pharmacist.about.index', compact('about'));
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'nullable',
        ]);

        $about = AboutUs::first();
        if (!$about) {
            $about = new AboutUs();
        }

        $about->title = $validated['title'];
        $about->subtitle = $validated['subtitle'];
        $about->content = $validated['content'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about_us', 'public');
            $about->image_path = $imagePath;
        }

        $about->save();

        return redirect()->back()->with('success', 'About Us content updated successfully.');
    }
   

}
