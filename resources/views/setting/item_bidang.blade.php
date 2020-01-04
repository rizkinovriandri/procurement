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
<?php $nomor=1; ?>
    <section class="content-header">
      <h1>
        Pengaturan Sub Bidang
        <small>Manajemen data sub bidang pekerjaan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Setting</a></li>
        <li class="active">Item Bidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Maintenance data item sub bidang perusahaan</h3>

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
            @role('admin')
            <form action="{{url('itembidangstore')}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body">

                
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
                  <label for="SubBidang" class="col-sm-2 control-label">Sub bidang (Klasifikasi)</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="SubBidang" value="{{old('SubBidang')}}" id="SubBidang" placeholder="Sub Bidang">
                  </div>
                </div>
                <center>
                <!-- <button type="reset" class="btn btn-default pull-center">Reset</button>
                &nbsp;&nbsp; -->
                <button type="submit" class="btn btn-primary pull-center">Submit</button>
               </center> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
              </div>
              <!-- /.box-footer -->
            </form>
            @endrole
          </div>


          
          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        </div>
        &nbsp
          
          
          <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Sub Bidang</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button> -->
          </div>
        </div>
        <div class="box-body">
          
          <!-- Content Here -->
          <div class="boxcontainer" style="width:65%">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 2%">No</th>
                  <th style="width: 10%">Bidang</th>
                  <th style="width: 30%">Sub Bidang</th>
                  <th style="width: 4%; text-align:center">Kode Sub Bidang</th>
                  @role('admin') <th style="width: 3%; text-align:center">Action</th> @endrole
                </tr>
                </thead>
                <tbody>
                
                @foreach($itembidangs as $row)  
                <tr>
                  
                  <td>{{$nomor}}</td>
                  
                  <td>{{$row->bidang}}</td>
                  <td>{{$row->sub_bidang}}</a></td>
                  <td style="text-align:center">{{$row->id}}</td>
                  @role('admin')
                  <td style="text-align:center">
                    <button type="submit" data-toggle="modal" onclick="deleteItemBidang({{$row->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                  </td>
                  @endrole
                </tr>
                <?php $nomor++; ?>
                @endforeach

                </tbody>
                
              </table>
              </div>

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

    

function deleteItemBidang(id)
{
  var id = id;
  var url = '{{ route("itembidangs.destroy", ":id") }}';
  url = url.replace(':id', id);
  $("#deleteForm").attr('action', url);
}

function formSubmit()
{
         $("#deleteForm").submit();
}

</script>

@endsection
