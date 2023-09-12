<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::get();
        return view('admin.room.index',compact('rooms'));
    }
    public function create(){
        return view('admin.room.create');
    }
    public function store(Request $request){
        $request->validate([
            'type'=>"required",
            'image'=>'required',
        ]);
        $image_name = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/room/'),$image_name);
        }
        Room::create([
            'type'=>$request->type,
            'description'=>$request->description,
            'image'=>$image_name,
        ]);
        return redirect()->route('room.index')->with(['message'=>"new Room added Succefully !!"]);
    }
    public function edit(Room $room){
        return view('admin.room.edit',compact('room'));
    }
    public function update(Request $request, Room $room){
        $request->validate([
            'type'=>"required",
        ]);
        $image_name = $room->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('uploads/room/'),$image_name);
        }
        $room->type = $request->type;
        $room->image = $image_name;
        $room->description = $request->description;
        $room->update();
        return redirect()->route('room.index')->with(['message'=>'Room Updated ']);
    }
}
