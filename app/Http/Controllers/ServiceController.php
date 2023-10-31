<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::first();
        return view('admin.service.edit', compact('service'));
    }

    public function create(){
        return view('admin.service.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|max:50',
        ]);
        Service::create([
            'icon'=>$request->icon,
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        return redirect()->route('service.index')->with(['message'=>'Services Added']);
    }

    public function edit(Service $service){
        return view('admin.service.edit', compact('service'));
    }
    public function update(Request $request, Service $service){
        $request->validate([
            'description'=>'required',
        ]);
        $service->icon = $request->icon;
        // $service->title= $request->title;
        $service->description = $request->description;
        $service->update();
        return redirect()->route('service.index')->with(['message'=>'Service Updated !!']);
    }
    function delete(Service $service){
        $service->delete();
        return redirect()->route("service.index")->with(['message'=>'Service Deletes !!']);
    }
}
