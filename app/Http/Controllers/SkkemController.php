<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Skkem;
use Auth;
use Carbon\Carbon;
use File;

class SkkemController extends Controller
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
        'NomorSK' => 'required',
        'TanggalSK' => 'required',
        'ModalDasar' => 'required',
        'ModalDisetor' => 'required',
        'FileSK' => 'required|mimes:pdf|max:2000',
        
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('FileSK');
        $extension = $file->getClientOriginalExtension();
        $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'skkem';

        $vendor_id = $request->input('vendor_id');
        $vendor_name = $request->input('vendor_name');
        $tgl_sk = $request->input('TanggalSK');

        $skkem = new Skkem;
        $skkem->nomor_sk = $request->input('NomorSK');
        $skkem->vendor_id = $vendor_id;
        $skkem->tgl_sk = Carbon::parse($tgl_sk)->format('Y-m-d H:i:s');
        $skkem->cur_modal_dasar = $request->input('CurModalDasar');
        $skkem->modal_dasar = $request->input('ModalDasar');
        $skkem->cur_modal_disetor = $request->input('CurModalDisetor');
        $skkem->modal_disetor = $request->input('ModalDisetor');

        $fileName = md5(time()) . '.' . $extension;;
        // $fileName = $akta->getNextId();
        $skkem->filename = $fileName;
        
        // upload file
        $file->move($destination_folder,$fileName);

        $skkem->save();
        //return "store";
        return redirect('/vendors/'.$vendor_id)->with('success','SK Kemenkumham berhasil disimpan');
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
        $skkem = Skkem::find($id);
        $vendor_id = $skkem->vendor_id;
        $file_path = public_path().'/documents/skkem/'.$skkem->filename;
        $check_file = File::exists($file_path);
        
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $skkem->delete();


        return redirect('/vendors/'.$vendor_id)->with('success','SK Kemenkumham Deleted');
    }
}
