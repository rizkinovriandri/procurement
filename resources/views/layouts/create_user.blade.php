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
        Registrasi User
        <small>Pendaftaran User Baru</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>User Management</a></li>
        <li class="active">Input User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Registrasi</h3>

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
            <form action="{{url('userstore')}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="NIK" class="col-sm-2 control-label">Nomor Induk Karyawan (NIK)</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK" value="{{old('NIK')}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Nama" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama Karyawan" value="{{old('Nama')}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Password" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-2">
                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password" value="{{old('Password')}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="RetypePassword" class="col-sm-2 control-label">Ulangi Password</label>

                  <div class="col-sm-2">
                    <input type="password" class="form-control" name="RetypePassword" id="RetypePassword" placeholder="Re-type Password" value="{{old('RetypePassword')}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="UserType" class="col-sm-2 control-label">User Type</label>

                  <div class="col-sm-2">
                    <select class="form-control"  name="UserType" id="UserType" value="{{old('UserType')}}">
                      <option value="1" @if (old("UserType") == "1") selected="selected" @endif>Admin</option>
                      <option value="2" @if (old("UserType") == "2") selected="selected" @endif>Member</option>
                      <option value="3" @if (old("UserType") == "3") selected="selected" @endif>Vendor</option>
                      
                  </select>
                    
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
