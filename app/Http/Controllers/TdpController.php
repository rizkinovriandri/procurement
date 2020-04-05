<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Tdp;
use Auth;
use Carbon\Carbon;
use File;

class TdpController extends Controller
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
            
            'FileTdp' => 'mimes:pdf|max:6000',
            
            ]);
    
            $tdp = new Tdp;

            if($request->hasFile('FileTdp')){
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('FileTdp');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'tdp';
    
                $fileName = md5(time()) . '.' . $extension;;
                // $fileName = $akta->getNextId();
                $tdp->filename = $fileName;
            
                // upload file
                $file->move($destination_folder,$fileName);
            }
            
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_tdp = $request->input('TanggalPenerbitan');
            $tgl_berlaku = $request->input('MasaBerlaku');
    
            
            $tdp->no_dokumen = $request->input('NomorDokumen');
            $tdp->vendor_id = $vendor_id;
            $tdp->tgl_penerbitan = Carbon::parse($tgl_tdp)->format('Y-m-d H:i:s');
            $tdp->instansi_penerbit = $request->input('InstansiPenerbit');
            $tdp->masa_berlaku_status = $request->input('MasaBerlakuStatus');
            $tdp->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');
    
            
    
            $tdp->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','TDP berhasil disimpan');
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
            'FileTdp' => 'mimes:pdf|max:6000',
            'MasaBerlaku' => 'required_if:MasaBerlakuStatus,==,1',
            
            ]);

        $tgl_tdp = $request->input('TanggalPenerbitan');
        $tgl_berlaku = $request->input('MasaBerlaku');

        $tdp = Tdp::find($request->id_tdp);
        $vendor_id = $tdp->vendor_id;
        $tdp->no_dokumen = $request->input('NomorDokumen');
        $tdp->tgl_penerbitan = Carbon::parse($tgl_tdp)->format('Y-m-d H:i:s');
        $tdp->instansi_penerbit = $request->input('InstansiPenerbit');
        $tdp->masa_berlaku_status = $request->input('MasaBerlakuStatus');
        $tdp->berlaku_sampai = Carbon::parse($tgl_berlaku)->format('Y-m-d H:i:s');

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasFile('FileTdp')){ 
            $file = $request->file('FileTdp');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'tdp';

            //Delete file yang sebelumnya
            $file_path = public_path().'/documents/tdp/'.$tdp->filename;
            $check_file = File::exists($file_path);
            if ($check_file && $tdp->filename<>""){
                unlink($file_path);
            }

            $fileName = md5(time()) . '.' . $extension;
            // $fileName = $akta->getNextId();
            $tdp->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
        }


        $tdp->save();
        //dd($request->all());
        return redirect('/vendors/'.$vendor_id)->with('success','Data TDP Updated');

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
        $tdp = Tdp::find($id);
        $vendor_id = $tdp->vendor_id;
        $file_path = public_path().'/documents/tdp/'.$tdp->filename;
        $check_file = File::exists($file_path);
        if ($check_file && $tdp->filename<>""){
            unlink($file_path);
        }
        //File::delete($file_path);
        $tdp->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','TDP Deleted');
    }
}
