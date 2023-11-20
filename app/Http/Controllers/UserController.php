<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\EmailVerified;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|same:confirmPassword',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Mail::to('mangaletamang65@gmail.com')->send(new EmailVerified($user));
        //$user->assignRole($request->input('role'));
        // dd($user);
        return redirect()->route('users.index')->with('message', 'User Created Successfully');
    }
    public function email_verified($id){
        $user = User::find($id);

        $user->is_verified = 1;
        $user->save();
        return redirect()->route('users.index');
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
        $user = User::where('id', $id)->with('roles')->first();
        // dd($user);
        $roles = Role::get();

        // dd($roles);

        // dd($user);
        return view('admin.user.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,' . $id,
            'password' => 'required|same:confirmPassword',
            'role' => 'required'
        ]);
        if (Auth::user()->hasRole('Super Admin|Admin')) {
            $user = User::findOrFail($id);
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
            $user->assignRole($request->input('role'));
            $user->update();

            return redirect()->route('user.index')->with('message', 'User has been updated successfully');
        } else {
            return redirect()->route('user.index')->with('message', 'Only authenticated user can edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('message', 'User has been deleted successfully');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if($user != null){
            if(Hash::check($request->password,$user->password)){
                return redirect()->route('frontend.room');
            }else{
                return back()->with('login_error', 'These credentials do not match our records.');

            }
        }else{
            // return redirect()->back()->with("message","These credentials do not match our records.");
            return back()->with('login_error', 'These credentials do not match our records.');
        }
    }
}
