<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Room;
use App\Models\Category;
use App\Models\Video;

class MediaController extends Controller
{
    public function index(Request $request){
        $from=$request->from;
        $to=$request->to;
        if($from != null && $to != null){
            $medias=Post::whereBetween('updated_at', [$from, $to])->get();
        }else{

            $medias=Media::get();
        }
        return view('admin.media.media',compact('medias','from','to'));
    }
    public function create(){
        $categories = Category::get();
        return view('admin.media.create',compact('categories'));

    }
    public function store(Request $request){
        if ($request->hasFile('medias')) {
            foreach ($request->file('medias') as $key=>$image){
                $image_name = time().$key.'.'.$image->extension();
                $image->move(public_path('uploads/featured_img/'),$image_name);
                Media::create([
                    'image'=>$image_name,
                    'media_type'=>$request->category,
                ]);
            }
        }
        return redirect()->route('medias')->with(['message'=>"Msdia Added"]);
    }
    public function delete(Request $request){
        $ids = $request->ids;
        // dd($ids);
        $posts=Media::whereIn('id',$ids)->get();
        foreach ($posts as $key => $post) {
            $dell = Media::where('id', $post->id)->first();
            // $dell->update(['featured_img' => null]);
            // $featured = public_path('uploads/featured_img/' . $post->featured_img);
            // if(file_exists($featured)){
            //     unlink($featured);
            // }
            $dell->delete();
        }
        return back()->with('message',"Image Deleted successfully.");
    }
    public function videoIndex(){
        $videoes = Video::get();
        return view('admin.video.index',compact('videoes'));
    }
    public function createVideo(){
        return view('admin.video.create');
    }
    public function storeVideo(Request $request){
        // dd($request->all());
        $request->validate([
            'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'name'=>'required',

        ]);
        $videoName = 'no video';
        if($request->hasFile('video')){
            $video = $request->file('video');
            $videoName = time().'.'.$video->extension();
            $video->move(public_path('video/'),$videoName);
        }
        Video::create([
            'video'=>$videoName,
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->route('video.index');
    }
    public function videoEdit($id){
        $video = Video::find($id)->first();
        return view('admin.video.edit',compact('video'));
    }
    public function videoUpdate(Request $request, Video $video){
        $request->validate([
            'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'name'=>'required',

        ]);
        $videoName = $video->video;
        if($request->hasFile('video')){
            $video = $request->file('video');
            $videoName = time().'.'.$video->extension();
            $video->move(public_path('video'),$videoName);
        }
        $video->name = $request->video;
        $video->description = $request->description;
        $video->video = $videoName;
        $video->update();
        return redirect()->route('video.index')->with(['message'=>'Video Update Success fully']);
    }
    public function videoDelete(Video $video){
        if($video->video != null){
            if(file_exists(public_path('video/'.$video->video))){
                File::delete(public_path('video/'.$video->video));
            }
        }
        $video->delete();
        return redirect()->route('video.index')->with(['message'=>"Video deleted"]);
    }
}
