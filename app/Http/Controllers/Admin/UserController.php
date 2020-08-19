<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\User;
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
        return UserResource::collection(User::all());
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
        $request->validate([
            'name' => 'required',
            'restaurant_name' => 'required',
            'password' => 'required|min:5',
            'phone' => 'required|max:11',
            'location' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::create([
            'name' => $request->name,
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'phone' => $request->phone,
            'location' => $request->location,
            'role' => $request->role,
        ]);
        // if ($request->has('role')) {
        //     $user->attachRoles($request->role['name']);
        // }
        // if ($request->has('permissions')) {
        //     $user->givePermissionsTo(collect($request->permissions)->pluck('id')->toArray());
        // }

        return response(['message'=>'User Created', 'user'=>$user]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}