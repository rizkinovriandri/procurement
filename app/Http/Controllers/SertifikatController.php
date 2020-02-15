<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sertifikat;
use App\User;
use App\role_user;
use App\Vendor;
use Auth;
use Carbon\Carbon;
use File;

class SertifikatController extends Controller
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
            'NomorSertifikat' => 'required',
            'NamaSertifikat' => 'required',
            'InstansiPenerbit' => 'required',
            'BerlakuMulai' => 'required',
            
            'FileSertifikat' => 'required|mimes:pdf|max:2000',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('FileSertifikat');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'sertifikat';
    
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_awal = $request->input('BerlakuMulai');
            $tgl_akhir = $request->input('BerlakuSampai');
    
            $sertifikat = new Sertifikat;
            $sertifikat->type = $request->input('JenisSertifikat');
            $sertifikat->vendor_id = $vendor_id;
            $sertifikat->nomor = $request->input('NomorSertifikat');
            $sertifikat->nama = $request->input('NamaSertifikat');
            $sertifikat->instansi_penerbit = $request->input('InstansiPenerbit');
            $sertifikat->tgl_terbit = Carbon::parse($tgl_awal)->format('Y-m-d H:i:s');
            $sertifikat->tgl_kadaluarsa = Carbon::parse($tgl_akhir)->format('Y-m-d H:i:s');
    
            $fileName = md5(time()) . '.' . $extension;;
            // $fileName = $akta->getNextId();
            $sertifikat->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
    
            $sertifikat->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Sertifikat berhasil disimpan');
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
            'NomorSertifikat' => 'required',
            'NamaSertifikat' => 'required',
            'InstansiPenerbit' => 'required',
            'BerlakuMulai' => 'required',
            
            ]);

            $tgl_awal = $request->input('BerlakuMulai');
            $tgl_akhir = $request->input('BerlakuSampai');

            $sertifikat = Sertifikat::find($request->id_sertifikat);
            $vendor_id = $sertifikat->vendor_id;
            $sertifikat->type = $request->input('JenisSertifikat');
            $sertifikat->nomor = $request->input('NomorSertifikat');
            $sertifikat->nama = $request->input('NamaSertifikat');
            $sertifikat->instansi_penerbit = $request->input('InstansiPenerbit');
            $sertifikat->tgl_terbit = Carbon::parse($tgl_awal)->format('Y-m-d H:i:s');
            $sertifikat->tgl_kadaluarsa = Carbon::parse($tgl_akhir)->format('Y-m-d H:i:s');

            

            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('FileSertifikat')){ 
                $file = $request->file('FileSertifikat');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'sertifikat';
    
                //Delete file yang sebelumnya
                $file_path = public_path().'/documents/sertifikat/'.$sertifikat->filename;
                $check_file = File::exists($file_path);
                if ($check_file){
                    unlink($file_path);
                }
    
                $fileName = md5(time()) . '.' . $extension;
                // $fileName = $akta->getNextId();
                $sertifikat->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
                }
    
                $sertifikat->save();
                //dd($request->all());
                return redirect('/vendors/'.$vendor_id)->with('success','Data Sertifikat Updated');
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
        $sertifikat = Sertifikat::find($id);
        $vendor_id = $sertifikat->vendor_id;
        $file_path = public_path().'/documents/sertifikat/'.$sertifikat->filename;
        $check_file = File::exists($file_path);
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $sertifikat->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data sertifikat Deleted');
    }
}
