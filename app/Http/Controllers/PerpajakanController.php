<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Perpajakan;
use Auth;
use Carbon\Carbon;
use File;

class PerpajakanController extends Controller
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
            'TahunPenerbitan' => 'required|numeric',
            'FilePerpajakan' => 'required|mimes:pdf|max:2000',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('FilePerpajakan');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'perpajakan';
    
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            $perpajakan = new Perpajakan;
            
            $perpajakan->vendor_id = $vendor_id;
            $perpajakan->jenis_dokumen = $request->input('JenisDokumen');
            $perpajakan->nomor_dokumen = $request->input('NomorDokumen');
            $perpajakan->tahun = $request->input('TahunPenerbitan');
    
            $fileName = md5(time()) . '.' . $extension;;
            // $fileName = $akta->getNextId();
            $perpajakan->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
    
            $perpajakan->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Dokumen Perpajakan berhasil disimpan');
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
            'TahunPenerbitan' => 'required|numeric',
            
            ]);

            $perpajakan = Perpajakan::find($request->id_perpajakan);
            $vendor_id = $perpajakan->vendor_id;
            $perpajakan->jenis_dokumen = $request->input('JenisDokumen');
            $perpajakan->nomor_dokumen = $request->input('NomorDokumen');
            $perpajakan->tahun = $request->input('TahunPenerbitan');

            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('FilePerpajakan')){ 
                $file = $request->file('FilePerpajakan');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'perpajakan';
    
                //Delete file yang sebelumnya
                $file_path = public_path().'/documents/perpajakan/'.$perpajakan->filename;
                $check_file = File::exists($file_path);
                if ($check_file){
                    unlink($file_path);
                }
    
                $fileName = md5(time()) . '.' . $extension;
                // $fileName = $akta->getNextId();
                $perpajakan->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
                }
    
                $perpajakan->save();
                //dd($request->all());
                return redirect('/vendors/'.$vendor_id)->with('success','Data Perpajakan Updated');

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
        $perpajakan = Perpajakan::find($id);
        $vendor_id = $perpajakan->vendor_id;
        $file_path = public_path().'/documents/perpajakan/'.$perpajakan->filename;
        $check_file = File::exists($file_path);
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $perpajakan->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Dokumen Perpajakan Deleted');
    }
}
