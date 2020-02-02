<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Api;
use Auth;
use Carbon\Carbon;
use File;

class ApiController extends Controller
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
            
            'FileApi' => 'required|mimes:pdf|max:2000',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('FileApi');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'api';
    
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_api = $request->input('TanggalPenerbitan');
            $tgl_berlaku = $request->input('MasaBerlaku');
    
            $api = new Api;
            $api->no_dokumen = $request->input('NomorDokumen');
            $api->vendor_id = $vendor_id;
            $api->tgl_penerbitan = Carbon::parse($tgl_api)->format('Y-m-d H:i:s');
            $api->instansi_penerbit = $request->input('InstansiPenerbit');
            $api->masa_berlaku_status = $request->input('MasaBerlakuStatus');
            $api->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');
    
            $fileName = md5(time()) . '.' . $extension;;
            // $fileName = $akta->getNextId();
            $api->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
    
            $api->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Angka Pengenal Importir berhasil disimpan');
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

            'MasaBerlaku' => 'required_if:MasaBerlakuStatus,==,1',
            
            ]);

            $tgl_siujk = $request->input('TanggalPenerbitan');
            $tgl_berlaku = $request->input('MasaBerlaku');
    
            $api = Api::find($request->id_api);
            $vendor_id = $api->vendor_id;
            $api->no_dokumen = $request->input('NomorDokumen');
            $api->tgl_penerbitan = Carbon::parse($tgl_siujk)->format('Y-m-d H:i:s');
            $api->instansi_penerbit = $request->input('InstansiPenerbit');
            $api->masa_berlaku_status = $request->input('MasaBerlakuStatus');
            $api->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');

            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('FileApi')){ 
            $file = $request->file('FileApi');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'api';

            //Delete file yang sebelumnya
            $file_path = public_path().'/documents/api/'.$api->filename;
            $check_file = File::exists($file_path);
            if ($check_file){
                unlink($file_path);
            }

            $fileName = md5(time()) . '.' . $extension;
            // $fileName = $akta->getNextId();
            $api->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
            }

            $api->save();
            //dd($request->all());
            return redirect('/vendors/'.$vendor_id)->with('success','Data API Updated');

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
        $api = Api::find($id);
        $vendor_id = $api->vendor_id;
        $file_path = public_path().'/documents/api/'.$api->filename;
        $check_file = File::exists($file_path);
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $api->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','API Deleted');
    }
}
