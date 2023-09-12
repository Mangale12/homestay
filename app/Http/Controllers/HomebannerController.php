<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeBanner;
class HomebannerController extends Controller
{
    public function index(){
        $homebanners = HomeBanner::get();
        return view('admin.homebanner.index', compact('homebanners'));
    }

    public function create(){
        return view('admin.homebanner.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:100',
            'banner_img'=>'required'
        ]);
        dd($request->description);
        $image_name = null;
        if($request->hasFile('banner_img')){
            $image = $request->file('banner_img');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/homebanner/'),$image_name);
        }
        HomeBanner::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'banner_img'=>$image_name,
        ]);
        return redirect()->route('homebanner.index')->with(['message'=>'Homebenner Added Successfully !!']);
    }

    public function edit(HomeBanner $homebanner){
        return view('admin.homebanner.edit',compact('homebanner'));
    }
    public function update(Request $request, HomeBanner $homebanner){
        $request->validate([
            'title'=>'required|max:100',

        ]);
        $image_name = $homebanner->banner_img;
        if($request->hasFile('banner_img')){
            $image = $request->file('banner_img');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/homebanner/'),$image_name);
        }
        $homebanner->title = $request->title;
        $homebanner->description = $request->description;
        $homebanner->banner_img = $image_name;
        $homebanner->save();

        return redirect()->route('homebanner.index')->with(['message'=>'Homebenner Added Successfully !!']);
    }
}
