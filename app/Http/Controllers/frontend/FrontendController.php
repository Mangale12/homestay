<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\CategorySection;
use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Krishnahimself\DateConverter\DateConverter;
use App\Models\HomeBanner;
use App\Models\Room;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\SocialSetting;
use App\Models\Media;
use App\Models\Food;
// $2y$10$DBw7tc6Gpynp80RYDZcdcOMnQoIgDNdGn9E09UC5E1kKPjEw91PUS
class FrontendController extends Controller
{
    public function index(){
        $homebanners = HomeBanner::get();
        // dd($homebanners);
        $medias = Media::get();
        $rooms = Room::get();
        $services = Service::get();
        $testimonials = Testimonial::get();
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();
        $headline_no=$setting->headline_no;
        $cat_sec=CategorySection::where('status',1)->orderBy('section_order', 'asc')->get();
        $partner=Ad::first();
        $foods = Food::get();
        $headline_news=Post::where(function($q){
            $q->where('status', 'published')
              ->orWhere('status', 'drafts');
       })->latest()->take($headline_no)->get();


        return view('frontend.index',compact('setting','cat_sec','partner','headline_news','headline_no','homebanners','rooms','services','testimonials','socialmedia','medias','foods'));
    }
    public function room(){
        $rooms = Room::get();
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();
        return view('frontend.rooms',compact('rooms','setting','socialmedia'));
    }
    public function room_details($id){
        $room = Room::findOrFail($id);
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();

        return view('frontend.room-details',compact('room','setting','socialmedia'));
    }

    public function about_us(){
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();
        $testimonials = Testimonial::get();
        $services = Service::get();
        return view('frontend.about_us',compact('setting','socialmedia','testimonials','services'));
    }
    public function contact_us(){
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();
        return view('frontend.contact-us',compact('setting','socialmedia'));
    }
    public function layout(){
        if (Route::is('layout1')) {
            return view('frontend.layouts.layout1');
        } elseif(Route::is('layout2')){
            return view('frontend.layouts.layout2');
        }elseif(Route::is('layout3')){
            return view('frontend.layouts.layout3');
        }elseif(Route::is('layout4')){
            return view('frontend.layouts.layout4');
        }elseif(Route::is('layout5')){
            return view('frontend.layouts.layout5');
        }
    }

    public function single_news($slug){
        $news=Post::where('slug',$slug)->first();
        $nepaliDate = DateConverter::fromEnglishDate((int)$news->created_at->format('Y'), (int)$news->created_at->format('m'), (int)$news->created_at->format('d'),$news->created_at->format('H:i:s'))->toFormattedNepaliDate();
        if($news != null){
            $setting=SiteSetting::first();
            $partner=Ad::first();
            return view('frontend.single-news',compact('news','setting','partner','nepaliDate'));
        }else{
            return view('frontend.404');
        }
    }
    public function news_category($slug){

        $cat=Category::where('slug',$slug)->first();
        if($cat != null){

            $setting=SiteSetting::first();
            $partner=Ad::first();
            $news=Post::where('category',$cat->id)->where(function($q){
            $q->where('status', 'published')
                ->orWhere('status', 'drafts');
            })->latest()->get();
            return view('frontend.news_category',compact('news','setting','partner','cat'));
        }else{
            return view('frontend.404');
        }
    }
   public function search(Request $request){
        $partner=Ad::first();
        $keyword=$request->search_keyword;
        $news=Post::where(function($q){
            $q->where('status', 'published')
              ->orWhere('status', 'drafts');
       })->where('title', 'Like', '%' . $keyword . '%')->latest()->paginate(2);
        return view('frontend.search',compact('news','partner'));
    }

    public function book(){
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();
        $rooms = Room::get();
        return view('frontend.booking-form',compact('socialmedia','setting','rooms'));
    }
    public function food(){
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();
        $food = Food::get();
        return view('frontend.food',compact('socialmedia','setting','food'));
    }
    public function gallery(Request $request){
        $setting=SiteSetting::first();
        $socialmedia = SocialSetting::first();

        $categories = Category::get();
        $gallery = Media::get();
        if($request->category){
            $category = Category::where('slug',$request->slug)->first();
            $gallery = Media::where('media_type',$category->id)->get();
        }
        return view('frontend.gallery',compact('socialmedia','setting','categories','gallery'));
    }
}
