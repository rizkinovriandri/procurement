@extends('layouts.app_spare')

@section('content')


<!-- Content Wrapper. Contains page content -->
    
    <section class="content-header">
      <h1>
        Data User
        <small>Daftar User terdaftar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>User Management</a></li>
        <li><a href="#">Data User</a></li>
        <li class="active">User list</li>
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

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                @foreach($users as $row)  
                <tr>
                  <td>{{$row->nik}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->created_at}}</td>
                  <td>
                      @if ($row->roleusers->role_id == 1)
                        Admin
                      @elseif ($row->roleusers->role_id == 2)
                        Member
                      @else
                        Vendor
                      @endif
                  </td>
                  <td>
                    <a  href="{{route('users.edit',$row->id)}}" class="btn btn-primary pull-left" style="margin-right: 10px"><i class="fa fa-edit"></i></a>
                    <button type="submit" data-toggle="modal" onclick="deleteUser({{$row->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
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

    

function deleteUser(id)
{
    var id = id;
    var url = '{{ route("users.destroy", ":id") }}';
    url = url.replace(':id', id);
    $("#deleteForm").attr('action', url);
}


function formSubmit()
{
    $("#deleteForm").submit();
}

function ShowHideDiv() {
   var chkYes = document.getElementById("chkYes");
   var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku");
   isi_tanggal_berlaku.style.display = chkYes.checked ? "block" : "none";
}



</script>

@endsection
