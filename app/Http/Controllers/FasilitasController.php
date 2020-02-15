<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Fasilitas;
use Auth;
use Carbon\Carbon;
use File;

class FasilitasController extends Controller
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
            'NamaPeralatan' => 'required',
            'Spesifikasi' => 'required',
            'Jumlah' => 'required|numeric',
            'TahunPembuatan' => 'required|numeric',
           
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
    
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            
            $fasilitas = new Fasilitas;

            $fasilitas->vendor_id = $vendor_id;
            $fasilitas->nama_peralatan = $request->input('NamaPeralatan');
            $fasilitas->spesifikasi = $request->input('Spesifikasi');
            $fasilitas->jumlah = $request->input('Jumlah');
            $fasilitas->tahun_pembuatan = $request->input('TahunPembuatan');
    
    
            $fasilitas->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Fasilitas berhasil disimpan');

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
            'NamaPeralatan' => 'required',
            'Spesifikasi' => 'required',
            'Jumlah' => 'required|numeric',
            'TahunPembuatan' => 'required|numeric',
           
            ]);

            $fasilitas = Fasilitas::find($request->id_fasilitas);
            $vendor_id = $fasilitas->vendor_id;
            $fasilitas->nama_peralatan = $request->input('NamaPeralatan');
            $fasilitas->spesifikasi = $request->input('Spesifikasi');
            $fasilitas->jumlah = $request->input('Jumlah');
            $fasilitas->tahun_pembuatan = $request->input('TahunPembuatan');

            $fasilitas->save();
                //dd($request->all());
                return redirect('/vendors/'.$vendor_id)->with('success','Data Fasilitas Updated');
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
        $fasilitas = Fasilitas::find($id);
        $vendor_id = $fasilitas->vendor_id;
       
        $fasilitas->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Peralatan / Fasilitas Deleted');
    }
}
