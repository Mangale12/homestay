<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\NoticeUserMail;
use App\Mail\NoticeAdminMail;
use App\Models\Subscriber;
use App\Models\SiteSetting;
use App\Models\Video;
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
        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'country'=>$request->country,
            'room_type'=>$request->room_type,
            'adults'=>$request->adults,
            'children'=>$request->children,
            'pickup'=>$request->pickup,
            'arrival_date'=>$request->arrival_date,
            'departure_date'=>$request->departure_date,
            'message'=>$request->message,
            'status'=>0,
        ];
        $new_contact = Inquiry::insertGetId($data);

        $user_details = Inquiry::find($new_contact);

        try {
            $contact = SiteSetting::first('contact')->toArray();
            $details = [
                'name'=>$request->name,
                'room_type'=>$request->room_type,
                'phone'=>$contact,
                'user_details'=>$user_details,
            ];
            // $to_name = "hahh";
            // $to_email = "mangalewiba12@gmail.com";
            // $data = $details;

            // Mail::send("email.noticeuser", $details, function($message) use ($to_name, $to_email) {
            //     $message->to($to_email, $to_name)
            //     ->subject("Booking Confirmation");
            //     $message->from("mangaletamang65@gmail.com","tetet");
            // });
            Mail::to($request->email)->send(new NoticeUserMail(json_encode($details)));
            Mail::to('chandradong@gmail.com')->send(new NoticeAdminMail(json_encode($details)));

        } catch (Exception $e) {
            dd($e);
        }
        return redirect()->route('home');
    }
    public function inquiryView(Request $request){
        $inquiry = Inquiry::where('id',$request->user_id)->first();
        return response()->json(['data'=>$inquiry]);
    }

    public function subscriber(){
        $subscribers = Subscriber::get();
        return view('admin.subscriber.index',compact('subscribers'));
    }
}
