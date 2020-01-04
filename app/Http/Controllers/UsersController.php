<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\role_user;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('user_list');
        //$roleusers = role_user::all()->toArray();
        //eturn view('user_list', compact('roleusers'));
        

        //$users = User::with('userstat')->toArray();
        $users = User::all();
        // return data ke view
        return view('user_list', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'NIK' => 'required|numeric|unique:users',
            'Nama' => 'required|string',
            'email' => 'required|email:rfc',
            'Password' => 'required|min:8',
            'RetypePassword' => 'required|same:Password',
            'UserType' => 'required',
            
            ]);
    
            $user = new User;
            $user->nik = $request->input('NIK');
            $user->name = $request->input('Nama');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('RetypePassword'));
            
            //$user->remember_token = $request->input('RetypePassword');
            $user->save();

            $roleuser = new role_user;
            $roleuser->role_id = $request->input('UserType');
            $roleuser->user_type = "App\User";
            //$user->role_user->role_id = $request->input('UserType');
            
            $user->roleusers()->save($roleuser);
            
            //return "store";
            return redirect('/admin/users')->with('success','Data User berhasil disimpan');
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

        $user = User::find($id);
        return view('layouts.edit_user', compact('user'));
        //return view('vendor.edit')->with('vendor',$vendor);
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
        $this->validate($request, [
            'NIK' => 'required|numeric',
            'Nama' => 'required|string',
            'email' => 'required|email:rfc',
            'UserType' => 'required',

        ]);
        
        //storing data vendor
       
        $user = User::find($id);

        //$tempkeluarga = $request->input('keluarga');

        // if ($tempkeluarga = 1) {
        //     $namakeluarga = $request->input('nama_pegawai');
        // } else {
        //     $namakeluarga = "";
        // }

        $user->nik = $request->input('NIK');
        $user->name = $request->input('Nama');
        $user->email = $request->input('email');
        //$user->roleuser->role_id = $request->input('UserType');
           
        $user->save();

        $roleuser = role_user::find($id);
        $roleuser->role_id = $request->input('UserType');
            
        $user->roleusers()->save($roleuser);

       

        return redirect('admin/users')->with('success','User Updated');
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
        //return "destroy dayt"

        $user = User::find($id);
        $user->roleusers()->delete();
        $user->delete();

        return redirect('admin/users')->with('success','User Deleted');
    }
}
