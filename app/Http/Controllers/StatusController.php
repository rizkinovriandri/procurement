<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\role_user;
use App\Vendor;
use App\Status;
use Auth;
use Carbon\Carbon;

class StatusController extends Controller
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
        $this->validate($request, [
            'Status' => 'required',
            'BerlakuMulaiSuspend' => 'required_if:Status,==,"Suspended"',
            'BerlakuSampaiSuspend' => 'required_if:Status,==,"Suspended"',
            'AlasanSuspend' => 'required_if:Status,==,"Suspended"'

        ]);
        
        //storing data vendor
       
        $status = new Status;

        $vendor_id = $request->input('vendor_id');
        $vendor_name = $request->input('vendor_name');

        if ($request->input('Status') == "Suspended"){
            $tgl_mulai = $request->input('BerlakuMulaiSuspend');
            $tgl_akhir = $request->input('BerlakuSampaiSuspend');
            $alasan = $request->input('AlasanSuspend');
        } else {
            $tgl_mulai = NULL;
            $tgl_akhir = NULL;
            $alasan = NULL;
        }

        $status->status = $request->input('Status');
        $status->vendor_id = $vendor_id;
        $status->tgl_mulai = Carbon::parse($tgl_mulai)->format('Y-m-d H:i:s');
        $status->tgl_berakhir = Carbon::parse($tgl_akhir)->format('Y-m-d H:i:s');
        $status->keterangan = $alasan;
               
        $status->save();

        return redirect('/vendors/'.$vendor_id)->with('success','Status Vendor berhasil diupdate');
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
        $this->validate($request, [
            'Status' => 'required',
            'BerlakuMulaiSuspend' => 'required_if:Status,==,"Suspended"',
            'BerlakuSampaiSuspend' => 'required_if:Status,==,"Suspended"',
            'AlasanSuspend' => 'required_if:Status,==,"Suspended"'

        ]);
        
        //storing data vendor
       
        $status = Status::find($id);

        $vendor_id = $request->input('vendor_id');
        $vendor_name = $request->input('vendor_name');

        if ($request->input('Status') == "Suspended"){
            $tgl_mulai = $request->input('BerlakuMulaiSuspend');
            $tgl_akhir = $request->input('BerlakuSampaiSuspend');
            $alasan = $request->input('AlasanSuspend');
        } else {
            $tgl_mulai = NULL;
            $tgl_akhir = NULL;
            $alasan = NULL;
        }

        $status->status = $request->input('Status');
        $status->tgl_mulai = Carbon::parse($tgl_mulai)->format('Y-m-d H:i:s');
        $status->tgl_berakhir = Carbon::parse($tgl_akhir)->format('Y-m-d H:i:s');
        $status->keterangan = $alasan;
               
        $status->save();

        return redirect('/vendors/'.$vendor_id)->with('success','Status Vendor berhasil diupdate');
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
