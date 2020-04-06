<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Akta;
use App\Status;
use App\role_user;
use App\Vendor;
use Auth;
use App\Http\Requests\StoreVendorRequest;
use Illuminate\Support\Facades\File;
use DB;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function evaluasi()
    {
        //
        //$vendors = Vendor::all();
        $evaluasis = DB::table('evaluasis')
                   ->join('vendors', 'evaluasis.vendor_no', '=', 'vendors.sapno');
        $evaluasis = $evaluasis->get();
        // return data ke view
        return view('vendor.evaluasi', ['evaluasis' => $evaluasis]);
    }
    
    
     public function keagenan()
    {
        //
        //$vendors = Vendor::all();
        $keagenans = DB::table('keagenans')
                   ->join('vendors', 'keagenans.vendor_id', '=', 'vendors.id');
        $keagenans = $keagenans->get();
        // return data ke view
        return view('vendor.keagenan', ['keagenans' => $keagenans]);
    }

    public function suspended()
    {
        //
        //$vendors = Vendor::all();
        $vendors = DB::table('vendors')
                   ->join('statuses', 'vendors.id', '=', 'statuses.vendor_id')
                   ->where('status', 'suspended');
        $vendors = $vendors->get();
        // return data ke view
        return view('vendor.suspended', ['vendors' => $vendors]);
    }


    public function index()
    {
        //
        $vendors = Vendor::get()->all();
        //$vendors = DB::table('vendors')
                   //->join('sub_jasa', 'vendors.id', '=', 'sub_jasa.vendor_id');
       // $vendors = $vendors->get();           

        // return data ke view
        return view('vendor.vendor_list', ['vendors' => $vendors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendor.create_vendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //storing data vendor

      

        $validatedData = $request->validate([
            'NamaPerusahaan' => 'required |unique:vendors,nama',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'KodePos' => 'required | numeric',
            'Telepon1' => 'required',
            'PhotoKantor' => 'mimes:jpeg,bmp,png|max:8000',
            ]);

        // menyimpan data file yang diupload ke variabel $file

        $vendor = new Vendor;

        if($request->hasFile('PhotoKantor')){
            $file = $request->file('PhotoKantor');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'kantor';
            
            $fileName = md5(time()) . '.' . $extension;
            //echo $fileName;
            // $fileName = $akta->getNextId();
            $vendor->filekantor = $fileName;
            // upload file
            $file->move($destination_folder,$fileName);
        }
       
        $tempkeluarga = $request->input('keluarga');

        
        $vendor->nama = $request->input('NamaPerusahaan');
        $vendor->badan_usaha = $request->input('BadanUsaha');
        $vendor->alamat = $request->input('alamat');
        $vendor->sapno = $request->input('SapNo');
        $vendor->kota = $request->input('kota');
        $vendor->negara = $request->input('negara');
        $vendor->kode_pos = $request->input('KodePos');
        $vendor->jenis_kantor = $request->input('JenisKantor');
        $vendor->telepon1 = $request->input('Telepon1');
        $vendor->telepon2 = $request->input('Telepon2');
        $vendor->fax = $request->input('fax');
        $vendor->email = $request->input('email');
        $vendor->type = $request->input('bidang');
        $vendor->tahun_terdaftar = $request->input('tahun_terdaftar');
        $vendor->kualifikasi = $request->input('kualifikasi');
        $vendor->website = $request->input('website');
        $vendor->k3l = $request->input('k3l');
        $vendor->hubungan_keluarga = $request->input('keluarga');
        $vendor->keterangan = $request->input('keterangan');
        

         if ($tempkeluarga == 1) {
            $vendor->nama_keluarga = $request->input('nama_pegawai');
        } else {
            $vendor->nama_keluarga = '';
        }
        //$vendor->nama_keluarga = $request->input('nama_pegawai');


        $vendor->created_by = Auth::user()->name;
        $vendor->save();

        $lastInsertedId= $vendor->id;

        $status_vendor = new Status;
        $status_vendor->vendor_id = $lastInsertedId;
        $status_vendor->status = "Pemasok Baru";
        $status_vendor->save();


        return redirect('/vendors')->with('success','Vendor Created');
        //return redirect('/vendors')->with('message', 'IT WORKS!');
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
        $vendor = Vendor::find($id);
        return view('vendor.vendor_show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "edit";
         $vendor = Vendor::find($id);
         return view('vendor.edit', compact('vendor'));
         //return view('vendor.edit')->with('vendor',$vendor);
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
        
        $this->validate($request, [
            'NamaPerusahaan' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'negara' => 'required',
            'KodePos' => 'required | numeric',
            'Telepon1' => 'required',
            'PhotoKantor' => 'mimes:jpeg,bmp,png|max:8000',

        ]);
        
        //storing data vendor
       
        $vendor = Vendor::find($id);
        $vendor_id = $id;

        $tempkeluarga = $request->input('keluarga');

        // if ($tempkeluarga = 1) {
        //     $namakeluarga = $request->input('nama_pegawai');
        // } else {
        //     $namakeluarga = "";
        // }

        $vendor->nama = $request->input('NamaPerusahaan');
        $vendor->badan_usaha = $request->input('BadanUsaha');
        $vendor->sapno = $request->input('SapNo');
        $vendor->alamat = $request->input('alamat');
        $vendor->kota = $request->input('kota');
        $vendor->negara = $request->input('negara');
        $vendor->kode_pos = $request->input('KodePos');
        $vendor->jenis_kantor = $request->input('JenisKantor');
        $vendor->telepon1 = $request->input('Telepon1');
        $vendor->telepon2 = $request->input('Telepon2');
        $vendor->fax = $request->input('fax');
        $vendor->email = $request->input('email');
        $vendor->kualifikasi = $request->input('kualifikasi');
        $vendor->tahun_terdaftar = $request->input('tahun_terdaftar');
        $vendor->type = $request->input('bidang');
        $vendor->website = $request->input('website');
        $vendor->k3l = $request->input('k3l');
        $vendor->hubungan_keluarga = $request->input('keluarga');
        $vendor->keterangan = $request->input('keterangan');    
       

        if ($tempkeluarga == 1) {
            $vendor->nama_keluarga = $request->input('nama_pegawai');
        } else {
            $vendor->nama_keluarga = '';
        }

         // menyimpan data file yang diupload ke variabel $file
         if($request->hasFile('PhotoKantor')){ 
            $file = $request->file('PhotoKantor');
            $extension = $file->getClientOriginalExtension();
            $destination_folder = public_path() . DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'kantor';

            //Delete file yang sebelumnya jika ada
            $file_path = public_path(). DIRECTORY_SEPARATOR . 'documents' . DIRECTORY_SEPARATOR .'kantor'. DIRECTORY_SEPARATOR . $vendor->filekantor;
            $check_file = File::exists($file_path);
            if ($check_file && $vendor->filekantor<>"") {
                //echo $file_path;
                unlink($file_path);
            }

            $fileName = md5(time()) . '.' . $extension;
            // $fileName = $akta->getNextId();
            $vendor->filekantor = $fileName;
            
            // upload file
            $file->move($destination_folder,$fileName);
        }

        $vendor->created_by = Auth::user()->name;
        $vendor->save();


        //return redirect('/vendors')->with('success','Vendor Updated');
        return redirect('/vendors/'.$vendor_id)->with('success','Data Vendor berhasil diupdate');
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
        $vendor = Vendor::find($id);

        //------- Delete file aktas ----------
        foreach($vendor->aktas()->get() as $akta){
            
            $file_path = public_path().'/documents/akta/'.$akta->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $akta->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->aktas()->delete();

        //------- Delete file skkem ----------
        foreach($vendor->skkems()->get() as $skkem){
            
            $file_path = public_path().'/documents/skkem/'.$skkem->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $skkem->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->skkems()->delete();

         //------- Delete file siup ----------
        foreach($vendor->siups()->get() as $siup){
            
            $file_path = public_path().'/documents/siupnib/'.$siup->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $siup->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->siups()->delete();

         //------- Delete file tdp ----------
        foreach($vendor->tdps()->get() as $tdp){
            
            $file_path = public_path().'/documents/tdp/'.$tdp->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $tdp->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->tdps()->delete();

         //------- Delete file siujk ----------
        foreach($vendor->siujks()->get() as $siujk){
            
            $file_path = public_path().'/documents/siujk/'.$siujk->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $siujk->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->siujks()->delete();

         //------- Delete file api ----------
        foreach($vendor->apis()->get() as $api){
            
            $file_path = public_path().'/documents/api/'.$api->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $api->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->apis()->delete();

         //------- Delete file pengurus ----------
        
         $vendor->pengurus()->delete();

         //------- Delete file rekening ----------
        foreach($vendor->rekenings()->get() as $rekening){
            
            $file_path = public_path().'/documents/rekening/'.$rekening->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $rekening->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->rekenings()->delete();

         //------- Delete file modal ----------
        
         $vendor->modals()->delete();

         //------- Delete file lapkeu ----------
        foreach($vendor->lapkeus()->get() as $lapkeu){
            
            $file_path = public_path().'/documents/lapkeu/'.$lapkeu->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $lapkeu->filename <> ""){
                unlink($file_path);
            }
         }
         $vendor->lapkeus()->delete();

         //------- Delete file perpajakan ----------
        foreach($vendor->perpajakans()->get() as $perpajakan){
            
            $file_path = public_path().'/documents/perpajakan/'.$perpajakan->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $perpajakan->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->perpajakans()->delete();

         //------- Delete file bidang ----------
        
         $vendor->bidangs()->delete();

          //------- Delete file keagenan ----------
        foreach($vendor->keagenans()->get() as $keagenan){
            
            $file_path = public_path().'/documents/keagenan/'.$keagenan->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $keagenan->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->keagenans()->delete();

         //------- Delete file tenaga ahli ----------
        
         $vendor->tenagaahlis()->delete();

          //------- Delete file sertifikat ----------
        foreach($vendor->sertifikats()->get() as $sertifikat){
            
            $file_path = public_path().'/documents/sertifikat/'.$sertifikat->filename;
            //echo $file_path . "<br/>";

            $check_file = File::exists($file_path);
            if ($check_file && $sertifikat->filename<>""){
                unlink($file_path);
            }
         }
         $vendor->sertifikats()->delete();

         //------- Delete file fasilitas ----------
        
         $vendor->fasilitas()->delete();

         //------- Delete file pengalaman ----------
        
         $vendor->pengalamans()->delete();

         //------- Delete file status ----------
        
         $vendor->statuses()->delete();

         //------- Delete file photo jika ada ----------

        $file_path = public_path().'/documents/kantor/'.$vendor->filekantor;
        $check_file = File::exists($file_path);
        if ($check_file && $vendor->filekantor<>""){
            unlink($file_path);
        }

         //------- Delete vendor instance ----------
         $vendor->delete();
        

        return redirect('/vendors')->with('success','Vendor Deleted');
    }
}
