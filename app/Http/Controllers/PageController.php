<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Menu;
use Illuminate\Http\Request;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages'
            
        ]);
        $page->name = $request->title;
        $b=str_replace('/','-',$request->slug);
        $page->slug=str_replace(' ','-',$b);
        $page->content = $request->content;
        $page->save();

        return redirect()->route('pages.index')->with('message','New page has been created successfully');
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
        $page = Page::where('slug', $id)->first();
        if($page != null){
            return view('admin.pages.edit', compact('page'));
        }
        abort(404);
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
        
        $page = Page::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'slug'=>'required|unique:pages,slug,'.$id,
        ]);
        $page->name = $request->title;
        $b=str_replace('/','-',$request->slug);
        $page->slug=str_replace(' ','-',$b);
        $page->content = $request->content;
        $page->update();

        return redirect()->route('pages.index')->with('message','Page has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::findOrFail($id);
        // $image_path = public_path('uploads/custom-pages/' . $page->meta_image);    
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }else{
                
        //     }
      	$menu=Menu::where('menu',$id)->first();
        if($menu!=null){
            $menu->delete();
        }
        $page->delete();
        return back()->with('message','Page deleted successfully');
    }

    public function show_custom_page($slug){
        $pages = Page::where('slug', $slug)->get();
        if($pages != null){
            return view('frontend.custom_page', compact('pages'));
        }
        abort(404);
    }
}
