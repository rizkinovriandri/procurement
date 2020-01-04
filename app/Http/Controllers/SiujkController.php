<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Siujk;
use Auth;
use Carbon\Carbon;
use File;

class SiujkController extends Controller
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
            'NomorDokumen' => 'required',
            'TanggalPenerbitan' => 'required',
            'InstansiPenerbit' => 'required',

            'MasaBerlaku' => 'required_if:MasaBerlakuStatus,==,1',
            
            'FileSiujk' => 'required|mimes:pdf|max:2000',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('FileSiujk');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'siujk';
    
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_siujk = $request->input('TanggalPenerbitan');
            $tgl_berlaku = $request->input('MasaBerlaku');
    
            $siujk = new Siujk;
            $siujk->no_dokumen = $request->input('NomorDokumen');
            $siujk->vendor_id = $vendor_id;
            $siujk->tgl_penerbitan = Carbon::parse($tgl_siujk)->format('Y-m-d H:i:s');
            $siujk->instansi_penerbit = $request->input('InstansiPenerbit');
            $siujk->masa_berlaku_status = $request->input('MasaBerlakuStatus');
            $siujk->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');
    
            $fileName = md5(time()) . '.' . $extension;;
            // $fileName = $akta->getNextId();
            $siujk->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
    
            $siujk->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','SIUJK berhasil disimpan');
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
        $siujk = Siujk::find($id);
        $vendor_id = $siujk->vendor_id;
        $file_path = public_path().'/documents/siujk/'.$siujk->filename;
        $check_file = File::exists($file_path);
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $siujk->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','SIUJK Deleted');
    }
}
