@extends('layouts.app_spare')

@section('content')


<!-- Content Wrapper. Contains page content -->
  
    <section class="content-header">
      <h1>
        Detail Data
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Vendor Management</a></li>
        <li><a href="{{url('vendors')}}">Vendor list</a></li>
        <li class="active">Vendor Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- @include('inc.messages') -->

      <!-- Default box -->
      <div class="box box-primary" >
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
          
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <!-- batas konten -->
                
                <div class="col-md">
                  <div class="box box-solid">
                    <div class="box-header with-border">
                    <a  href="{{url('vendors')}}" class="btn btn-warning pull-left" ><i class="fa fa-arrow-left">&nbsp;</i>Kembali</a>
                    <br/><br/><br/>
                      <i class="fa fa-briefcase"></i>

                      
                      
                      <h3 class="box-title"><b>{{$vendor->nama}} {{$vendor->badan_usaha}}</b></h3>
                    
                      

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <center><h4><b>Data Administrasi Perusahaan</b></h4></center>
                      <!-- <dl class="dl-horizontal">
                        <dt style="width: 25%; padding-right: 20px">Nama Perusahaan</dt>
                          <dd>{{$vendor->nama}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Badan Hukum</dt>
                          <dd>{{$vendor->badan_usaha}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Bidang</dt>
                          <dd>{{$vendor->type}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Alamat</dt>
                          <dd>{{$vendor->alamat}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Kota</dt>
                          <dd>{{$vendor->kota}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Negara</dt>
                          <dd>{{$vendor->negara}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Kode Pos</dt>
                          <dd>{{$vendor->kode_pos}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Jenis Kantor</dt>
                          <dd>{{$vendor->jenis_kantor}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Telepon 1</dt>
                          <dd>{{$vendor->telepon1}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Telepon 2</dt>
                          <dd>{{$vendor->telepon2}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Fax</dt>
                          <dd>{{$vendor->fax}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Email</dt>
                          <dd>{{$vendor->email}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Website</dt>
                          <dd>{{$vendor->website}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Pengelolaan K3L</dt>
                          <dd> 
                                @if($vendor->k3l==1) 
                                  Ada
                                @else 
                                  Tidak ada
                                @endif
                          </dd>
                        <dt style="width: 25%; padding-right: 20px">Hubungan Keluarga</dt>
                          <dd>
                                @if($vendor->hubungan_keluarga==1) 
                                  Ada
                                @else 
                                  Tidak ada
                                @endif
                          </dd>
                        <dt style="width: 25%; padding-right: 20px">Nama Keluarga</dt>
                          <dd>{{$vendor->nama_keluarga}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Dibuat oleh</dt>
                          <dd>{{$vendor->created_by}}</dd>
                        <dt style="width: 25%; padding-right: 20px">Tanggal Input</dt>
                          <dd>{{date('d-M-Y',strtotime($vendor->created_at))}}</dd>  
                      </dl> -->

                    <div class="vendorinfo" style="width:70%">
                      <table class="table table-bordered">
                        <tr>
                          <th style="width: 350px"> </th>
                           <th> </th> 
                        </tr>
                        <tr>
                          <td><b>Nama Perusahaan</b></td>
                          <td>
                            <div>
                            {{$vendor->nama}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                        <tr>
                          <td><b>Badan Usaha</b></td>
                          <td>
                            <div>
                            {{$vendor->badan_usaha}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Nomor Vendor SAP</b></td>
                          <td>
                            <div>
                            {{$vendor->sapno}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                      
                        <tr>
                          <td><b>Alamat</b></td>
                          <td>
                            <div>
                            {{$vendor->alamat}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Kota</b></td>
                          <td>
                            <div>
                            {{$vendor->kota}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                        
                        <tr>
                          <td><b>Negara</b></td>
                          <td>
                            <div>
                            {{$vendor->negara}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Kode Pos</b></td>
                          <td>
                            <div>
                            {{$vendor->kode_pos}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                        
                        <tr>
                          <td><b>Jenis Kantor</b></td>
                          <td>
                            <div>
                            {{$vendor->jenis_kantor}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Bidang</b></td>
                          <td>
                            <div>
                            {{$vendor->type}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Kualifikasi</b></td>
                          <td>
                            <div>
                           <b>{{$vendor->kualifikasi}}</b>
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Tahun terdaftar</b></td>
                          <td>
                            <div>
                              {{$vendor->tahun_terdaftar}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Telepon 1</b></td>
                          <td>
                            <div>
                            {{$vendor->telepon1}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Telepon 2</b></td>
                          <td>
                            <div>
                            {{$vendor->telepon2}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Fax</b></td>
                          <td>
                            <div>
                            {{$vendor->fax}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Email</b></td>
                          <td>
                            <div>
                            {{$vendor->email}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Website</b></td>
                          <td>
                            <div>
                            {{$vendor->website}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Pengelolaan K3L</b></td>
                          <td>
                            <div>
                            
                            @if($vendor->k3l==1) 
                                  Ada
                            @else 
                                  Tidak ada
                            @endif

                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Hubungan Keluarga</b></td>
                          <td>
                            <div>
                            
                            @if($vendor->hubungan_keluarga==1) 
                                  Ada
                            @else 
                                  Tidak ada
                            @endif

                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        @if($vendor->hubungan_keluarga==1)

                        <tr>
                          <td><b>Nama Keluarga</b></td>
                          <td>
                            <div>
                            {{$vendor->nama_keluarga}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                        @endif
                        
                        <tr>
                          <td><b>Keterangan</b></td>
                          <td>
                            <div>
                            {{$vendor->keterangan}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Created at</b></td>
                          <td>
                            <div>
                            {{$vendor->created_at}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>


                      </table>
                     
                      @role('admin')
                      <a  href="{{route('vendors.edit',$vendor->id)}}" class="btn btn-primary pull-left" style="margin-left: 270px">Edit</a>
                      @endrole
                    </div>

                  </div>
                    <!-- /.box-body -->



                  </div>
                  <!-- /.box -->



                </div>
            <!-- batas konten -->



        </div>

        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->

      </div>
      <!-- /.box -->

     @include ('inc.vendor_status')

     @include ('inc.data_kontrak')

     @include ('inc.pengurus_perusahaan')

     @include ('inc.dokumen_perizinan')

     @include ('inc.data_keuangan')

     @include ('inc.data_teknis')

    </section>
    <!-- /.content -->
        
  <!-- /.content-wrapper -->

<script type="text/javascript">

    function showDivStatus(divId, element)
    {
        document.getElementById(divId).style.display = element.value == "Suspended" ? 'block' : 'none';
    }

     function deleteAkta(id)
     {
         var id = id;
         var url = '{{ route("aktas.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteSkkem(id)
     {
         var id = id;
         var url = '{{ route("skkems.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteSiup(id)
     {
         var id = id;
         var url = '{{ route("siups.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteTdp(id)
     {
         var id = id;
         var url = '{{ route("tdps.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteSiujk(id)
     {
         var id = id;
         var url = '{{ route("siujks.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteApi(id)
     {
         var id = id;
         var url = '{{ route("apis.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deletePengurus(id)
     {
         var id = id;
         var url = '{{ route("penguruses.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteRekening(id)
     {
         var id = id;
         var url = '{{ route("rekenings.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteModal1(id)
     {
         var id = id;
         var url = '{{ route("modals.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteLapkeu(id)
     {
         var id = id;
         var url = '{{ route("lapkeus.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deletePerpajakan(id)
     {
         var id = id;
         var url = '{{ route("perpajakans.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteTenagaAhli(id)
     {
         var id = id;
         var url = '{{ route("tenagaahlis.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteSertifikat(id)
     {
         var id = id;
         var url = '{{ route("sertifikats.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteFasilitas(id)
     {
         var id = id;
         var url = '{{ route("fasilitases.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deletePengalaman(id)
     {
         var id = id;
         var url = '{{ route("pengalamans.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteKeagenan(id)
     {
         var id = id;
         var url = '{{ route("keagenans.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteBidang(id)
     {
         var id = id;
         var url = '{{ route("bidangs.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteSubBarang(id)
     {
         var id = id;
         var url = '{{ route("subbarangs.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function deleteSubJasa(id)
     {
         var id = id;
         var url = '{{ route("subjasas.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     
    
     function formSubmit()
     {
         $("#deleteForm").submit();
     }


     function ShowHideDivSiup() {
        var chkYes = document.getElementById("chkYesSiup");
        var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku_siup");
        isi_tanggal_berlaku_siup.style.display = chkYes.checked ? "block" : "none";
    }

    function ShowHideDivTdp() {
        var chkYes = document.getElementById("chkYesTdp");
        var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku_tdp");
        isi_tanggal_berlaku_tdp.style.display = chkYes.checked ? "block" : "none";
    }

    function ShowHideDivSiujk() {
        var chkYes = document.getElementById("chkYesSiujk");
        var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku_siujk");
        isi_tanggal_berlaku_siujk.style.display = chkYes.checked ? "block" : "none";
    }

    function ShowHideDivApi() {
        var chkYes = document.getElementById("chkYesApi");
        var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku_api");
        isi_tanggal_berlaku_api.style.display = chkYes.checked ? "block" : "none";
    }

    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku");
        isi_tanggal_berlaku.style.display = chkYes.checked ? "block" : "none";
    }

    

  </script>


@endsection
