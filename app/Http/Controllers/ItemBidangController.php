<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemBidang;
use Auth;

class ItemBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $itembidangs = ItemBidang::all();
        // return data ke view
        return view('setting.item_bidang', ['itembidangs' => $itembidangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('setting.item_bidang');
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
            
            'SubBidang' => 'required |unique:item_bidang,sub_bidang'
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
           
           
            
            $itembidang = new ItemBidang;
          
            // $itembidang->vendor_id = $vendor_id;
            $itembidang->bidang = $request->input('bidang');
            $itembidang->sub_bidang = $request->input('SubBidang');
    
            $itembidang->save();
            //return "store";
            return redirect('/itembidangs')->with('success','Data sub bidang berhasil disimpan');
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
        $itembidang = ItemBidang::find($id);
        $itembidang->delete();

        return redirect('/itembidangs')->with('success','Sub Item Deleted');
    }
}
