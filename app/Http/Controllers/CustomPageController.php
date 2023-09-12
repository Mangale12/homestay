<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Page;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    public function index($slug){
        
        $page=Page::where('slug',$slug)->first();
        
        if($page != null){
            $setting=SiteSetting::first();
            $partner=Ad::first();
            return view('frontend.custom_page', compact('page','partner','setting'));
        }else{
            return view('frontend.404');
        }
        
    }
    public function sub_category($category,$slug){
         
        $sub_cat=SubCategory::where('slug',$slug)->first();
        if($sub_cat != null){
            $category=Category::where('slug',$category)->first();
            $setting=SiteSetting::first();
            $partner=Ad::first();
            $news=Post::where('subcategory',$sub_cat->id)->where(function($q){
                $q->where('status', 'published')
                  ->orWhere('status', 'drafts');
           })->latest()->get();
            return view('frontend.news_category',compact('news','setting','partner','sub_cat','category'));   
        }else{
            return view('frontend.404');
        } 
    }
}