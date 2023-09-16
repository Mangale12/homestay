<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function index(){
        $foods = Food::get();
        return view('admin.food.index',compact('foods'));
    }
    public function create(){
        return view('admin.food.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>'required',
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().$image->extension();
            $image->move(public_path('uploads/food/'),$image_name);
            Food::create([
                'name'=>$request->name,
                'image'=>$image_name,
                'price'=>$request->price,
            ]);
        }
        return redirect()->route('food.index')->with(['message'=>'Food Added']);
    }
    public function edit(Food $food){
        return view('admin.food.edit',compact('food'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',

            'price'=>'numeric',
        ]);
        $food = Food::findOrFail($id);
        $image_name = $food->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().$image->extension();
            $image->move(public_path('uploads/food/'),$image_name);
        }
        $food->name = $request->name;
        $food->image = $image_name;
        $food->price = $request->price;
        $food->update();
        return redirect()->route('food.index')->with(['message'=>'Food Updated']);

    }
    public function destroy(Food $food){
        if($food->image != null){
            if(file_exists(public_path('uploads/food/'.$food->image))){
                unlink(public_path('uploads/food/'.$food->image));
            }
        }
        $food->delete();
        return redirect()->route('food.index')->with(['message'=>'Food Deleted']);

    }
}