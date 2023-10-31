<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create(){
        return view('admin.testimonial.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'profile'=>'mimes:png,jpg,jpeg,webp',
            'message'=>'required',
        ]);
        $image_name = null;
        if($request->hasFile('profile')){
            $image = $request->file('profile');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/testimonial/'),$image_name);
        }
        Testimonial::create([
            'name'=>$request->name,
            'message'=>$request->message,
            'profile'=>$image_name,
            'position'=>$request->position,
        ]);
        return redirect()->route('testimonial.index')->with(['message'=>'Testimonial Added']);
    }
    public function edit(Testimonial $testimonial){
        return view('admin.testimonial.edit', compact('testimonial'));
    }
    public function update(Request $request, Testimonial $testimonial){
        $request->validate([
            'name'=>'required',
            'profile'=>'mimes:png,jpg,jpeg,webp',
            'message'=>'required',
        ]);
        $image_name = $testimonial->profile;
        if($request->hasFile('profile')){
            if($testimonial->profile != null){
                if(file_exists(public_path('uploads/testimonial/'.$testimonial->profile))){
                    unlink(public_path('uploads/testimonial/'.$testimonial->profile));
                }
            }
            $image = $request->file('profile');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/testimonial/'),$image_name);
        }
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->profile = $image_name;
        $testimonial->message = $request->message;
        $testimonial->save();
        return redirect()->route('testimonial.index')->with(['message'=>"Testimonial Updated"]);
    }
    public function delete($id){
        $testimonial = Testimonial::where('id',$id)->first();
        if($testimonial->profile != null){
            if(file_exists(public_path('uploads/testimonial/'.$testimonial->profile))){
                unlink(public_path('uploads/testimonial/'.$testimonial->profile));
            }
        }
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with(['message'=>"Testimonial Deleted"]);
    }
}
