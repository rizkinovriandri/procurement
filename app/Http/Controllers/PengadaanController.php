<?php

namespace App\Http\Controllers;
use App\Pengadaan;

use App\Imports\PengadaanImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // return data ke view

        
        //$pengadaans = DB::table('pengadaans')->orderBy('created_at', 'desc')->get();
        //$pengadaans = Pengadaan::with('rfx1')->get();

        $pengadaans = DB::table('pengadaans')
        ->join('rfxs', 'pengadaans.rfx', '=', 'rfxs.rfx_no');
        $pengadaans = $pengadaans->get();     
        // return data ke view
        return view('pengadaan.pengadaan_list', ['pengadaans' => $pengadaans]);

        //return view('pengadaan.pengadaan_list');
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

    public function import(Request $request)
    {
        // validasi
		$this->validate($request, [
			'filePengadaan' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('filePengadaan');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('documents/pengadaan',$nama_file);
 
		// import data
        Excel::import(new PengadaanImport, public_path('/documents/pengadaan/'.$nama_file));
        
        //delete file setelah import
        $file_path = public_path().'/documents/pengadaan/'.$nama_file;        
        unlink($file_path);

		// alihkan halaman kembali
        return redirect('/pengadaans')->with('success','Data Berhasil di import');;
        
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
    }
}
