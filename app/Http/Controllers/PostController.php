<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Response;

class PostController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:read-post|create-post|edit-post|delete-post', ['only' => ['index', 'store']]);
        $this->middleware('permission:create-post', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-post', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-post', ['only' => ['delete','deleteAll']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function testf(Request $request){
        $image = $request->file("test_file");
        $name = time().'.'.$image->extension();
        $image->move(public_path('webp'),$name);
        $file_path = 'webp/'.$name;
        $sourceImage = imagecreatefrompng($file_path);

        // Save the image as WebP
        imagewebp($sourceImage, public_path("webp/".time().".webp"), 80);
        unlink($file_path);
        dd("changed");
    }
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
          //dd($author);
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
    public function create(Request $request)
    {
        $categories=Category::where('status',1)->get();
        $posts = Post::paginate(30);

        return view('admin.posts.create',compact('categories','posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //dd(session());
        // $validated = $request->validate([
        //     'headline' => 'required|max:255',
        //     'category'=>'required',
        //     'description'=>'required',
        //     'excerpt'=>'max:500',
        //     'meta_title'=>'max:255',
        //     'meta_description'=>'max:500',
        //     'fb_title'=>'max:255',
        //     'fb_description'=>'max:500',
        // ]);

        $post=new Post();
        if($request->trending){
            $trending = '1';
        }else{
            $trending = '0';
        }
        if($request->banner_news){
            $bannernews = '1';
        }else{
            $bannernews = '0';
        }
        if($request->news_banner){
            $post->news_banner = '1';
        }else{
            $post->news_banner = '0';
        }
        $post->title=$request->headline;
        $post->kicker = $request->kicker;
        $post->category=$request->category;
        $post->subcategory=$request->sub_category;
        // if ($request->slug != null) {
        //     $post->slug = str_replace(' ', '-', $request->slug);
        // }
        // else {
        //     $post->slug = str_replace(' ', '-', $request->headline);
        // }
        $post->slug=date("ymdHis");
        if($request->hasFile('new_featured_img')){
            $featured_img = $request->new_featured_img;
            $featured_img_name = time().$featured_img->extension();
            $featured_img->move(public_path('uploads/featured_img/'),$featured_img_name);
            $post->featured_img = $featured_img_name;
        }else{
            $post->featured_img = $request->featured_img;
        }
        if ($request->hasFile('pdf_file')) {
            $pdf = $request->file('pdf_file');
            $fileName = $pdf->getClientOriginalName();
           $pdf->move(public_path('uploads/pdf'),$fileName);
            $post->pdf_file= $fileName;
        }
        $post->author=Auth::user()->id;
        $post->excerpt=$request->excerpt;
        $post->description=$request->description;
        $post->status=$request->status;
        $post->scheduled_dt=$request->scheduled_dt;
        $post->trending = $trending;
        $post->banner_news = $bannernews;

        if ($request->hasFile('head_image')) {
            $imageName = time().'.'.$request->head_image->extension();

            $file_path = $request->head_image->move(public_path('uploads/headline_img/'), $imageName);
            dd($file_path);
            $post->headline_image= $imageName;
            $inputImagePath = 'path/to/input/image.jpg';

            // Output WebP image file path
            $outputWebpPath = 'path/to/output/image.webp';

            // Load the image with GD
            $sourceImage = imagecreatefromjpeg($inputImagePath);

            // Save the image as WebP
            imagewebp($sourceImage, $outputWebpPath, 80); // 80 is the quality (0-100), adjust as needed

            // Free up memory
            imagedestroy($sourceImage);
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


        if (session("path")!=null) {
            $post->video=session("path");
        } else {
            $post->video_url=$request->video;
        }

        if($post->save()){
            session()->forget(['path']);
            return redirect()->route('posts.index')->with(['message' => 'Post added successfully.']);
        }

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
        $posts = Post::paginate(30);
//         $filename = public_path('uploads/pdf/'.$post->pdf_file);
//    return Response::make(file_get_contents($filename), 200, [
//               'Content-Type' => 'application/pdf',
//               'Content-Disposition' => 'inline; filename="'.$filename.'"'
//    ]);
        $categories=Category::where('status',1)->get();
        $tags = json_decode($post->tags);
        return view('admin.posts.edit',compact('post','categories','tags','posts'));
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
           'headline' => 'required|max:255',
           'pdf_file'=>'mimes:pdf,DOC',
            'category'=>'required',
            'description'=>'required',
            'excerpt'=>'max:500',
            'meta_title'=>'max:255',
            'meta_description'=>'max:500',
            'fb_title'=>'max:255',
            'fb_description'=>'max:500',
        ]);

        if($request->trending){
            $trending = '1';
        }else{
            $trending = '0';
        }
        if($request->banner_news){
            $bannernews = '1';
        }else{
            $bannernews = '0';
        }
        $post->title=$request->headline;
        $post->kicker = $request->kicker;
        $post->category=$request->category;
        $post->subcategory=$request->sub_category;
        // if ($request->slug != null) {
        //     $post->slug = str_replace(' ', '-', $request->slug);
        // }
        // else {

        //     $post->slug = str_replace(' ', '-', $request->headline);
        // }
        if ($request->file('pdf_file')) {

            $pdf = $request->file('pdf_file');
            $fileName = $pdf->getClientoriginalName();
           $pdf->move(public_path('uploads/pdf/'),$fileName);
            $post->pdf_file= $fileName;
        }
        if($request->hasFile('new_featured_img')){
            $featured_img = $request->new_featured_img;
            $featured_img_name = time().$featured_img->extension();
            $featured_img->move(public_path('uploads/featured_img/'),$featured_img_name);
            $post->featured_img = $featured_img_name;
        }else{
            $post->featured_img = $request->featured_img;
        }
        $post->slug=date("ymdHis");

        $post->author=$post->author;
        $post->excerpt=$request->excerpt;
        $post->description=$request->description;
        $post->status=$request->status;
        $post->scheduled_dt=$request->scheduled_dt;
        $post->trending = $trending;
        $post->banner_news = $bannernews;


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



        // if ($request->hasFile('fb_image')) {
        //     $imageName = time().'.'.$request->fb_image->extension();

        //     $request->fb_image->move(public_path('uploads/fb_image/'), $imageName);
        //     $post->fb_image= $imageName;
        // }

      if ($fb_image = $request->file('fb_image')) {
            if($request->previous_fb_img != null){
              $thumb_image_path = public_path('uploads/fb_image/' . $request->previous_fb_img);
              if(file_exists($thumb_image_path)){
                  unlink($thumb_image_path);
              }
            }
            $destination = 'uploads/fb_image/';
            $thumb_img = time() . "." .$fb_image->extension();
            $fb_image->move($destination, $thumb_img);
            $post->fb_image = "$thumb_img";

          }else{
              unset($post->fb_image);
          }
      if(session("path")!=null){
            $path = parse_url($post->video);
            File::delete(public_path($path['path']));
            $post->video=session("path");
        }elseif($request->video!=null){
            // dd('hi');
            if($post->video!=null){
                $path = parse_url($post->video);
                File::delete(public_path($path['path']));
                $post->video=null;
            }
            $post->video_url=$request->video;
        }else{
        	$post->video=$post->video;
      	}
        // dd($post);
      if($post->update()){
            session()->forget(['path']);
            return redirect()->route('posts.index')->with(['message' => 'News updated successfully.']);
        }
        //$post->save();
        //return redirect()->route('posts.index')->with(['message' => 'News updated successfully.']);
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
       if($post != null){
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
         if($post->video!=null){
            $path = parse_url($post->video);
            File::delete(public_path($path['path']));
        }
         $post->delete();
        return back()->with('message','News deleted successfully');
       }


    }

    public function deleteAll(Request $request)
    {
        $ids = $request->posts_id;
        dd($ids);
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
    public function update_banner(Request $request)
    {
        $banner = Post::findOrFail($request->post_id);
        // dd($category);
        $banner->headline_news = $request->banner_news;
        // dd($category);
        $banner->update();

        return response()->json(['message' => 'headline news updated successfully.']);
    }
    public function update_trending(Request $request)
    {
        $trending = Post::findOrFail($request->post_id);
        // dd($category);
        $trending->trending = $request->trending;
        // dd($category);
        $trending->save();

        return response()->json(['message' => 'Trending updated successfully.']);
    }
  public function uploadLargeFiles(Request $request) {
        // dd('hi');
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
          alert('Error uploading video');
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
           // $path=Storage::disk('public')->putFileAs('videos', $file, str_replace(' ','-',$fileName));
          	$path=$file->move(public_path('uploads/videos/'), str_replace(' ','-',$fileName));
			session(["path"=>asset('uploads/videos/'.str_replace(' ','-',$fileName))]);
            return [
                'path' => asset('uploads/videos/'.str_replace(' ','-',$fileName)),
                'filename' => str_replace(' ','-',$fileName)
            ];
            // delete chunked file
            //unlink($file->getPathname());
            //session(["filename"=>$fileName]);
            //return [
              //  'path' => asset('storage/' . $path),
                //'filename' => str_replace(' ','-',$fileName)
            //];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];

    }
    function get_featured_img(Request $request){
        $featured_img = Post::where('featured_img',$request->featured_img)->first();
        return $featured_img->featured_img;
    }

    function modal_pagination(Request $request){
        if($request->ajax())
        {
         $posts = Post::paginate(30);
         return view('admin.posts.ajax_paginate',compact('posts'))->render();
        }else{
            $posts = Post::paginate(30);
            $categories=Category::where('status',1)->get();
            return view('admin.posts.create',compact('categories','posts'));
        }
    }

    function view_pdf($id){
        $post = Post::where('id',$id)->first();
        return view('admin/posts/pdf_view',compact('post'));
    }

}
