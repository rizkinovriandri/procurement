@extends('layouts.app_spare')

@section('content')


<!-- Content Wrapper. Contains page content -->
    
    <section class="content-header">
      <h1>
        Data Vendor
        <small>Daftar Vendor Suspended</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Vendor Management</a></li>
        <li class="active">Vendor Suspended</li>
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
                  <th style="width: 20%">Nama</th>
                  <th style="width: 6%">Badan Usaha</th>
                  <th>Type</th>
                  <th>Kualifikasi</th>
                  <th>Status</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Berakhir</th> 
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($vendors as $row)  
                <tr>
                  <!-- <td>{{$row->id}}</td>  -->
                  <td>{{$No}}</td>
                  
                  <!-- <td>{{$row->id}}</td> -->
                  <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td>
                  <td>{{$row->badan_usaha}}</td>
                  <td>{{$row->type}}</td>
                  <td>{{$row->kualifikasi}}</td>
                  <td>
                    <center>
                            @if($row->status=="Pemasok Mampu")
                              <span class="label label-success">{{$row->status}}</span>
                            @elseif ($row->status=="Pemasok Baru")
                              <span class="label label-primary">{{$row->status}}</span>
                            @elseif ($row->status=="Suspended")
                              <span class="label label-warning">{{$row->status}}</span>
                            @elseif ($row->status=="Calon Pemasok")
                              <span class="label label-info">{{$row->status}}</span>
                            @elseif ($row->status=="Daftar Hitam")
                              <span class="label label-danger">{{$row->status}}</span>
                            @endif
                    </center>
                  </td>
                  <td>{{$row->tgl_mulai}}</td>
                  <td>{{$row->tgl_berakhir}}</td>
                  <td>{{$row->keterangan}}</td>
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
