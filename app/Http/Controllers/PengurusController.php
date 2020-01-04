<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Pengurus;
use Auth;
use Carbon\Carbon;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         //
         $validatedData = $request->validate([
            'Nama' => 'required',
            'Jabatan' => 'required',
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            $pengurus = new Pengurus;
            $pengurus->nama = $request->input('Nama');
            $pengurus->vendor_id = $vendor_id;
            $pengurus->jabatan = $request->input('Jabatan');
            $pengurus->no_telepon = $request->input('NomorTelepon');
            $pengurus->no_hp = $request->input('NomorHp');
            $pengurus->email = $request->input('email');
    
            // $fileName = $akta->getNextId();
            // upload file
    
            $pengurus->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Data Pengurus berhasil disimpan');
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
        //
        $pengurus = Pengurus::find($id);
        $vendor_id = $pengurus->vendor_id;
        $pengurus->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Pengurus Deleted');
    }
}
