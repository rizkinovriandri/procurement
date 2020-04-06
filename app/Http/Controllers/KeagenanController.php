<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keagenan;
use App\User;
use App\role_user;
use App\Vendor;
use Auth;
use Carbon\Carbon;
use File;

class KeagenanController extends Controller
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
            'NamaPrinciple' => 'required',
            'JenisBarang' => 'required',
            'KeagenanBerlakuMulai' => 'required',
            //'KeagenanBerlakuSampai' => 'required',
            
            'FileKeagenan' => 'mimes:pdf,jpg,jpeg,png|max:10000',
            
            ]);
    
            $keagenan = new Keagenan;

            if($request->hasFile('FileKeagenan')){
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('FileKeagenan');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'keagenan';
        
                $fileName = md5(time()) . '.' . $extension;;
                // $fileName = $akta->getNextId();
                $keagenan->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
            
            }

            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_awal = $request->input('KeagenanBerlakuMulai');
            $tgl_akhir = $request->input('KeagenanBerlakuSampai');
    
            
            $keagenan->nama_principle = $request->input('NamaPrinciple');
            $keagenan->vendor_id = $vendor_id;
            $keagenan->jenis_barang = $request->input('JenisBarang');
            $keagenan->tgl_berlaku_mulai = Carbon::parse($tgl_awal)->format('Y-m-d H:i:s');
            
            if ($tgl_akhir<>""){
                $keagenan->tgl_berlaku_sampai = Carbon::parse($tgl_akhir)->format('Y-m-d H:i:s');
            }
            else {
                $keagenan->tgl_berlaku_sampai = null;
            }

            $keagenan->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Data keagenan berhasil disimpan');
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
            'NamaPrinciple' => 'required',
            'JenisBarang' => 'required',
            'KeagenanBerlakuMulai' => 'required',
            //'KeagenanBerlakuSampai' => 'required',
            'FileKeagenan' => 'mimes:pdf,jpg,jpeg,png|max:10000',
            //'FileKeagenan' => 'required|mimes:pdf,jpg,jpeg,png|max:10000',
            ]);

            $tgl_awal = $request->input('KeagenanBerlakuMulai');
            $tgl_akhir = $request->input('KeagenanBerlakuSampai');

            $keagenan = Keagenan::find($request->id_keagenan);
            $vendor_id = $keagenan->vendor_id;
            $keagenan->nama_principle = $request->input('NamaPrinciple');
            $keagenan->vendor_id = $vendor_id;
            $keagenan->jenis_barang = $request->input('JenisBarang');
            $keagenan->tgl_berlaku_mulai = Carbon::parse($tgl_awal)->format('Y-m-d H:i:s');

            if ($tgl_akhir<>""){
                $keagenan->tgl_berlaku_sampai = Carbon::parse($tgl_akhir)->format('Y-m-d H:i:s');
            }
            else {
                $keagenan->tgl_berlaku_sampai = null;
            }

            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('FileKeagenan')){ 
                $file = $request->file('FileKeagenan');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'keagenan';
    
                //Delete file yang sebelumnya
                $file_path = public_path().'/documents/keagenan/'.$keagenan->filename;
                $check_file = File::exists($file_path);
                if ($check_file && $keagenan->filename<>""){
                    unlink($file_path);
                }
    
                $fileName = md5(time()) . '.' . $extension;
                // $fileName = $akta->getNextId();
                $keagenan->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
                }
    
                $keagenan->save();
                //dd($request->all());
                return redirect('/vendors/'.$vendor_id)->with('success','Data Keagenan Updated');
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
        $keagenan = Keagenan::find($id);
        $vendor_id = $keagenan->vendor_id;
        $file_path = public_path().'/documents/keagenan/'.$keagenan->filename;
        $check_file = File::exists($file_path);
        if ($check_file  && $keagenan->filename<>""){
            unlink($file_path);
        }
        //File::delete($file_path);
        $keagenan->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data keagenan Deleted');
    }
}
