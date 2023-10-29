<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index(){
        $about_us = AboutUs::first();
        return view('admin.about-us.edit',compact('about_us'));
    }

    public function edit(){
        return view('admin.about-us.edit');
    }

    public function update(Request $request){
        $request->validate([
            'description'=>'required',
        ]);
        $about_us = AboutUs::first();
        if($request->hasFile('image')){
            $image = $request->image;
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/'),$image_name);
            $about_us->image = $image_name;
        }
        $about_us->description = $request->description;
        $about_us->update();
        return redirect()->route('about_us.index')->with(['message'=>'About us ubdated']);
    }
}
