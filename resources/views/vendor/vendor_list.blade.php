@extends('layouts.app_spare')

@section('content')

<style>

  </style>

<!-- Content Wrapper. Contains page content -->
    
    <section class="content-header">
      <h1>
        Data Vendor
        <small>Daftar Vendor</small>
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
          

          <table id="tbl_vendor"  class="table table-bordered table-striped">
            <thead>
            <tr>
              <th >No</th>
              <th style="width: 300px">Nama</th>
              <th >Badan Usaha</th>
              <th >Kota</th>
              <th >Type</th>
              <th >Kualifikasi</th>
              <th >Status</th>
              <th >Bidang</th>
              <th >Nilai Evaluasi Tahun Terakhir</th>
              @role('admin')
                <th style="width: 100px" >Action</th>
              @endrole  
            </tr>
            </thead>

            <tbody>
    
              @foreach($vendors as $row)  
              <tr>
                <!-- <td>{{$row->id}}</td>  -->
                <td>{{$No}}</td>
                <td><a href="{{url('vendors',$row->id)}}">{{$row->nama}}</a></td>
                <td>{{$row->badan_usaha}}</td>
                <td style="white-space: nowrap">{{$row->kota}}</td>
                <td>{{$row->type}}</td>
                <td><center>{{$row->kualifikasi}}<center></td>
                <td>
                  <center>
                    <!-- {{$row->statuses->status}} -->
          
                          @if($row->statuses->status=="Pemasok Mampu")
                            <span class="label label-success">{{$row->statuses->status}}</span>
                          @elseif ($row->statuses->status=="Pemasok Baru")
                            <span class="label label-primary">{{$row->statuses->status}}</span>
                          @elseif ($row->statuses->status=="Suspended")
                            <span class="label label-warning">{{$row->statuses->status}}</span>
                          @elseif ($row->statuses->status=="Calon Pemasok")
                            <span class="label label-info">{{$row->statuses->status}}</span>
                          @elseif ($row->statuses->status=="Daftar Hitam")
                            <span class="label label-danger">{{$row->statuses->status}}</span>
                          @endif
                  </center>  
                </td>

                <?php $sub_bidang_jasa = $row->subjasas->first()->sub_bidang ?? "";
                      $sub_bidang_barang = $row->subbarangs->first()->sub_bidang ?? "";

                      if ($sub_bidang_jasa == ""){ 
                        $sub_bidang = $sub_bidang_barang;
                      }else{
                        $sub_bidang = $sub_bidang_jasa;
                      } 

                ?>

                <td style="white-space: nowrap"><?php echo $sub_bidang; ?></td>
                <td style="white-space: nowrap">{{$row->evaluasis->first()->NTP ?? ""}} - {{$row->evaluasis->first()->rating ?? ""}}</td>
                @role('admin')
                <td>
                  <a  href="{{route('vendors.edit',$row->id)}}" class="btn btn-primary pull-left" style="margin-right: 10px"><i class="fa fa-edit"></i></a>
                  <button type="submit" data-toggle="modal" onclick="deleteVendor({{$row->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
                @endrole
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
