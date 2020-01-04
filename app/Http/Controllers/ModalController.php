<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Modal;
use Auth;
use Carbon\Carbon;
use File;

class ModalController extends Controller
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
            
            'ModalDasar' => 'required',
            'ModalDisetor' => 'required',
            
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
           
            $vendor_id = $request->input('vendor_id');
            $vendor_name = $request->input('vendor_name');
            
            $modal = new Modal;
          
            $modal->vendor_id = $vendor_id;
           
            $modal->cur_modal_dasar = $request->input('CurModalDasar');
            $modal->modal_dasar = $request->input('ModalDasar');
            $modal->cur_modal_disetor = $request->input('CurModalDisetor');
            $modal->modal_disetor = $request->input('ModalDisetor');
    
            $modal->save();
            //return "store";
            return redirect('/vendors/'.$vendor_id)->with('success','Data Modal berhasil disimpan');
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
        $modal = Modal::find($id);
        $vendor_id = $modal->vendor_id;
       
        $modal->delete();

        return redirect('/vendors/'.$vendor_id)->with('success','Data Modal dihapus');
    }
}
