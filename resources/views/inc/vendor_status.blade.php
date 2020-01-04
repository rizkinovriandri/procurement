 <!-- Custom Tabs (Pulled to the right) -->
 <?php $tabName =  Session::get('activetab'); ?>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#pengurus" data-toggle="tab">Vendor Status</a></li>
              <li class="pull-left header"><i class="fa fa-info-circle">&nbsp;</i>Vendor Status</li>
            </ul>
            <div class="tab-content">

            <!-- Tab pane -->
            <div class="tab-pane active" id="status">
                <!-- Form API -->

                <?php $result = DB::table('statuses')->where('vendor_id', '=', $vendor->id)->exists(); ?>

                
                @if ($result)
                <?php $current_status = $vendor->statuses->status; ?>
                <div class="vendorinfo" style="width:70%">
                      <table class="table table-bordered">
                        <tr>
                          <th style="width: 350px"> </th>
                           <th> </th> 
                        </tr>
                        <tr>
                          <td><b>Status</b></td>
                          <td>
                            <div>
                            @if($current_status=="Pemasok Mampu")
                              <span class="label label-success">{{$current_status}}</span>
                            @elseif ($current_status=="Pemasok Baru")
                              <span class="label label-primary">{{$current_status}}</span>
                            @elseif ($current_status=="Suspended")
                              <span class="label label-warning">{{$current_status}}</span>
                            @elseif ($current_status=="Calon Pemasok")
                              <span class="label label-info">{{$current_status}}</span>
                            @elseif ($current_status=="Daftar Hitam")
                              <span class="label label-danger">{{$current_status}}</span>
                            @endif
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                        
                        @if ($vendor->statuses->status=="Suspended")
                        <tr>
                          <td><b>Tanggal awal suspend</b></td>
                          <td>
                            <div>
                            {{date('d-M-Y',strtotime($vendor->statuses->tgl_mulai))}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                      
                        <tr>
                          <td><b>Tanggal Akhir Suspend</b></td>
                          <td>
                            <div>
                            {{date('d-M-Y',strtotime($vendor->statuses->tgl_berakhir))}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>

                        <tr>
                          <td><b>Permasalahan</b></td>
                          <td>
                            <div>
                            {{$vendor->statuses->keterangan}}
                            </div>
                          </td>
                          <!-- <td><span class="badge bg-red">55%</span></td> -->
                        </tr>
                        
                        @endif

                      </table>

                      @role('admin')
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                        Ubah Status
                      </button>
                      @endrole
                      
                    <!-- Content Here -->

                <!--/. List table API  -->
            
            </div>
              <!-- /.tab-pane -->

              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Set Status</h4>
                    </div>
                    <div class="modal-body">
                      
                    <form action="{{action('StatusController@update',$vendor->id)}}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="PATCH" />
                      <div class="box-body">

                        <div class="form-group">
                          <label for="Status" class="col-sm-2 control-label">Status</label>

                          <div class="col-sm-3">
                          <select style="width: 300px" class="form-control" name="Status" onchange="showDivStatus('hidden_div', this)" id="Status" value="{{old('Status')}}">
                                <option value="Pemasok Mampu" @if (old("Status") == "Pemasok Mampu") selected="selected" @endif>Pemasok Mampu</option>
                                <option value="Pemasok Baru" @if (old("Status") == "Pemasok Baru") selected="selected" @endif>Pemasok Baru</option>
                                <option value="Suspended" @if (old("Status") == "Suspended") selected="selected" @endif>Suspended</option>
                                <option value="Calon Pemasok" @if (old("Status") == "Calon Pemasok") selected="selected" @endif>Calon Pemasok</option>
                                <option value="Daftar Hitam" @if (old("Status") == "Daftar Hitam") selected="selected" @endif>Daftar Hitam</option>
                                
                              </select>
                          </div>
                        </div>
                      <div id="hidden_div">
                        <div  class="form-group">
                          <label for="BerlakuMulaiSuspend" class="col-sm-2 control-label">Berlaku Mulai</label>

                          <div class="col-sm-4"> 
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                  <input type="text" class="form-control pull-right" value="{{$vendor->statuses->tgl_mulai}}" name="BerlakuMulaiSuspend" id="tgl_awal_suspend">
                                  
                              </div>

                          </div>
                        </div>

                        <div  class="form-group">
                        <label for="BerlakuSampaiSuspend" class="col-sm-2 control-label">Berlaku Sampai</label>

                        <div class="col-sm-4"> 
                          <div class="input-group date">
                          <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                          <input type="text" class="form-control pull-right" value="{{$vendor->statuses->tgl_berakhir}}" name="BerlakuSampaiSuspend" id="tgl_akhir_suspend">
                        </div>

                        </div>
                        
                      </div>

                        <div class="form-group">
                          <label for="AlasanSuspend" class="col-sm-2 control-label">Alasan Suspend</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="AlasanSuspend" id="AlasanSuspend" placeholder="Alasan Suspend" value="{{$vendor->statuses->keterangan}}">
                          </div>
                          
                        </div>

                   
                   </div>
                   <!-- ./hide div -->

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
                        
                      </center> 
                      </div>
                      <!-- /.box-footer -->
                    

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>


                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              @else
                        Status Vendor belum ditentukan
                        <br/><br/>

                      @role('admin')   
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-input">
                        Tentukan Status
                      </button>
                      @endrole

                      <div class="modal fade" id="modal-input">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Tentukan Status</h4>
                    </div>
                    <div class="modal-body">
                      
                    <form action="{{url('statusstore')}}" method="POST" class="form-horizontal">
                      {{ csrf_field() }}
                      
                      <div class="box-body">

                        <div class="form-group">
                          <label for="Status" class="col-sm-2 control-label">Status</label>

                          <div class="col-sm-3">
                          <select style="width: 300px" class="form-control" name="Status" onchange="showDivStatus('hidden_div', this)" id="Status" value="{{old('Status')}}">
                                <option value="Pemasok Mampu" @if (old("Status") == "Pemasok Mampu") selected="selected" @endif>Pemasok Mampu</option>
                                <option value="Pemasok Baru" @if (old("Status") == "Pemasok Baru") selected="selected" @endif>Pemasok Baru</option>
                                <option value="Suspended" @if (old("Status") == "Suspended") selected="selected" @endif>Suspended</option>
                                <option value="Calon Pemasok" @if (old("Status") == "Calon Pemasok") selected="selected" @endif>Calon Pemasok</option>
                                <option value="Daftar Hitam" @if (old("Status") == "Daftar Hitam") selected="selected" @endif>Daftar Hitam</option>
                                
                              </select>
                          </div>
                        </div>
                      <div id="hidden_div">
                        <div  class="form-group">
                          <label for="BerlakuMulaiSuspend" class="col-sm-2 control-label">Berlaku Mulai</label>

                          <div class="col-sm-4"> 
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                  <input type="text" class="form-control pull-right" value="{{old('BerlakuMulaiSuspend')}}" name="BerlakuMulaiSuspend" id="tgl_awal_suspend">
                                  
                              </div>

                          </div>
                        </div>

                        <div  class="form-group">
                        <label for="BerlakuSampaiSuspend" class="col-sm-2 control-label">Berlaku Sampai</label>

                        <div class="col-sm-4"> 
                          <div class="input-group date">
                          <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                          <input type="text" class="form-control pull-right" value="{{old('BerlakuSampaiSuspend')}}" name="BerlakuSampaiSuspend" id="tgl_akhir_suspend">
                        </div>

                        </div>
                        
                      </div>

                        <div class="form-group">
                          <label for="AlasanSuspend" class="col-sm-2 control-label">Alasan Suspend</label>

                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="AlasanSuspend" id="AlasanSuspend" placeholder="Alasan Suspend" value="{{old('AlasanSuspend')}}">
                          </div>
                          
                        </div>

                   
                   </div>
                   <!-- ./hide div -->

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
                        
                      </center> 
                      </div>
                      <!-- /.box-footer -->
                    

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>


                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              @endif
          
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>