 <!-- Custom Tabs (Pulled to the right) -->
 <?php $tabName =  Session::get('activetab'); ?>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#pengurus" data-toggle="tab">Pengurus Perusahaan</a></li>
              <li class="pull-left header"><i class="fa fa-users">&nbsp;</i>Pengurus Perusahaan</li>
            </ul>
            <div class="tab-content">

            <!-- Tab pane -->
            <div class="tab-pane active" id="pengurus">
                <!-- Form API -->
                @role('admin')
              <form action="{{url('pengurusstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="Nama" class="col-sm-2 control-label">Nama</label>

                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama Pengurus" value="{{old('Nama')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Jabatan" class="col-sm-2 control-label">Jabatan</label>

                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="Jabatan" id="Jabatan" placeholder="Jabatan" value="{{old('Jabatan')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="NomorTelepon" class="col-sm-2 control-label">Nomor Telepon</label>

                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="NomorTelepon" id="NomorTelepon" placeholder="Nomor Telepon" value="{{old('NomorTelepon')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="NomorHp" class="col-sm-2 control-label">Nomor Handphone</label>

                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="NomorHp" id="NomorHp" placeholder="Nomor Handphone" value="{{old('NomorHp')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                      </div>
                    </div>                                        
          
                    <div class="form-group">

                      <div class="col-sm-2">
                        <input type="hidden" class="form-control" name="vendor_id" value="{{$vendor->id}}" id="vendor_id" >
                        <input type="hidden" class="form-control" name="vendor_name" value="{{$vendor->nama}}" id="vendor_name" >
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
                @endrole
                <!--/.Form API -->

                <!-- List table API -->

                      <!-- Content Here -->
                      
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th style="width: 20%">Nama</th>
                            <th style="width: 20%">Jabatan</th>
                            <th style="width: 15%">No Telepon</th>
                            <th style="width: 15%">No Handphone</th>
                            <th style="width: 20%">Email</th>
                            @role('admin') <th>Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->pengurus as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->nama}}</td>
                            <td>{{$a->jabatan}}</td>
                            <td>{{$a->no_telepon}}</td>
                            <td>{{$a->no_hp}}</td>
                            <td>{{$a->email}}</td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deletePengurus({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            @endrole
                          </tr>
                          @endforeach

                          </tbody>
                          
                        </table>


                    <!-- Content Here -->

                <!--/. List table API  -->
            
            </div>
              <!-- /.tab-pane -->

          
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->