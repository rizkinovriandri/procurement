@extends('layouts.app_spare')

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
        Daftar Vendor Baru
        <small>Pendaftaran Calon Rekanan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Vendor Management</a></li>
        <li class="active">Input Vendor</li>
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
            <form action="{{url('vendorstore')}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="NamaPerusahaan" class="col-sm-2 control-label">Nama Perusahaan</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="NamaPerusahaan" id="NamaPerusahaan" placeholder="Nama Perusahaan" value="{{old('NamaPerusahaan')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="BadanUsaha" class="col-sm-2 control-label">Badan Usaha</label>

                  <div class="col-sm-2">
                    <select class="form-control"  name="BadanUsaha" id="BadanUsaha" value="{{old('BadanUsaha')}}">
                      <option value="PT" @if (old("BadanUsaha") == "PT") selected="selected" @endif>PT</option>
                      <option value="CV" @if (old("BadanUsaha") == "CV") selected="selected" @endif>CV</option>
                      <option value="Koperasi" @if (old("BadanUsaha") == "Koperasi") selected="selected" @endif>Koperasi</option>
                      <option value="Yayasan" @if (old("BadanUsaha") == "Yayasan") selected="selected" @endif>Yayasan</option>
                      <option value="UD" @if (old("BadanUsaha") == "UD") selected="selected" @endif>UD</option>
                      <option value="Pte, Ltd" @if (old("BadanUsaha") == "Pte, Ltd") selected="selected" @endif>Pte, Ltd</option>
                      <option value="Ltd" @if (old("BadanUsaha") == "Ltd") selected="selected" @endif>Ltd</option>
                      <option value="Sdn, Bhd" @if (old("BadanUsaha") == "Sdn, Bhd") selected="selected" @endif>Sdn, Bhd</option>
                      <option value="GmbH" @if (old("BadanUsaha") == "GmbH") selected="selected" @endif>GmbH</option>
                  </select>
                    
                  </div>
                </div>

                <div class="form-group">
                  <label for="SapNo" class="col-sm-2 control-label">Nomor Vendor SAP</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="SapNo" id="SapNo" placeholder="Nomor Vendor SAP" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-6">
                    <input type="textbox" class="form-control" name="alamat" value="{{old('alamat')}}" id="alamat" placeholder="Alamat">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kota" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kota" value="{{old('kota')}}" id="kota" placeholder="Kota">
                  </div>
                </div>

                <div class="form-group">
                  <label for="negara" class="col-sm-2 control-label">Negara</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="negara" value="{{old('negara')}}" id="negara" placeholder="Negara">
                  </div>
                </div>

                <div class="form-group">
                  <label for="KodePos" class="col-sm-2 control-label">Kode Pos</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="KodePos" value="{{old('KodePos')}}" id="KodePos" placeholder="Kode Pos">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Kualifikasi" class="col-sm-2 control-label">Kualifikasi</label>

                  <div class="col-sm-1">
                    <select class="form-control" name="kualifikasi" id="kualifikasi">
                        <option value="A" @if (old("kualifikasi") == "A") selected="selected" @endif>A</option>
                        <option value="B" @if (old("kualifikasi") == "B") selected="selected" @endif>B</option>
                        <option value="C" @if (old("kualifikasi") == "C") selected="selected" @endif>C</option>
                        <option value="D" @if (old("kualifikasi") == "D") selected="selected" @endif>D</option>
                        <option value="S" @if (old("kualifikasi") == "S") selected="selected" @endif>S</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tahun_terdaftar" class="col-sm-2 control-label">Tahun terdaftar</label>

                  <div class="col-sm-2">
                    <select class="form-control" name="tahun_terdaftar" id="tahun_terdaftar">
                  
                    {{$current_year = date("Y")}}
                      
                    @for ($tahun = 1980; $tahun <= $current_year ; $tahun++)
                        <option value={{$tahun}} @if ($tahun == 2020 ) selected="selected" @endif>{{$tahun}}</option>
                    @endfor
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="JenisKantor" class="col-sm-2 control-label">Jenis Kantor</label>

                  <div class="col-sm-2">
                    <select class="form-control" name="JenisKantor" id="JenisKantor">
                      <option value="Utama" @if (old("JenisKantor") == "Utama") selected="selected" @endif>Utama</option>
                      <option value="Cabang" @if (old("JenisKantor") == "Cabang") selected="selected" @endif>Cabang</option>
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Telepon1" class="col-sm-2 control-label">Telepon 1</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Telepon1" value="{{old('Telepon1')}}" id="Telepon1" placeholder="Telepon 1">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Telepon2" class="col-sm-2 control-label">Telepon 2</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="Telepon2" value="{{old('Telepon2')}}" id="Telepon2" placeholder="Telepon 2">
                  </div>
                </div>

                <div class="form-group">
                  <label for="fax" class="col-sm-2 control-label">Faximile</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="fax" id="fax" value="{{old('fax')}}" placeholder="Faximile">
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
                          <input type="radio" name="bidang" id="bidang" @if (old("bidang") == "Barang") checked="checked"  @endif value="Barang" checked>
                          Barang
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="bidang" id="bidang" @if (old("bidang") == "Jasa") checked="checked" @endif value="Jasa">
                          Jasa
                        </label>
                      </div>
                      
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label for="website" class="col-sm-2 control-label">Website</label>

                  <div class="col-sm-4">
                    <input type="website" class="form-control" name="website" value="{{old('website')}}" id="website" placeholder="Website">
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
                          <input type="radio" name="k3l" @if (old("k3l") == "1") checked="checked" @endif id="k3l" value="1" checked>
                          Ada 
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="k3l" @if (old("k3l") == "0") checked="checked" @endif id="k3l" value="0">
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
                          <input type="radio" name="keluarga" id="chkYes" @if (old("keluarga") == "1") checked="checked" @endif value="1" onclick="ShowHideDiv()" >
                          Ada 
                          <input  type="text" class="form-control" name="nama_pegawai" value="{{old('nama_pegawai')}}" id="nama_pegawai" placeholder="Nama Pegawai" style="display: none">
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="keluarga" @if (old("keluarga") == "0") checked="checked" @endif id="optionsRadios2"  value="0" onclick="ShowHideDiv()" checked>
                          Tidak ada
                        </label>
                      </div>
                      
                    </div>

                  </div>
                </div>

                <div class="form-group">
                  <label for="fax" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-2">
                    <textarea rows="4" cols="50" name="keterangan" id="keterangan"></textarea>
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
