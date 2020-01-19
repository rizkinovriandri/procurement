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
              <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input">
              <i class="fa fa-plus"></i>  Tambah Pengurus
              </button>
              @endrole
              
                <!--/.Form API -->

                <!-- List table API -->

                      <!-- Content Here -->
                      </br></br>
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th style="width: 23%">Nama</th>
                            <th style="width: 15%">Jabatan</th>
                            <th style="width: 15%">No Telepon</th>
                            <th style="width: 14%">No Handphone</th>
                            <th style="width: 22%">Email</th>
                            @role('admin') <th style="width: 7%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->pengurus as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td class="name">{{$a->nama}}</td>
                            <td class="jabatan">{{$a->jabatan}}</td>
                            <td class="id">{{$a->no_telepon}}</td>
                            <td>{{$a->no_hp}}</td>
                            <td>{{$a->email}}</td>
                            @role('admin')
                            <td>
                              <button data-toggle="modal" data-target="#modal-edit" 
                              data-pengurus_id="{{$a->id}}"
                              data-name="{{$a->nama}}"
                              data-jabatan="{{$a->jabatan}}"
                              data-no_telepon="{{$a->no_telepon}}"
                              data-no_hp="{{$a->no_hp}}"
                              data-email="{{$a->email}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>
                              
                              
                              <button type="submit" data-toggle="modal" onclick="deletePengurus({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            @endrole
                          </tr>
                          @endforeach

                          </tbody>
                          
                        </table>


                    <!-- Content Here -->

                <!--/. List table API  -->

                <!-- Modal input pengurus -->
                <div class="modal fade" id="modal-input">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Input Data Pengurus</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('pengurusstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="box-body">

                        <div class="form-group">
                          <label for="Nama" class="col-sm-3 control-label">Nama</label>

                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama Pengurus" value="{{old('Nama')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Jabatan" class="col-sm-3 control-label">Jabatan</label>

                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="Jabatan" id="Jabatan" placeholder="Jabatan" value="{{old('Jabatan')}}">
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label for="NomorTelepon" class="col-sm-3 control-label">Nomor Telepon</label>

                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="NomorTelepon" id="NomorTelepon" placeholder="Nomor Telepon" value="{{old('NomorTelepon')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="NomorHp" class="col-sm-3 control-label">Nomor Handphone</label>

                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="NomorHp" id="NomorHp" placeholder="Nomor Handphone" value="{{old('NomorHp')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="email" class="col-sm-3 control-label">Email</label>

                          <div class="col-sm-5">
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

                      </div>
                      <!-- /.box-footer -->
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                  
                  </div>
                </div>
                  <!-- /.modal-content -->
              </div>
                <!-- /.modal-dialog -->
          <!-- /Modal input pengurus -->

          <!-- Modal edit pengurus -->
          
          <div class="modal fade" id="modal-edit">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data Pengurus</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('PengurusController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                      {{ method_field('patch')}}
                      {{ csrf_field() }}
                      
                      <div class="box-body">

                        <div class="form-group">
                          <input type="hidden" id="pengurus_id" name="pengurus_id">
                          <label for="Nama" class="col-sm-3 control-label">Nama</label>

                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Nama Pengurus" value="{{old('Nama')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="Jabatan" class="col-sm-3 control-label">Jabatan</label>

                          <div class="col-sm-6">
                            <input type="text" class="form-control" name="Jabatan" id="Jabatan" placeholder="Jabatan" value="{{old('Jabatan')}}">
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label for="NomorTelepon" class="col-sm-3 control-label">Nomor Telepon</label>

                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="NomorTelepon" id="NomorTelepon" placeholder="Nomor Telepon" value="{{old('NomorTelepon')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="NomorHp" class="col-sm-3 control-label">Nomor Handphone</label>

                          <div class="col-sm-4">
                            <input type="text" class="form-control" name="NomorHp" id="NomorHp" placeholder="Nomor Handphone" value="{{old('NomorHp')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="email" class="col-sm-3 control-label">Email</label>

                          <div class="col-sm-7">
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

                      </div>
                      <!-- /.box-footer -->
                    
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                  
                  </div>
                </div>
                  <!-- /.modal-content -->
              </div>
                <!-- /.modal-dialog -->
          <!-- /Modal edit pengurus -->




            </div>
              <!-- /.tab-pane -->

          
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->