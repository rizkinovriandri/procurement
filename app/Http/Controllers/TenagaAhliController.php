<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\TenagaAhli;
use Auth;
use Carbon\Carbon;
use File;

class TenagaAhliController extends Controller
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
            
            'NamaPersonil' => 'required',
            'PendidikanTerakhir' => 'required',
            'Keahlian' => 'required',
            'Pengalaman' => 'required|numeric',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
    
            $tenagaahli = new TenagaAhli;
            
            $tenagaahli->vendor_id = $vendor_id;
            $tenagaahli->nama = $request->input('NamaPersonil');
            $tenagaahli->pendidikan = $request->input('PendidikanTerakhir');
            $tenagaahli->keahlian = $request->input('Keahlian');
            $tenagaahli->pengalaman = $request->input('Pengalaman');
            $tenagaahli->status = $request->input('Status');
        
            $tenagaahli->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Data Personil berhasil disimpan');
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
        //
        $tenagaahli = TenagaAhli::find($id);
        $vendor_id = $tenagaahli->vendor_id;
        
        $tenagaahli->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Personil Deleted');
    }
}
