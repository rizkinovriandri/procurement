<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubJasa;
use Auth;

class SubJasaController extends Controller
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
            
            'SubJasa' => 'required',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            $subjasa = new SubJasa;
            
            $subjasa->vendor_id = $vendor_id;
            $subjasa->sub_bidang = $request->input('SubJasa');
           
            $subjasa->save();
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
        $subjasa = SubJasa::find($id);
        $vendor_id = $subjasa->vendor_id;
        $subjasa->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Sub Bidang Pemasok berhasil dihapus');
    }
}
