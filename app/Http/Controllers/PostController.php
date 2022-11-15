<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cat = null;
        $subcat=null;
        $author=null;
        $status=null;
        $posts=Post::orderBy('updated_at','DESC')->get();
        $categories=Category::where('status',1)->get();
        $authors= User::all();


        if ($request->category != null) {
            $posts = Post::where('category', $request->category)->get();
            $cat = $request->category;
        } 
        if($request->sub_category != null){
            $posts= Post::where('subcategory',$request->sub_category)->get();
            $subcat=$request->sub_category;
        }
        if($cat!=null){
            $subcategories=SubCategory::where('status',1)->where('parent_id',$cat)->get();
        } else{
            $subcategories=SubCategory::where('status',1)->get();
        }

        if($request->author !=null){
            $posts = Post::where('author',$request->author)->get();
            $author=$request->author;
        }
        if($request->status !=null){
            $posts = Post::where('status',$request->status)->get();
            $status=$request->status;
        }
        
        return view('admin.posts.index',compact('posts','categories','subcategories','cat','subcat','authors','author','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->get();
        
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'headline' => 'required',
            'category'=>'required',
            'description'=>'required',
            // 'status'=>'required',
        ]);

        $post=new Post();
        $post->title=$request->headline;
        $post->category=$request->category;
        $post->subcategory=$request->sub_category;
        if ($request->slug != null) {
            $post->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $post->slug = str_replace(' ', '-', $request->headline);
        }

        if ($request->hasFile('featured_img')) {
            $imageName = time().'.'.$request->featured_img->extension();  
     
            $request->featured_img->move(public_path('uploads/featured_img/'), $imageName);
            $post->featured_img= $imageName;
        }
        $post->author=Auth::user()->name;
        $post->excerpt=$request->excerpt;
        $post->description=$request->description;
        $post->status=$request->status;
        $post->scheduled_dt=$request->scheduled_dt;

        if ($request->hasFile('head_image')) {
            $imageName = time().'.'.$request->head_image->extension();  
     
            $request->head_image->move(public_path('uploads/headline_img/'), $imageName);
            $post->headline_image= $imageName;
        }

        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->tags=implode('|', $request->tags);
        $post->keywords=implode('|', $request->keywords);

        $post->fb_title=$request->fb_title;
        $post->fb_description=$request->fb_description;
        

        
        if ($request->hasFile('fb_image')) {
            $imageName = time().'.'.$request->fb_image->extension();  
     
            $request->fb_image->move(public_path('uploads/fb_image/'), $imageName);
            $post->fb_image= $imageName;
        }

        $post->save();
        return redirect()->route('posts.index')->with(['message' => 'News added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::where('slug',$id)->first();
        $categories=Category::where('status',1)->get();
        $tags = json_decode($post->tags);
        return view('admin.posts.edit',compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::where('slug',$id)->first();
        // dd($post->author);
        $validated = $request->validate([
            'headline' => 'required',
            'category'=>'required',
            'description'=>'required',
            // 'status'=>'required',
        ]);

        
        $post->title=$request->headline;
        $post->category=$request->category;
        $post->subcategory=$request->sub_category;
        if ($request->slug != null) {
            $post->slug = str_replace(' ', '-', $request->slug);
        }
        else {

            $post->slug = str_replace(' ', '-', $request->headline);
        }
        if ($featured_img = $request->file('featured_img')) {
            $thumb_image_path = public_path('uploads/featured_img/' . $request->previous_featured_img);
            // dd($thumb_image_path);
            if(file_exists($thumb_image_path)){
                unlink($thumb_image_path);
            }
                $destination = 'uploads/featured_img/';
                $thumb_img = time() . "." .$featured_img->extension();
                $featured_img->move($destination, $thumb_img);
                $post->featured_img = "$thumb_img";
            
        }else{
            unset($post->featured_img);
        }

        
        $post->author=$post->author;
        $post->excerpt=$request->excerpt;
        $post->description=$request->description;
        $post->status=$request->status;
        $post->scheduled_dt=$request->scheduled_dt;


        // if ($request->hasFile('head_image')) {
        //     $imageName = time().'.'.$request->head_image->extension();  
     
        //     $request->head_image->move(public_path('uploads/headline_img/'), $imageName);
        //     $post->headline_image= $imageName;
        // }
        if ($request->hasFile('head_image')) {
            if ($request->previous_headline_img != null) {
                // dd($request->previous_category_partners);
                $thumb_image_path = public_path('uploads/headline_img/' . $request->previous_headline_img);
                if(file_exists($thumb_image_path)){
                    unlink($thumb_image_path);
                    
                } 

                $thumb_img = time().'.'.$request->head_image->extension();  
                $request->head_image->move(public_path('uploads/headline_img/'), $thumb_img);
                // $ad->head_image= $imageName;  
                
            } else{
                $thumb_img = time().'.'.$request->head_image->extension();  
                $request->head_image->move(public_path('uploads/headline_img/'), $thumb_img);
            } 
        }else {
            $thumb_img=$request->previous_headline_img;
        }
        $post->headline_image=$thumb_img;
        

        $post->meta_title=$request->meta_title;
        $post->meta_description=$request->meta_description;
        $post->tags=implode('|', $request->tags);
        $post->keywords=implode('|', $request->keywords);

        $post->fb_title=$request->fb_title;
        $post->fb_description=$request->fb_description;
        

        
        if ($request->hasFile('fb_image')) {
            $imageName = time().'.'.$request->fb_image->extension();  
     
            $request->fb_image->move(public_path('uploads/fb_image/'), $imageName);
            $post->fb_image= $imageName;
        }
        // dd($post);
        $post->save();
        return redirect()->route('posts.index')->with(['message' => 'News updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post=Post::where('slug',$id)->first();
       
        if($post->featured_img != null){
            $featured = public_path('uploads/featured_img/' . $post->featured_img); 
            if(file_exists($featured)){
                unlink($featured);
            } 
        }
        if($post->headline_image != null){  
            $head =public_path('uploads/headline_img/' . $post->headline_image);
            if(file_exists($head)){
                unlink($head);
            }
        }
        if($post->fb_image!=null){
            $fb =public_path('uploads/fb_image/' . $post->fb_image);
            if(file_exists($fb)){
                unlink($fb);
            }
        }
        
        $post->delete();
        return back()->with('message','News deleted successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Post::whereIn('id',$ids)->delete();
        return back()->with('message',"News Deleted successfully.");
    }

    public function update_feature(Request $request)
    {
        $feature = Post::findOrFail($request->cat_id);
        // dd($category);
        $feature->featured = $request->featured;
        // dd($category);
        $feature->save();
    
        return response()->json(['message' => 'Featured updated successfully.']);
    }

}
