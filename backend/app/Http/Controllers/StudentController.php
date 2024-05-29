<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return User::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'course' => 'required',
            'role' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'email' => $credentials['email'],
            'firstname' => $credentials['firstname'],
            'lastname' => $credentials['lastname'],
            'middlename' => $credentials['middlename'],
            'course' => $credentials['course'],
            'role' => $credentials['role'],
            'birthday' => $credentials['birthday'],
            'phone' => $credentials['phone'],
            'address' => $credentials['address'],
            'password' => bcrypt($credentials['password'])
        ]);

        return response('Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response(['user' => User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $credentials = $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'course' => 'required',
            'role' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::find($id);

        $user->email = $credentials['email'];
        $user->firstname = $credentials['firstname'];
        $user->lastname = $credentials['lastname'];
        $user->middlename = $credentials['middlename'];
        $user->course = $credentials['course'];
        $user->role = $credentials['role'];
        $user->birthday = $credentials['birthday'];
        $user->phone = $credentials['phone'];
        $user->address = $credentials['address'];
        $user->update();

        return response('updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return response('', 200);
    }
}
