<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Siup;
use Auth;
use Carbon\Carbon;
use File;

class SiupController extends Controller
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
            
            'FileSiup' => 'mimes:pdf|max:6000',
            
            ]);
    
            $siup = new Siup;

            if($request->hasFile('FileSiup')){
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('FileSiup');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'siupnib';

                $fileName = md5(time()) . '.' . $extension;;
                // $fileName = $akta->getNextId();
                $siup->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);

            }

            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_siup = $request->input('TanggalPenerbitan');
            $tgl_berlaku = $request->input('MasaBerlaku');
    
            
            $siup->jenis_izin = $request->input('JenisIzin');
            $siup->no_dokumen = $request->input('NomorDokumen');
            $siup->vendor_id = $vendor_id;
            $siup->tgl_penerbitan = Carbon::parse($tgl_siup)->format('Y-m-d H:i:s');
            $siup->instansi_penerbit = $request->input('InstansiPenerbit');
            $siup->masa_berlaku_status = $request->input('MasaBerlakuStatus');
            $siup->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');
    
           
    
            $siup->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','SIUP/NIB berhasil disimpan');
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
        $validatedData = $request->validate([
            'NomorDokumen' => 'required',
            'TanggalPenerbitan' => 'required',
            'InstansiPenerbit' => 'required',
            'FileSiup' => 'mimes:pdf|max:6000',
            'MasaBerlaku' => 'required_if:MasaBerlakuStatus,==,1', 
        ]);

        $tgl_siup = $request->input('TanggalPenerbitan');
        $tgl_berlaku = $request->input('MasaBerlaku');

        $siup = Siup::find($request->id_siup);
        $vendor_id = $siup->vendor_id;
        $siup->jenis_izin = $request->input('JenisIzin');
        $siup->no_dokumen = $request->input('NomorDokumen');
        $siup->tgl_penerbitan = Carbon::parse($tgl_siup)->format('Y-m-d H:i:s');
        $siup->instansi_penerbit = $request->input('InstansiPenerbit');
        $siup->masa_berlaku_status = $request->input('MasaBerlakuStatus');
        $siup->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasFile('FileSiup')){ 
            $file = $request->file('FileSiup');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'siupnib';

            //Delete file yang sebelumnya
            $file_path = public_path().'/documents/siupnib/'.$siup->filename;
            $check_file = File::exists($file_path);
            if ($check_file && $siup->filename<>""){
                unlink($file_path);
            }

            $fileName = md5(time()) . '.' . $extension;
            // $fileName = $akta->getNextId();
            $siup->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
        }

        $siup->save();
        //dd($request->all());
        return redirect('/vendors/'.$vendor_id)->with('success','Data SIUP / NIB Updated');
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
        $siup = Siup::find($id);
        $vendor_id = $siup->vendor_id;
        $file_path = public_path().'/documents/siupnib/'.$siup->filename;
        $check_file = File::exists($file_path);
        if ($check_file && $siup->filename<>""){
            unlink($file_path);
        }
         //File::delete($file_path);
        $siup->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','SIUP/NIB Deleted');
    }
}
