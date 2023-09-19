<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Mail;
use App\Mail\NoticeUserMail;
use App\Mail\NoticeAdminMail;
class HomeController extends Controller
{

    public function inquiry(){
        $inquiries = Inquiry::get();
        return view('admin.inquiry.index', compact('inquiries'));
    }

    public function inquiryStore(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'arrival_date'=>'required',
            'country'=>'required',
            'room_type'=>'required',
            'adults'=>'required',
            'pickup'=>'required',
        ]);

        Inquiry::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'room_type'=>$request->room_type,
            'adults'=>$request->adults,
            'children'=>$request->children,
            'pickup'=>$request->pickup,
            'arrival_date'=>$request->arrival_date,
            'message'=>$request->message,
            'status'=>0,
        ]);

        return redirect()->route('home');

        try {
            $details = [
                'name'=>$request->name,
                'room_type'=>$request->room_type,
            ];
            Mail::to($request->email)->send(new NoticeUserMail(json_encode($details)));
            Mail::to($request->email)->send(new NoticeAdminMail(json_encode($details)));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function inquiryView(Request $request){
        $inquiry = Inquiry::where('id',$request->user_id)->first();
        return response()->json(['data'=>$inquiry]);
    }
}
