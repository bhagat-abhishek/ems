<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', ['users'=>$users, 'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->u_name,
            'email' => $request->u_email,
            'role' => $request->u_role,
            'password' => Hash::make($request->u_password),
        ]);

        if($user) {
            return back()->with('success', 'User Created Successfully');
        } else {
            return back()->with('failed', 'User Creation Failed');
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
        $user = User::find($id);
        return view('admin.users.edit', ['user'=>$user]);
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
        $user = User::find($id);
        $user->name = $request->u_name;
        $user->email = $request->u_email;
        $user->role = $request->u_role;
        $upd = $user->update();
        if($upd) {
            return redirect()->route('users')->with('success', 'User updated Successfully');
        } else {
            return redirect()->route('users')->with('failed', 'User Updating Failed');
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
        $user = User::find($id);
        $del = $user->delete();

        if($del) {
            return back()->with('success', 'User Deleted Successfully');
        } else {
            return back()->with('failed', 'User Deleting Failed');
        }
    }
}
