@extends('layouts.app_spare')

@section('content')

<style>
        .anyClass {
          overflow-x: scroll;
        }
        
  </style>

<!-- Content Wrapper. Contains page content -->
    
    <section class="content-header">
      <h1>
        Data Evaluasi
        <small>Penilaian Kinerja Pemasok</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Vendor Management</a></li>
        <li class="active">Evaluasi Vendor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Home</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#barang" data-toggle="tab">Barang</a></li>
              <li><a href="#jasa" data-toggle="tab">Jasa</a></li>
              <li class="pull-left header"><i class="fa fa-pencil-square">&nbsp;</i>Data Evaluasi Vendor</li>
            </ul>
            <div class="tab-content">

        <!-- Tab pane -->
        <div class="tab-pane active" id="barang">
        <!-- Form API -->
               
          <div class="box-body anyClass">
          
          <!-- Content Here -->
          
          <?php $No = 1; ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <!-- <th style="width: 4%">Vendor ID</th> -->
                  <th>Tahun Penilaian</th>
                  <th>Vendor No</th>
                  <th class="col-md-3">Nama Vendor</th>
                  <th>Jenis Pengadaan</th>
                  <th>Item Penawaran</th>
                  <th>Kontrak</th>
                  <th>Item Kontrak</th>
                  <th>Item Tepat Waktu</th>
                  <th>Item Terlambat</th>
                  <th>Item Misdelivery</th>
                  <th>Item terlambat diatas 100 hari</th>
                  <th>Permintaan penawaran</th>
                  <th>Penawaran diterima</th>
                  <th>Jlh hari keterlambatan</th>
                  <th>NP1</th>
                  <th>NP2</th>
                  <th>NP3</th>
                  <th>NP4</th>
                  <th>NP5</th>
                  <th>NP6</th>
                  <th>TNBTP</th>
                  <th>TNTTP</th>
                  <th>NTP</th>
                  <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($evaluasis as $row) 
                
                @if($row->type1 == 'Barang') 
                <tr>
                  <!-- <td>{{$row->id}}</td>  -->
                  <td>{{$No}}</td>
                  
                  <!-- <td>{{$row->id}}</td> -->
                  <!-- <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td> -->
                  <td>{{$row->tahun}}</td>
                  <td>{{$row->vendor_no}}</td>
                  <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td>
                  <td>{{$row->type1}}</td>
                  <td>{{$row->item_penawaran}}</td>
                  <td>{{$row->jlh_kontrak}}</td>
                  <td>{{$row->item_kontrak}}</td>
                  <td>{{$row->item_tepat_waktu}}</td>
                  <td>{{$row->item_terlambat}}</td>
                  <td>{{$row->item_misdelivery}}</td>
                  <td>{{$row->item_terlambat_100}}</td>
                  <td>{{$row->permintaan_penawaran}}</td>
                  <td>{{$row->penawaran_diterima}}</td>
                  <td>{{$row->jlh_hari_keterlambatan}}</td>
                  <td>{{$row->NP1}}</td>
                  <td>{{$row->NP2}}</td>
                  <td>{{$row->NP3}}</td>
                  <td>{{$row->NP4}}</td>
                  <td>{{$row->NP5}}</td>
                  <td>{{$row->NP6}}</td>
                  <td>{{$row->TNBTP}}</td>
                  <td>{{$row->TNTTP}}</td>
                  <td>{{$row->NTP}}</td>
                  <td>{{$row->rating}}</td>
                </tr>
                <?php $No++; ?>
                @endif

                @endforeach

                </tbody>
                
              </table>


          <!-- Content Here -->
        </div>

        <!-- /.box-body -->
                      
                    <!-- Content Here -->

                <!--/. List table API  -->
            
            </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="jasa">
        <!-- Form API -->
               
          <div class="box-body anyClass">

          test

          <?php $No = 1; ?>
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <!-- <th style="width: 4%">Vendor ID</th> -->
                  <th>Tahun Penilaian</th>
                  <th>Vendor No</th>
                  <th class="col-md-3">Nama Vendor</th>
                  <th>Jenis Pengadaan</th>
                  <th>Item Penawaran</th>
                  <th>Kontrak</th>
                  <th>Item Kontrak</th>
                  <th>Item Tepat Waktu</th>
                  <th>Item Terlambat</th>
                  <th>Item Misdelivery</th>
                  <th>Item terlambat diatas 100 hari</th>
                  <th>Permintaan penawaran</th>
                  <th>Penawaran diterima</th>
                  <th>Jlh hari keterlambatan</th>
                  <th>NP1</th>
                  <th>NP2</th>
                  <th>NP3</th>
                  <th>NP4</th>
                  <th>NP5</th>
                  <th>NP6</th>
                  <th>TNBTP</th>
                  <th>TNTTP</th>
                  <th>NTP</th>
                  <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($evaluasis as $row) 
                
                @if($row->type1 == 'Jasa') 
                <tr>
                  <!-- <td>{{$row->id}}</td>  -->
                  <td>{{$No}}</td>
                  
                  <!-- <td>{{$row->id}}</td> -->
                  <!-- <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td> -->
                  <td>{{$row->tahun}}</td>
                  <td>{{$row->vendor_no}}</td>
                  <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td>
                  <td>{{$row->type1}}</td>
                  <td>{{$row->item_penawaran}}</td>
                  <td>{{$row->jlh_kontrak}}</td>
                  <td>{{$row->item_kontrak}}</td>
                  <td>{{$row->item_tepat_waktu}}</td>
                  <td>{{$row->item_terlambat}}</td>
                  <td>{{$row->item_misdelivery}}</td>
                  <td>{{$row->item_terlambat_100}}</td>
                  <td>{{$row->permintaan_penawaran}}</td>
                  <td>{{$row->penawaran_diterima}}</td>
                  <td>{{$row->jlh_hari_keterlambatan}}</td>
                  <td>{{$row->NP1}}</td>
                  <td>{{$row->NP2}}</td>
                  <td>{{$row->NP3}}</td>
                  <td>{{$row->NP4}}</td>
                  <td>{{$row->NP5}}</td>
                  <td>{{$row->NP6}}</td>
                  <td>{{$row->TNBTP}}</td>
                  <td>{{$row->TNTTP}}</td>
                  <td>{{$row->NTP}}</td>
                  <td>{{$row->rating}}</td>
                </tr>
                <?php $No++; ?>
                @endif

                @endforeach

                </tbody>
                
              </table>

          </div>
        
      </div>

          
          </div>
          <!-- /.tab-content -->

            <!-- Tab pane -->
        
          <!-- nav-tabs-custom -->

        <div class="col-md-5">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Keterangan</b></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>NP1 : Nilai Pemasok 1 (Kualitas)
                NP2 : Nilai Pemasok 2 (Biaya)</br>
                NP3 : Nilai Pemasok 3 (Waktu Pengiriman)</br>
                NP4 : Nilai Pemasok 4 (Keterlambatan Waktu Penyerahan)</br>
                NP5 : Nilai Pemasok 5 (Respon Penawaran)</br>
                NP6 : Nilai Pemasok 6 (Respon terhadap kebutuhan Inalum atau layanan purna jual)</br>
                TNBTP : Total Nilai Bisnis Tahunan Pemasok</br>
                TNTTP : Total Nilai Teknis Tahunan Pemasok</br>
                NTP : Nilai Tahunan Pemasok</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

         

        
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

  

 



   <script type="text/javascript">
     function deleteVendor(id)
     {
         var id = id;
         var url = '{{ route("vendors.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>

@endsection
