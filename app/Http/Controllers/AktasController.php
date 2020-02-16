<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Akta;
use Auth;
use Carbon\Carbon;
use File;

class AktasController extends Controller
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
        'NamaNotaris' => 'required',
        'NomorAkta' => 'required',
        'TanggalAkta' => 'required',
        'FileAkta' => 'required|mimes:pdf|max:2000',
        
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('FileAkta');
        $extension = $file->getClientOriginalExtension();
        $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'akta';

        $vendor_id = $request->input('vendor_id');
        $vendor_name = $request->input('vendor_name');
        $tgl_akta = $request->input('TanggalAkta');

        
        $akta = new Akta;
        $akta->jenis = $request->input('JenisAkta');
        $akta->vendor_id = $vendor_id;
        $akta->nama_notaris = $request->input('NamaNotaris');
        $akta->nomor = $request->input('NomorAkta');
        $akta->tgl_akta = Carbon::parse($tgl_akta)->format('Y-m-d H:i:s');

        $fileName = md5(time()) . '.' . $extension;
        // $fileName = $akta->getNextId();
        $akta->filename = $fileName;
        
        // upload file
        $file->move($destination_folder,$fileName);

        $akta->save();
        //return "store";
        return redirect('/vendors/'.$vendor_id)->with('success','Akta berhasil disimpan');
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
            'NamaNotaris' => 'required',
            'NomorAkta' => 'required',
            'TanggalAkta' => 'required',
        ]);

        

        $tgl_akta = $request->input('TanggalAkta');

        $akta = Akta::find($request->id_akta);
        $vendor_id = $akta->vendor_id;
        $akta->jenis = $request->input('JenisAkta');
        $akta->nama_notaris = $request->input('NamaNotaris');
        $akta->nomor = $request->input('NomorAkta');
        $akta->tgl_akta = Carbon::parse($tgl_akta)->format('Y-m-d H:i:s');

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasFile('FileAkta')){ 
            $file = $request->file('FileAkta');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'akta';

            //Delete file yang sebelumnya
            $file_path = public_path().'/documents/akta/'.$akta->filename;
            $check_file = File::exists($file_path);
            if ($check_file){
                unlink($file_path);
            }

            $fileName = md5(time()) . '.' . $extension;
            // $fileName = $akta->getNextId();
            $akta->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
        }
        
        $akta->save();
        //dd($request->all());
        return redirect('/vendors/'.$vendor_id)->with('success','Data Akta Updated');
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
        $akta = Akta::find($id);
        $vendor_id = $akta->vendor_id;
        $file_path = public_path().'/documents/akta/'.$akta->filename;
        $check_file = File::exists($file_path);
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $tabname = 'akta';
        $akta->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Akta Deleted');
        //return redirect('/vendors/'.$vendor_id)->with(['activetab'=>$tabname], 'success','Akta Deleted');
    }
}
