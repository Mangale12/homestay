<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialShareController extends Controller
{
    public function index(){
        $data = [
            'id'=> 1,
            'title'=>"test",
            'description'=>'description',
            'image'=>'cat.jpg',
        ];
        $shareButtons = \Share::page(
            url('social/share'),"text here")
            ->facebook()
            ->whatsapp();
            return view('frontend/room-details',compact('data','shareButtons'));
    }
}
