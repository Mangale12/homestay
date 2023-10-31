<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomImage;

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
            // 'image'=>'required',
            'price'=>'required|numeric',
        ]);
        $room = Room::create([
            'type'=>$request->type,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);

        if($request->hasFile('image')){
            foreach($request->file('image') as $key=>$image){
                $image_name = time().$key.'.'.$image->extension();
                $image->move(public_path('uploads/room/'),$image_name);
                RoomImage::create([
                    'room_id'=>$room->id,
                    'image'=>$image_name,
                ]);
            }

        }

        return redirect()->route('room.index')->with(['message'=>"new Room added Succefully !!"]);
    }
    public function edit(Room $room){
        return view('admin.room.edit',compact('room'));
    }
    public function update(Request $request, Room $room){
        $request->validate([
            'type'=>"required",
            'price'=>'required|numeric',
        ]);
        if($request->hasFile('image')){
            foreach($request->file('image') as $key=>$image){
                $image_name = time().$key.'.'.$image->extension();
                $image->move(public_path('uploads/room/'),$image_name);
                RoomImage::create([
                    'image'=>$image_name,
                    'room_id'=>$room->id,
                ]);
            }

        }
        $room->type = $request->type;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->update();
        return redirect()->route('room.index')->with(['message'=>'Room Updated ']);
    }

    public function removeImage(Request $request){
        $image = RoomImage::find($request->image_id);
        if($image->image != null){
            if(file_exists(public_path('uploads/room/'.$image->image))){
                unlink(public_path('uploads/room/'.$image->image));
            }
        }
        $image->delete();
        return response(['message'=>'Image Deleted']);
    }

    public function delete($id){
        $room = Room::where('id',$id)->first();
        $room->delete();
        return redirect()->route('room.index')->with(['message'=>"Room Deleted"]);
    }
}
