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
use Illuminate\Support\Facades\Route;
use App\Models\Document;
use App\Models\Country;
use App\Models\Room;
class HomeController extends Controller
{

    public function inquiry(){
        if(Route::is('inquiry.new')){
            $inquiries = Inquiry::where('status',0)->get();
        }
        elseif(Route::is('inquiry.old')){
            $inquiries = Inquiry::where('status',1)->get();
        }else{
            $inquiries = Inquiry::get();
        }
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
        $country = Country::find($request->country);
        $room_type = Room::find($request->room_type);
        try {
            $contact = SiteSetting::first('contact')->toArray();

            $details = [
                'name'=>$request->name,
                'room_type'=> $room_type->type,
                'phone'=>$contact,
                'user_details'=>$user_details,
                'country' => $country->name,
            ];
            // $to_name = "hahh";
            // $to_email = "mangalewiba12@gmail.com";
            // $data = $details;

            // Mail::send("email.noticeuser", $details, function($message) use ($to_name, $to_email) {
            //     $message->to($to_email, $to_name)
            //     ->subject("Booking Confirmation");
            //     $message->from("mangaletamang65@gmail.com","tetet");
            // });
            // Mail::to($request->email)->send(new NoticeUserMail(json_encode($details)));
            Mail::to('mangaletamang65@gmail.com')->send(new NoticeAdminMail(json_encode($details)));

        } catch (Exception $e) {
            dd($e);
        }
        return redirect()->route('home');
    }
    public function inquiryView(Request $request){
        $inquiry = Inquiry::where('id',$request->user_id)->first();
        $inquiry->status = 1;
        $inquiry->save();
        return response()->json(['data'=>$inquiry]);
    }
    public function inquiryDelete($id){
        $inquiry = Inquiry::find($id)->first();
        $inquiry->delete();
        return back()->with(['message'=>'inquiry deleted']);
    }
    public function subscriber(){
        $subscribers = Subscriber::get();
        return view('admin.subscriber.index',compact('subscribers'));
    }
    public function documentIndex(){
        $documents = Document::get();
        return view('admin.document.index',compact('documents'));
    }
    public function documentCreate(){
        return view('admin.document.create');
    }
    public function documentStore(Request $request){
        $request->validate([
            'document'=>'required',

        ]);
        if($request->hasFile('document')){
            $document = $request->document;
            $document_name = time().'.'.$document->extension();
            $document->move(public_path('uploads/document/'),$document_name);
            Document::create([
                'document'=>$document_name,
                'name'=>$request->name,
            ]);
        }
        return redirect()->route('document.index');
    }
    public function documentEdit($id){
        $document=Document::find($id);
        return view('admin.document.edit',compact('document'));
    }
    public function documentUpdate(Request $request, $id){
        $document = Document::find($id);
        $document_name = $document->document;
        if($request->hasFile('document')){
            if($document->document != null){
                if(file_exists(public_path('uploads/document/'.$document->document))){
                    unlink(public_path('uploads/document/'.$document->document));
                }
            }
            $document = $request->document;
            $document_name = time().'.'.$document->extension();
            $document->move(public_path('uploads/document/'),$document_name);
        }
        Document::where('id',$id)->update([
            'document'=>$document_name,
            'name'=>$request->name,
        ]);
        return redirect()->route('document.index')->with('message','Document updated successfully');
    }

    public function documentDelete(Document $document){
        if($document->document != null){
            if(file_exists(public_path('uploads/document/'.$document->document))){
                unlink(public_path('uploads/document/'.$document->document));
            }
        }
        return redirect()->route('document.index')->with('message','Document Deleted succefully');
    }
}
