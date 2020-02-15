<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Lapkeu;
use Auth;
use Carbon\Carbon;
use File;

class LapkeuController extends Controller
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
        $validatedData = $request->validate([
            
            'NilaiAsset' => 'required',
            'NilaiPenjualan' => 'required',
            'TahunLaporan' => 'required|numeric',
            'FileLapkeu' => 'required|mimes:pdf|max:2000',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('FileLapkeu');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'lapkeu';
    
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            $lapkeu = new Lapkeu;
            
            $lapkeu->vendor_id = $vendor_id;
            
            $lapkeu->cur_nilai_asset = $request->input('CurNilaiAsset');
            $lapkeu->nilai_asset = $request->input('NilaiAsset');
            $lapkeu->cur_nilai_penjualan = $request->input('CurNilaiPenjualan');
            $lapkeu->nilai_penjualan = $request->input('NilaiPenjualan');
            $lapkeu->tahun = $request->input('TahunLaporan');
    
            $fileName = md5(time()) . '.' . $extension;;
            // $fileName = $akta->getNextId();
            $lapkeu->filename = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
    
            $lapkeu->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Laporan Keuangan berhasil disimpan');
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
            
            'NilaiAsset' => 'required',
            'NilaiPenjualan' => 'required',
            'TahunLaporan' => 'required|numeric',
            ]);

            $lapkeu = Lapkeu::find($request->id_lapkeu);
            $vendor_id = $lapkeu->vendor_id;
            $lapkeu->cur_nilai_asset = $request->input('CurNilaiAsset');
            $lapkeu->nilai_asset = $request->input('NilaiAsset');
            $lapkeu->cur_nilai_penjualan = $request->input('CurNilaiPenjualan');
            $lapkeu->nilai_penjualan = $request->input('NilaiPenjualan');
            $lapkeu->tahun = $request->input('TahunLaporan');

            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('FileLapkeu')){ 
                $file = $request->file('FileLapkeu');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'lapkeu';
    
                //Delete file yang sebelumnya
                $file_path = public_path().'/documents/lapkeu/'.$lapkeu->filename;
                $check_file = File::exists($file_path);
                if ($check_file){
                    unlink($file_path);
                }
    
                $fileName = md5(time()) . '.' . $extension;
                // $fileName = $akta->getNextId();
                $lapkeu->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
                }
    
                $lapkeu->save();
                //dd($request->all());
                return redirect('/vendors/'.$vendor_id)->with('success','Data Laporan Keuangan Updated');

            
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
        $lapkeu = Lapkeu::find($id);
        $vendor_id = $lapkeu->vendor_id;
        $file_path = public_path().'/documents/lapkeu/'.$lapkeu->filename;
        $check_file = File::exists($file_path);
        if ($check_file){
            unlink($file_path);
        }
        //File::delete($file_path);
        $lapkeu->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Laporan Keuangan Deleted');
    }
}
