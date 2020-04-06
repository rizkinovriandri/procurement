<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Pengurus;
use Auth;
use Carbon\Carbon;
use File;

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
            'PhotoPengurus' => 'mimes:jpeg,bmp,png|max:8000',
            ]);
    
            // menyimpan data file yang diupload ke variabel $file

            $pengurus = new Pengurus;
            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('PhotoPengurus')){ 
                $file = $request->file('PhotoPengurus');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'pengurus';

                // upload file

                $fileName = md5(time()) . '.' . $extension;
                // $fileName = $akta->getNextId();
                $pengurus->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
            }
            
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            
            $pengurus->nama = $request->input('Nama');
            $pengurus->vendor_id = $vendor_id;
            $pengurus->jabatan = $request->input('Jabatan');
            $pengurus->no_telepon = $request->input('NomorTelepon');
            $pengurus->no_hp = $request->input('NomorHp');
            $pengurus->email = $request->input('email');
    
            // $fileName = $akta->getNextId();
            
    
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
        $this->validate($request, [
            'Nama' => 'required',
            'Jabatan' => 'required',
            'PhotoPengurus' => 'mimes:jpeg,bmp,png|max:8000',
        ]);


        $pengurus = Pengurus::find($request->pengurus_id);
        $vendor_id = $pengurus->vendor_id;
        $pengurus->nama = $request->input('Nama');
        $pengurus->jabatan = $request->input('Jabatan');
        $pengurus->no_telepon = $request->input('NomorTelepon');
        $pengurus->no_hp = $request->input('NomorHp');
        $pengurus->email = $request->input('email');

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasFile('PhotoPengurus')){ 
            $file = $request->file('PhotoPengurus');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'pengurus';

            //Delete file yang sebelumnya
            $file_path = public_path().'/documents/pengurus/'.$pengurus->filename;
            $check_file = File::exists($file_path);
            if ($check_file && $pengurus->filename<>""){
                unlink($file_path);
            }

            $fileName = md5(time()) . '.' . $extension;
            // $fileName = $akta->getNextId();
            $pengurus->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
        }
        
        $pengurus->save();
        //dd($request->all());
        return redirect('/vendors/'.$vendor_id)->with('success','Data Pengurus Updated');
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

        $file_path = public_path().'/documents/pengurus/'.$pengurus->filename;
        $check_file = File::exists($file_path);
        if ($check_file && $pengurus->filename<>""){
            unlink($file_path);
        }

        $pengurus->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Pengurus Deleted');
    }
}
