@extends('layouts.app2')

@section('content')


<!-- Content Wrapper. Contains page content -->
  
 <script type="text/javascript">
   
   function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var nama_pegawai = document.getElementById("nama_pegawai");
        nama_pegawai.style.display = chkYes.checked ? "block" : "none";
    }

 </script>

    <section class="content-header">
      <h1>
        Edit Vendor
        <small>Edit Data Rekanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Vendor Management</a></li>
        <li class="active">Edit Vendor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Administrasi Perusahaan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
            
            
            <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{action('VendorsController@update',$vendor->id)}}" method="post" class="form-horizontal">

              {{ csrf_field() }}
              <input type="hidden" name="_method" value="PATCH" />
              <div class="box-body">
                <div class="form-group">
                  <label for="NamaPerusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="NamaPerusahaan" id="NamaPerusahaan" placeholder="Nama Perusahaan" value="{{$vendor->nama}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="BadanUsaha" class="col-sm-2 control-label">Badan Usaha</label>

                  <div class="col-sm-2">
                    <select class="form-control"  name="BadanUsaha" id="BadanUsaha" value="{{old('BadanUsaha')}}">
                      <option value="PT" {{ $vendor->badan_usaha == "PT" ? 'selected' : '' }}>PT</option>
                      <option value="CV" {{ $vendor->badan_usaha == "CV" ? 'selected' : '' }}>CV</option>
                      <option value="Koperasi" {{ $vendor->badan_usaha == "Koperasi" ? 'selected' : '' }}>Koperasi</option>
                      <option value="Yayasan" {{ $vendor->badan_usaha == "Yayasan" ? 'selected' : '' }}>Yayasan</option>
                      <option value="UD" {{ $vendor->badan_usaha == "UD" ? 'selected' : '' }}>UD</option>
                      <option value="Pte, Ltd" {{ $vendor->badan_usaha == "Pte, Ltd" ? 'selected' : '' }}>Pte, Ltd</option>
                      <option value="Ltd" {{ $vendor->badan_usaha == "Ltd" ? 'selected' : '' }}>Ltd</option>
                      <option value="Sdn, Bhd" {{ $vendor->badan_usaha == "Sdn, Bhd" ? 'selected' : '' }}>Sdn, Bhd</option>
                      <option value="GmbH" {{ $vendor->badan_usaha == "GmbH" ? 'selected' : '' }}>GmbH</option>
                  </select>
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="SapNo" class="col-sm-2 control-label">Nomor Vendor SAP</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="SapNo" id="SapNo" placeholder="Nomor Vendor SAP" value="{{$vendor->sapno}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" value="{{$vendor->email}}" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-6">
                    <input type="textbox" class="form-control" name="alamat" value="{{$vendor->alamat}}" id="alamat" placeholder="Alamat">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kota" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kota" value="{{$vendor->kota}}" id="kota" placeholder="Kota">
                  </div>
                </div>

                <div class="form-group">
                  <label for="negara" class="col-sm-2 control-label">Negara</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="negara" value="{{$vendor->negara}}" id="negara" placeholder="Negara">
                  </div>
                </div>

                <div class="form-group">
                  <label for="KodePos" class="col-sm-2 control-label">Kode Pos</label>

                  <div class="col-sm-2">
                    <input type="text" maxlength="6" class="form-control" name="KodePos" value="{{$vendor->kode_pos}}" id="KodePos" placeholder="Kode Pos">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kota" class="col-sm-2 control-label">Kualifikasi</label>

                  <div class="col-sm-1">
                    <select class="form-control" name="kualifikasi" id="kualifikasi">
                        <option value="A" {{ $vendor->kualifikasi == "A" ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $vendor->kualifikasi == "B" ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $vendor->kualifikasi == "C" ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $vendor->kualifikasi == "D" ? 'selected' : '' }}>D</option>
                        <option value="S" {{ $vendor->kualifikasi == "S" ? 'selected' : '' }}>S</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="JenisKantor" class="col-sm-2 control-label">Jenis Kantor</label>

                  <div class="col-sm-2">
                    <select class="form-control" name="JenisKantor" id="JenisKantor">
                      <option value="Utama" {{ $vendor->jenis_kantor == "Utama" ? 'selected' : '' }}>Utama</option>
                      <option value="Cabang" {{ $vendor->jenis_kantor == "Cabang" ? 'selected' : '' }}>Cabang</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Telepon1" class="col-sm-2 control-label">Telepon 1</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Telepon1" value="{{$vendor->telepon1}}" id="Telepon1" placeholder="Telepon 1">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Telepon2" class="col-sm-2 control-label">Telepon 2</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Telepon2" value="{{$vendor->telepon2}}" id="Telepon2" placeholder="Telepon 2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="fax" class="col-sm-2 control-label">Faximile</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="fax" id="fax" value="{{$vendor->fax}}" placeholder="Faximile">
                  </div>
                </div>

                <div class="form-group">
                  <label for="bidang" class="col-sm-2 control-label">Bidang</label>

                  <div class="col-sm-2" style="margin-left: 15px;">
                    <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="bidang" id="bidang"  value="Barang" {{ ($vendor->type=="Barang")? "checked" : "" }}>
                          Barang
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="bidang" id="bidang"  value="Jasa" {{ ($vendor->type=="Jasa")? "checked" : "" }}>
                          Jasa
                        </label>
                      </div>
                      
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label for="website" class="col-sm-2 control-label">Website</label>

                  <div class="col-sm-4">
                    <input type="website" class="form-control" name="website" value="{{$vendor->website}}" id="website" placeholder="Website">
                  </div>
                </div>

                <div class="form-group">
                  <label for="k3l" class="col-sm-2 control-label">Manajemen K3 dan Lingkungan</label>

                  <div class="col-sm-2" style="margin-left: 15px;">
                    <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="k3l" id="k3l" value="1" {{ ($vendor->k3l==1)? "checked" : "" }}>
                          Ada 
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="k3l" id="k3l" value="0" {{ ($vendor->k3l==0)? "checked" : "" }}>
                          Tidak ada
                        </label>
                      </div>
                      
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label for="keluarga" class="col-sm-2 control-label">Hubungan Keluarga dengan Pegawai Inalum</label>

                  <div class="col-sm-3" style="margin-left: 15px;">
                    <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="keluarga" id="chkYes"  value="1" onclick="ShowHideDiv()" {{ ($vendor->hubungan_keluarga==1)? "checked" : "" }}>
                          Ada 
                          <input  type="text" class="form-control" name="nama_pegawai" value="{{$vendor->nama_keluarga}}" id="nama_pegawai" placeholder="Nama Pegawai" style="display: none">
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="keluarga"  id="optionsRadios2"  value="0" onclick="ShowHideDiv()" {{ ($vendor->hubungan_keluarga==0)? "checked" : "" }}>
                          Tidak ada
                        </label>
                      </div>
                      
                    </div>

                  </div>
                </div>

                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <center>
                <!-- <button type="reset" class="btn btn-default pull-center">Reset</button>
                &nbsp;&nbsp; -->
                <button type="submit" class="btn btn-primary pull-center">Submit</button>
               </center> 
              </div>
              <!-- /.box-footer -->
            </form>
          </div>



          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->


@endsection
