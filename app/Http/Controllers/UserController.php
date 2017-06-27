<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the users
        $users = User::all();

        // load the view and pass the users
        // return view('user.index', ['users' => $users]);
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        // // store
        // $user = new User;
        // $user->name       = Input::get('name');
        // $user->email      = Input::get('email');
        // $user->permissions = Input::get('permissions');
        // $user->save();

        // store
        $user = new User;
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->password      = "hol4_mund0";
        $user->permission = $request->input('permission');
        $user->save();

        // redirect
        // Session::flash('message', 'Successfully created user!');
        // return Redirect::to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
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
        return view('user.edit', ['user' => $user]);
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
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->permission = $request->input('permission');
        $user->save();
        // Session::flash('message', 'Successfully created user!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
