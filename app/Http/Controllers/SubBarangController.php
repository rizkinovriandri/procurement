<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubBarang;
use Auth;

class SubBarangController extends Controller
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
            
            'SubBarang' => 'required',
            'NamaBarang' => 'required',
            'Merk' => 'required',
            'sumber' => 'required',
            
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            $subbarang = new SubBarang;
            
            $subbarang->vendor_id = $vendor_id;
            
            $subbarang->sub_bidang = $request->input('SubBarang');
            $subbarang->nama_barang = $request->input('NamaBarang');
            $subbarang->merk = $request->input('Merk');
            $subbarang->sumber = $request->input('sumber');
    
            $subbarang->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Data Sub Bidang berhasil disimpan');
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
            
            'SubBarang' => 'required',
            'NamaBarang' => 'required',
            'Merk' => 'required',
            'sumber' => 'required',
            
            ]);

            $subbarang = SubBarang::find($request->id_bidang);
            $vendor_id = $subbarang->vendor_id;
            $subbarang->sub_bidang = $request->input('SubBarang');
            $subbarang->nama_barang = $request->input('NamaBarang');
            $subbarang->merk = $request->input('Merk');
            $subbarang->sumber = $request->input('sumber');

            $subbarang->save();
            //dd($request->all());
             return redirect('/vendors/'.$vendor_id)->with('success','Data Bidang Updated');
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
        $subbarang = SubBarang::find($id);
        $vendor_id = $subbarang->vendor_id;
        $subbarang->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Sub Bidang Pemasok berhasil dihapus');
        
    }
}
