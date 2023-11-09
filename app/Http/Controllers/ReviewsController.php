<?php

namespace App\Http\Controllers;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReviewsController extends Controller
{
    public function store(Request $request){

        if(Auth::check()){
            $request->validate([
                'reviews'=>'required',
            ]);
            Reviews::create([
                'message'=>$request->reviews,
                'user_id'=>Auth::user()->id,
            ]);
            return redirect()->back()->with(['message'=>"thang you"]);
        }else{
            return redirect()->route('users.index')->with(['message'=>"please login first"]);

        }


    }
}
