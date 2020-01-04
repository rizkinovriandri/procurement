@extends('layouts.app_spare')

@section('content')


<!-- Content Wrapper. Contains page content -->
    
    <section class="content-header">
      <h1>
        Data Keagenan
        <small>Daftar Keagenan Vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Vendor Management</a></li>
        <li class="active">Vendor List</li>
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
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
          <!-- Content Here -->
          
          <?php $No = 1; ?>
          

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 4%">No</th>
                  <!-- <th style="width: 4%">Vendor ID</th> -->
                  <th style="width: 20%">Nama Vendor</th>
                  <th style="width: 6%">Nama Principle</th>
                  <th>Jenis Barang</th>
                  <th>Tanggal Berlaku</th>
                  <th>Tanggal Berakhir</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                @foreach($keagenans as $row)  
                <tr>
                  <!-- <td>{{$row->id}}</td>  -->
                  <td>{{$No}}</td>
                  
                  <!-- <td>{{$row->id}}</td> -->
                  <!-- <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td> -->
                  <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td>
                  <td>{{$row->nama_principle}}</td>
                  <td>{{$row->jenis_barang}}</td>
                  <td>{{date('d-M-Y',strtotime($row->tgl_berlaku_mulai))}}</td>
                  <td>{{date('d-M-Y',strtotime($row->tgl_berlaku_sampai))}}</td>
                  <td>
                    <a href="{{url('documents/keagenan/'.$row->filename)}}" target="_blank" type="application/pdf">lihat dokumen</a>
                  </td>
                </tr>
                <?php $No++; ?>
                @endforeach

                </tbody>
                
              </table>


          <!-- Content Here -->
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
