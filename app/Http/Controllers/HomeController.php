<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Mail;
class HomeController extends Controller
{

    public function inquiry(){
        $inquiries = Inquiry::get();
        return view('admin.inquiry.index', compact('inquiries'));
    }

    public function storeInquiry(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'email'=>'required|numeric',
            'coutry'=>'required',
            'room_type'=>'required',
        ]);

        Enquiry::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'room_type'=>$request->room_type,
            'message'=>$request->message,
        ]);

        try {
            $details = [
                'name'=>$request->name,
                'room_type'=>$request->room_type,
            ];
            Mail::to($request->email)->send(new NoticeUserMail($details));
            Mail::to($request->email)->send(new NoticeAdminMail($details));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
