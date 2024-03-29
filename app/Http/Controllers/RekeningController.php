<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rekening;
use App\User;
use App\role_user;
use App\Vendor;
use Auth;
use Carbon\Carbon;
use File;

class RekeningController extends Controller
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
        //
        $validatedData = $request->validate([
            'NoRek' => 'required',
            'PemegangRekening' => 'required',
            'NamaBank' => 'required',
            'Cabang' => 'required',
            'FileRefBank' => 'mimes:pdf|max:3000',
            
            ]);
    
            $rekening = new Rekening;

            if($request->hasFile('FileRefBank')){
                // menyimpan data file yang diupload ke variabel $file
                $file = $request->file('FileRefBank');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'rekening';
    
                $fileName = md5(time()) . '.' . $extension;;
                // $fileName = $akta->getNextId();
                $rekening->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
            }

            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            
            $rekening->no_rekening = $request->input('NoRek');
            $rekening->vendor_id = $vendor_id;
            $rekening->pemegang_rekening = $request->input('PemegangRekening');
            $rekening->nama_bank = $request->input('NamaBank');
            $rekening->cabang = $request->input('Cabang');
            $rekening->mata_uang = $request->input('MataUang');
            
    
            $rekening->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Nomor Rekening berhasil disimpan');
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
            'NoRek' => 'required',
            'PemegangRekening' => 'required',
            'NamaBank' => 'required',
            'Cabang' => 'required',
            'FileRefBank' => 'mimes:pdf|max:3000',
            ]);

            $rekening = Rekening::find($request->id_rekening);
            $vendor_id = $rekening->vendor_id;
            $rekening->no_rekening = $request->input('NoRek');
            $rekening->pemegang_rekening = $request->input('PemegangRekening');
            $rekening->nama_bank = $request->input('NamaBank');
            $rekening->cabang = $request->input('Cabang');
            $rekening->mata_uang = $request->input('MataUang');

            // menyimpan data file yang diupload ke variabel $file
            if($request->hasFile('FileRefBank')){ 
                $file = $request->file('FileRefBank');
                $extension = $file->getClientOriginalExtension();
                $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'rekening';
    
                //Delete file yang sebelumnya
                $file_path = public_path().'/documents/rekening/'.$rekening->filename;
                $check_file = File::exists($file_path);
                if ($check_file && $rekening->filename<>""){
                    unlink($file_path);
                }
    
                $fileName = md5(time()) . '.' . $extension;
                // $fileName = $akta->getNextId();
                $rekening->filename = $fileName;
                
                // upload file
                $file->move($destination_folder,$fileName);
                }
    
                $rekening->save();
                //dd($request->all());
                return redirect('/vendors/'.$vendor_id)->with('success','Data Rekening Updated');
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
        $rekening = Rekening::find($id);
        $vendor_id = $rekening->vendor_id;
        $file_path = public_path().'/documents/rekening/'.$rekening->filename;
        $check_file = File::exists($file_path);
        if ($check_file && $rekening->filename<>""){
            unlink($file_path);
        }
        //File::delete($file_path);
        $rekening->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Rekening Deleted');
    }
}
