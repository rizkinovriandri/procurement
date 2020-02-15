<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Pengalaman;
use Auth;
use Carbon\Carbon;
use File;

class PengalamanController extends Controller
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
            'NamaPelanggan' => 'required',
            'NamaPekerjaan' => 'required',
            'KeteranganSingkat' => 'required',
            'NilaiProyek' => 'required|numeric',
            'NomorKontrak' => 'required',
            'TanggalMulai' => 'required',
            'TanggalSelesai' => 'required',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
           
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            $tgl_mulai = $request->input('TanggalMulai');
            $tgl_selesai = $request->input('TanggalSelesai');
    
            $pengalaman = new Pengalaman;
            $pengalaman->nama_pelanggan = $request->input('NamaPelanggan');
            $pengalaman->vendor_id = $vendor_id;
            $pengalaman->nama_pekerjaan = $request->input('NamaPekerjaan');
            $pengalaman->keterangan = $request->input('KeteranganSingkat');
            $pengalaman->cur_nilai_proyek = $request->input('CurNilaiProyek');
            $pengalaman->nilai_proyek = $request->input('NilaiProyek');
            $pengalaman->nomor_kontrak = $request->input('NomorKontrak');
            $pengalaman->tgl_mulai_proyek = Carbon::parse($tgl_mulai)->format('Y-m-d H:i:s');
            $pengalaman->tgl_selesai_proyek = Carbon::parse($tgl_selesai)->format('Y-m-d H:i:s');
            $pengalaman->contact_person = $request->input('ContactPerson');
            $pengalaman->no_contact_person = $request->input('NoContact');
    
            $pengalaman->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Data Pengalaman berhasil disimpan');
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
            'NamaPelanggan' => 'required',
            'NamaPekerjaan' => 'required',
            'KeteranganSingkat' => 'required',
            'NilaiProyek' => 'required|numeric',
            'NomorKontrak' => 'required',
            'TanggalMulai' => 'required',
            'TanggalSelesai' => 'required',
            
            ]);

            $tgl_mulai = $request->input('TanggalMulai');
            $tgl_selesai = $request->input('TanggalSelesai');

            $pengalaman = Pengalaman::find($request->id_pengalaman);
            $vendor_id = $pengalaman->vendor_id;

            $pengalaman->nama_pelanggan = $request->input('NamaPelanggan');
            $pengalaman->nama_pekerjaan = $request->input('NamaPekerjaan');
            $pengalaman->keterangan = $request->input('KeteranganSingkat');
            $pengalaman->cur_nilai_proyek = $request->input('CurNilaiProyek');
            $pengalaman->nilai_proyek = $request->input('NilaiProyek');
            $pengalaman->nomor_kontrak = $request->input('NomorKontrak');
            $pengalaman->tgl_mulai_proyek = Carbon::parse($tgl_mulai)->format('Y-m-d H:i:s');
            $pengalaman->tgl_selesai_proyek = Carbon::parse($tgl_selesai)->format('Y-m-d H:i:s');
            $pengalaman->contact_person = $request->input('ContactPerson');
            $pengalaman->no_contact_person = $request->input('NoContact');

            $pengalaman->save();
                //dd($request->all());
            return redirect('/vendors/'.$vendor_id)->with('success','Data Pengalaman Updated');

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
        $pengalaman = Pengalaman::find($id);
        $vendor_id = $pengalaman->vendor_id;
        
        $pengalaman->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data pengalaman Deleted');
    }
}
