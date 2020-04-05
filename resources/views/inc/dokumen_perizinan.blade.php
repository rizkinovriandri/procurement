 <!-- Custom Tabs (Pulled to the right) -->
 <?php $tabName =  Session::get('activetab'); ?>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
            <li><a href="#api" data-toggle="tab">Angka Pengenal Importir</a></li>
              <li><a href="#siujk" data-toggle="tab">SIUJK</a></li>
              <li><a href="#tdp" data-toggle="tab">TDP</a></li>
              <li><a href="#siup" data-toggle="tab">SIUP/NIB</a></li>
              <li><a href="#skkem" data-toggle="tab">SK Kemenkumham</a></li>
              <li class="active"><a href="#akta" data-toggle="tab">Akta Perusahaan</a></li>
              <!-- <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                  Dropdown <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                  <li role="presentation" class="divider"></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                </ul>
              </li> -->
              <li class="pull-left header"><i class="fa fa-file-text-o"></i> Dokumen Perizinan</li>
            </ul>
            <div class="tab-content">

            <!-- Tab pane -->
            <div class="tab-pane" id="api">
                <!-- Form API -->
              @role('admin')

              <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input-api">
                <i class="fa fa-plus"></i>  Tambah API
              </button>
              <br><br>
              @endrole
                <!--/.Form API -->

                <!-- Modal input api -->
                <div class="modal fade" id="modal-input-api">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Input API</h4>
                              </div>
                              <div class="modal-body">
                              <form action="{{url('apistore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  
                    
                                {{ csrf_field() }}

                                <div class="box-body">

                                <div class="form-group">
                                  <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen API</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen API" value="{{old('NomorDokumen')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan API</label>

                                  <div class="col-sm-4"> 
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                      <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="tgl_api1">
                                    </div>

                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                                <div class="col-sm-6" style="margin-left: 15px;">
                                  <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                  <!-- radio -->
                                  <div class="form-group">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="MasaBerlakuStatus" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivApi()">
                                        Berlaku seterusnya
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="chkYesApi" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivApi()">
                                        Berlaku sampai dengan  
                                      </label> 
                                      
                                    </div>
                                    <!--  -->
                                    <div class="col-sm-8" id="isi_tanggal_berlaku_api" style="display: none"> 
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="tgl_api2">
                                      </div>
                                    </div>
                                  <!--  -->
                                  </div>

                                </div>
                              </div>
                    
                              <div class="form-group">
                                <label for="UploadApi" class="col-sm-3 control-label">Upload API</label>

                                <div class="col-sm-4">
                                  <input type="file" name="FileApi">
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
              <!-- /Modal input api -->

              <!-- Modal edit api -->
              <div class="modal fade" id="modal-edit-api">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit API</h4>
                              </div>
                              <div class="modal-body">
                              <form action="{{action('ApiController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                              
                                {{ method_field('patch')}}
                    
                                {{ csrf_field() }}

                                <div class="box-body">

                                <div class="form-group">
                                  <input type="hidden" id="id_api" name="id_api">
                                  <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen API</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen API" value="{{old('NomorDokumen')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan API</label>

                                  <div class="col-sm-4"> 
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                      <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="edit_tgl_api1">
                                    </div>

                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                                <div class="col-sm-6" style="margin-left: 15px;">
                                  <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                  <!-- radio -->
                                  <div class="form-group">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuApi1" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivApiEdit()">
                                        Berlaku seterusnya
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuApi2" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivApiEdit()">
                                        Berlaku sampai dengan  
                                      </label> 
                                      
                                    </div>
                                    <!--  -->
                                    <div class="col-sm-8" id="edit_isi_tanggal_berlaku_api" style="display: none"> 
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="edit_tgl_api2">
                                      </div>
                                    </div>
                                  <!--  -->
                                  </div>

                                </div>
                              </div>
                    
                              <div class="form-group">
                                <label for="UploadApi" class="col-sm-3 control-label">Upload API</label>

                                <div class="col-sm-4">
                                  <input type="file" name="FileApi">
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
              <!-- /Modal edit api -->



                <!-- List table API -->

                      <!-- Content Here -->
                      
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th style="width: 15%">Nomor Dokumen</th>
                            <th style="width: 12%">Tanggal Penerbitan</th>
                            <th style="width: 20%">Instansi Penerbit</th>
                            <th style="width: 12%">Masa Berlaku</th>
                            <th style="width: 12%">File</th>
                            @role('admin')<th style="width: 11%">Action</th>@endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->apis as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->no_dokumen}}</td>
                            <td align="center">{{ \Carbon\Carbon::parse($a->tgl_penerbitan)->format('j F Y') }}</td>
                            <td>{{$a->instansi_penerbit}}</td>
                            <td>
                              <?php
                                if ($a->masa_berlaku_status == 0)
                                    echo "Berlaku seterusnya";
                                else
                                    // echo "ada masa berlakunya";
                                    echo  \Carbon\Carbon::parse($a->berlaku_sampai)->format('j F Y');
                              ?>

                            </td>
                            <td>
                              @if ($a->filename <>"")
                                <a href="{{url('documents/api/'.$a->filename)}}" target="_blank" type="application/pdf"><button type="button" class="btn btn-block btn-primary btn-sm">lihat dokumen</button></a>
                              @else 
                                <button type="button" class="btn btn-block btn-danger btn-sm">tidak ada file</button>
                              @endif
                            </td>
                            @role('admin')
                            <td>
                            <button data-toggle="modal" data-target="#modal-edit-api" 
                              data-no_dokumen="{{$a->no_dokumen}}"
                              data-id_api="{{$a->id}}"
                              data-tgl_penerbitan="{{$a->tgl_penerbitan}}"
                              data-instansi_penerbit="{{$a->instansi_penerbit}}"
                              data-masa_berlaku_status="{{$a->masa_berlaku_status}}"
                              data-berlaku_sampai="{{$a->berlaku_sampai}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>
                              <button type="submit" data-toggle="modal" onclick="deleteApi({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

            <!-- Tab pane -->
            <div class="tab-pane" id="siujk">
                <!-- Form SIUJK -->
              @role('admin')

              <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input-siujk">
                <i class="fa fa-plus"></i>  Tambah SIUJK
              </button>
              <br><br>
              
            @endrole
                <!--/.Form SIUJK -->

                <!-- Modal input siujk -->
                <div class="modal fade" id="modal-input-siujk">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Input SIUJK</h4>
                              </div>
                              <div class="modal-body">
                              <form action="{{url('siujkstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  
                    
                                {{ csrf_field() }}

                                <div class="box-body">

                                <div class="form-group">
                                  <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen SIUJK</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen" value="{{old('NomorDokumen')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan</label>

                                  <div class="col-sm-4"> 
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                      <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="tgl_siujk1">
                                    </div>

                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                                <div class="col-sm-8" style="margin-left: 15px;">
                                  <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                  <!-- radio -->
                                  <div class="form-group">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="MasaBerlakuStatus" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivSiujk()">
                                        Berlaku seterusnya
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="chkYesSiujk" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivSiujk()">
                                        Berlaku sampai dengan  
                                      </label> 
                                      
                                    </div>
                                    <!--  -->
                                    <div class="col-sm-6" id="isi_tanggal_berlaku_siujk" style="display: none"> 
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="tgl_siujk2">
                                      </div>
                                    </div>
                                  <!--  -->
                                  </div>

                                </div>
                              </div>

                                
                        
                              <div class="form-group">
                                <label for="UploadTdp" class="col-sm-3 control-label">Upload SIUJK</label>

                                <div class="col-sm-4">
                                  <input type="file" name="FileSiujk">
                                  <!-- <input type="text" class="form-control" name="FileAkta" value="{{old('UploadAkta')}}" id="UploadAkta" placeholder="Upload Akta"> -->
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
              <!-- /Modal input siujk -->

              <!-- Modal edit siujk -->
              <div class="modal fade" id="modal-edit-siujk">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit SIUJK</h4>
                              </div>
                              <div class="modal-body">
                              <form action="{{action('SiujkController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                              
                                {{ method_field('patch')}}
                    
                                {{ csrf_field() }}

                                <div class="box-body">

                                <div class="form-group">
                                  <input type="hidden" id="id_siujk" name="id_siujk"> 
                                  <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen SIUJK</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen" value="{{old('NomorDokumen')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan</label>

                                  <div class="col-sm-4"> 
                                    <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                      <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="edit_tgl_siujk1">
                                    </div>

                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                                  <div class="col-sm-6">
                                    <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                                  </div>
                                </div>

                                <div class="form-group">
                                <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                                <div class="col-sm-8" style="margin-left: 15px;">
                                  <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                  <!-- radio -->
                                  <div class="form-group">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuSiujk1" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivSiujkEdit()">
                                        Berlaku seterusnya
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuSiujk2" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivSiujkEdit()">
                                        Berlaku sampai dengan  
                                      </label> 
                                      
                                    </div>
                                    <!--  -->
                                    <div class="col-sm-6" id="edit_isi_tanggal_berlaku_siujk" style="display: none"> 
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="edit_tgl_siujk2">
                                      </div>
                                    </div>
                                  <!--  -->
                                  </div>

                                </div>
                              </div>

                                
                        
                              <div class="form-group">
                                <label for="UploadTdp" class="col-sm-3 control-label">Upload SIUJK</label>

                                <div class="col-sm-4">
                                  <input type="file" name="FileSiujk">
                                  <!-- <input type="text" class="form-control" name="FileAkta" value="{{old('UploadAkta')}}" id="UploadAkta" placeholder="Upload Akta"> -->
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
              <!-- /Modal edit siujk -->

                <!-- List table SIUJK -->

                      <!-- Content Here -->
                      
                        <?php $No = 1; ?>
                      

                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th style="width: 15%">Nomor Dokumen</th>
                            <th style="width: 11%">Tanggal Penerbitan</th>
                            <th style="width: 20%">Instansi Penerbit</th>
                            <th style="width: 11%">Masa Berlaku</th>
                            <th style="width: 11%">File</th>
                            @role('admin') <th style="width: 10%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->siujks as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->no_dokumen}}</td>
                            <td align="center">{{ \Carbon\Carbon::parse($a->tgl_penerbitan)->format('j F Y') }}</td>
                            <td>{{$a->instansi_penerbit}}</td>
                            <td>
                              <?php
                                if ($a->masa_berlaku_status == 0)
                                    echo "Berlaku seterusnya";
                                else
                                    // echo "ada masa berlakunya";
                                    echo  \Carbon\Carbon::parse($a->berlaku_sampai)->format('j F Y');
                              ?>

                            </td>
                            <td>
                              
                              @if ($a->filename <>"")
                                <a href="{{url('documents/siujk/'.$a->filename)}}" target="_blank" type="application/pdf"><button type="button" class="btn btn-block btn-primary btn-sm">lihat dokumen</button></a>
                              @else 
                                <button type="button" class="btn btn-block btn-danger btn-sm">tidak ada file</button>
                              @endif
                            </td>
                            @role('admin')
                            <td>
                            <button data-toggle="modal" data-target="#modal-edit-siujk" 
                              data-no_dokumen="{{$a->no_dokumen}}"
                              data-id_siujk="{{$a->id}}"
                              data-tgl_penerbitan="{{$a->tgl_penerbitan}}"
                              data-instansi_penerbit="{{$a->instansi_penerbit}}"
                              data-masa_berlaku_status="{{$a->masa_berlaku_status}}"
                              data-berlaku_sampai="{{$a->berlaku_sampai}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>
                              <button type="submit" data-toggle="modal" onclick="deleteSiujk({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            @endrole
                          </tr>
                          @endforeach

                          </tbody>
                          
                        </table>


                    <!-- Content Here -->

                <!--/. List table SIUJK  -->
            
            
            </div>
              <!-- /.tab-pane -->

            <div class="tab-pane" id="tdp">
                
          @role('admin')
          
          <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input-tdp">
                <i class="fa fa-plus"></i>  Tambah TDP
          </button>
          <br><br>
            @endrole

              <!-- Modal input tdp -->
                    <div class="modal fade" id="modal-input-tdp">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Input TDP</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{{url('tdpstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    
                                {{ csrf_field() }}

                                <div class="box-body">

                                <div class="form-group">
                                <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen TDP</label>

                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen" value="{{old('NomorDokumen')}}">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan</label>

                                <div class="col-sm-4"> 
                                  <div class="input-group date">
                                  <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                  </div>
                                    <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="tgl_tdp1">
                                  </div>

                                </div>
                              </div>

                              <div class="form-group">
                                <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                                </div>
                              </div>

                                  <div class="form-group">
                        <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                        <div class="col-sm-6" style="margin-left: 15px;">
                          <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                          <!-- radio -->
                          <div class="form-group">
                            <div class="radio">
                              <label>
                                <input type="radio" name="MasaBerlakuStatus" id="MasaBerlakuStatus" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivTdp()">
                                Berlaku seterusnya
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="MasaBerlakuStatus" id="chkYesTdp" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivTdp()">
                                Berlaku sampai dengan  
                              </label> 
                              
                            </div>
                            <!--  -->
                            <div class="col-sm-8" id="isi_tanggal_berlaku_tdp" style="display: none"> 
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="tgl_tdp2">
                              </div>
                            </div>
                          <!--  -->
                          </div>

                        </div>
                      </div>

                                
                        
                      <div class="form-group">
                        <label for="UploadTdp" class="col-sm-3 control-label">Upload TDP</label>

                        <div class="col-sm-3">
                          <input type="file" name="FileTdp">
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
              <!-- /Modal input tdp -->

              <!-- Modal edit tdp -->
              <div class="modal fade" id="modal-edit-tdp">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Input TDP</h4>
                              </div>
                              <div class="modal-body">
                                <form action="{{action('TdpController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                {{ method_field('patch')}}
                                {{ csrf_field() }}

                                <div class="box-body">

                                <div class="form-group">
                                <input type="hidden" id="id_tdp" name="id_tdp">
                                <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen TDP</label>

                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen" value="{{old('NomorDokumen')}}">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan</label>

                                <div class="col-sm-4"> 
                                  <div class="input-group date">
                                  <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                  </div>
                                    <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="edit_tgl_tdp1">
                                  </div>

                                </div>
                              </div>

                              <div class="form-group">
                                <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                                <div class="col-sm-6">
                                  <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                                </div>
                              </div>

                                  <div class="form-group">
                        <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                        <div class="col-sm-6" style="margin-left: 15px;">
                          <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                          <!-- radio -->
                          <div class="form-group">
                            <div class="radio">
                              <label>
                                <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuTdp1" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivTdpEdit()">
                                Berlaku seterusnya
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuTdp2" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivTdpEdit()">
                                Berlaku sampai dengan  
                              </label> 
                              
                            </div>
                            <!--  -->
                            <div class="col-sm-8" id="edit_isi_tanggal_berlaku_tdp" style="display: none"> 
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="edit_tgl_tdp2">
                              </div>
                            </div>
                          <!--  -->
                          </div>

                        </div>
                      </div>

                                
                        
                      <div class="form-group">
                        <label for="UploadTdp" class="col-sm-3 control-label">Upload TDP</label>

                        <div class="col-sm-3">
                          <input type="file" name="FileTdp">
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
              <!-- /Modal edit tdp -->


                <!-- table list tdp -->

                <!-- Content Here -->
              
                <?php $No = 1; ?>
              

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 4%">No</th>
                      <th style="width: 16%">Nomor Dokumen</th>
                      <th style="width: 12%">Tanggal Penerbitan</th>
                      <th style="width: 20%">Instansi Penerbit</th>
                      <th style="width: 12%">Masa Berlaku</th>
                      <th style="width: 12%">File</th>
                      @role('admin') <th style="width: 11%">Action</th> @endrole
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($vendor->tdps as $a)
                      
                    <tr>
                    
                      <td>{{$No}}</td>
                      <?php $No++; ?>
                      <td>{{$a->no_dokumen}}</td>
                      <td align="center">{{ \Carbon\Carbon::parse($a->tgl_penerbitan)->format('j F Y') }}</td>
                      <td>{{$a->instansi_penerbit}}</td>
                      <td>
                        <?php
                          if ($a->masa_berlaku_status == 0)
                              echo "Berlaku seterusnya";
                          else
                              // echo "ada masa berlakunya";
                              echo  \Carbon\Carbon::parse($a->berlaku_sampai)->format('j F Y');
                        ?>

                      </td>
                      
                      <td>
                        @if ($a->filename <>"")
                          <a href="{{url('documents/tdp/'.$a->filename)}}" target="_blank" type="application/pdf"><button type="button" class="btn btn-block btn-primary btn-sm">lihat dokumen</button></a>
                        @else 
                          <button type="button" class="btn btn-block btn-danger btn-sm">tidak ada file</button>
                        @endif
                      </td>
                      @role('admin')
                      <td>
                      <button data-toggle="modal" data-target="#modal-edit-tdp" 
                              data-no_dokumen="{{$a->no_dokumen}}"
                              data-id_tdp="{{$a->id}}"
                              data-tgl_penerbitan="{{$a->tgl_penerbitan}}"
                              data-instansi_penerbit="{{$a->instansi_penerbit}}"
                              data-masa_berlaku_status="{{$a->masa_berlaku_status}}"
                              data-berlaku_sampai="{{$a->berlaku_sampai}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>
                        <button type="submit" data-toggle="modal" onclick="deleteTdp({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                      </td>
                      @endrole
                    </tr>
                    @endforeach

                    </tbody>
                    
                  </table>


              <!-- Content Here -->

              <!-- ./table TDP-->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="skkem">
                <!-- Form SK Kemenkumham -->
          @role('admin')

          <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input-skkems">
              <i class="fa fa-plus"></i>  Tambah SK Kemenkumham
          </button>

          @endrole
            <!-- table list SK Kemenkumham -->


            


            <!-- Content Here -->
            </br></br>
            <?php $No = 1; ?>
          

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 4%">No</th>
                  <th style="width: 20%">Nomor SK</th>
                  <th style="width: 10%">Tanggal SK</th>
                  <th style="width: 15%">Modal Dasar</th>
                  <th style="width: 15%">Modal Disetor</th>
                  <th style="width: 14%">File</th>
                  
                  @role('admin') <th style="width: 13%">Action</th> @endrole
                </tr>
                </thead>
                <tbody>
                
                @foreach($vendor->skkems as $a)
                  
                <tr>
                 
                  <td>{{$No}}</td>
                  <?php $No++; ?>
                  <td>{{$a->nomor_sk}}</td>
                  <td align="center">{{ \Carbon\Carbon::parse($a->tgl_sk)->format('j F Y') }}</td>
                  <td align="right">{{$a->cur_modal_dasar}} &nbsp&nbsp {{number_format($a->modal_dasar,2)}}</td>
                  <td align="right">{{$a->cur_modal_disetor}} &nbsp&nbsp {{number_format($a->modal_disetor,2)}}</td>
                  <td><!-- iframe src="{{url('documents/akta/'.$a->filename)}}" width="100%" height="600"></iframe> -->
                    @if ($a->filename <>"")
                      <a href="{{url('documents/skkem/'.$a->filename)}}" target="_blank" type="application/pdf"><button type="button" class="btn btn-block btn-primary btn-sm">lihat dokumen</button></a>
                    @else 
                      <button type="button" class="btn btn-block btn-danger btn-sm">tidak ada file</button>
                    @endif
                  </td>
                  @role('admin')
                  <td>
                  <button data-toggle="modal" data-target="#modal-edit-skkem" 
                              data-nomor_sk="{{$a->nomor_sk}}"
                              data-id_skkem="{{$a->id}}"
                              data-tgl_sk="{{$a->tgl_sk}}"
                              data-cur_modal_dasar="{{$a->cur_modal_dasar}}"
                              data-modal_dasar="{{$a->modal_dasar}}"
                              data-cur_modal_disetor="{{$a->cur_modal_disetor}}"
                              data-modal_disetor="{{$a->modal_disetor}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>
                    <button type="submit" data-toggle="modal" onclick="deleteSkkem({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </td>
                  @endrole
                </tr>
                @endforeach

                </tbody>
                
              </table>


          <!-- Content Here -->

          <!-- ./table list SKKEMS -->

                <!--/.Form SKKEMS -->
              </div>

              <!-- Modal edit skkems -->
          <div class="modal fade" id="modal-edit-skkem">
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data SK Kemenkumham</h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{action('SkkemController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                      {{ method_field('patch')}}
                      {{ csrf_field() }}

                      <div class="box-body">

                      <div class="form-group">
                        <label for="NomorSK" class="col-sm-3 control-label">Nomor SK</label>
                        <div class="col-sm-5">
                          <input type="hidden" id="id_skkem" name="id_skkem">
                          <input type="text" class="form-control" name="NomorSK" value="{{old('NomorSK')}}" id="NomorSK" placeholder="Nomor SK Kemenkumham">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="TanggalSK" class="col-sm-3 control-label">Tanggal SK</label>
                        <div class="col-sm-4"> 
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input type="text" class="form-control pull-right" value="{{old('TanggalSK')}}" name="TanggalSK" id="tgl_skkem_edit">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                  <label for="ModalDasar" class="col-sm-3 control-label">Modal Dasar</label>

                    <div class="row">
                      <div class="col-xs-2 " style="padding-right: 5">
                        
                          <select style="width: 80px" class="form-control" name="CurModalDasar" id="CurModalDasar" value="{{old('CurModalDasar')}}">
                            <option id="CurModIDR" value="IDR" @if (old("CurModalDasar") == "IDR") selected="selected" @endif>IDR</option>
                            <option id="CurModUSD" value="USD" @if (old("CurModalDasar") == "USD") selected="selected" @endif>USD</option>
                            <option id="CurModJPY" value="JPY" @if (old("CurModalDasar") == "JPY") selected="selected" @endif>JPY</option>
                            <option id="CurModSGD" value="SGD" @if (old("CurModalDasar") == "SGD") selected="selected" @endif>SGD</option>
                            <option id="CurModEUR" value="EUR" @if (old("CurModalDasar") == "EUR") selected="selected" @endif>EUR</option>
                            <option id="CurModCHF" value="CHF" @if (old("CurModalDasar") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-4" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="ModalDasar" value="{{old('ModalDasar')}}" id="ModalDasar" placeholder="Modal Dasar">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="ModalDisetor" class="col-sm-3 control-label">Modal Disetor</label>

                    <div class="row">
                      <div class="col-xs-2 " style="padding-right: 5">
                        
                          <select style="width: 80px" class="form-control" name="CurModalDisetor" id="CurModalDisetor" value="{{old('CurModalDisetor')}}">
                            <option id="CurDisIDR" value="IDR" @if (old("CurModalDisetor") == "IDR") selected="selected" @endif>IDR</option>
                            <option id="CurDisUSD" value="USD" @if (old("CurModalDisetor") == "USD") selected="selected" @endif>USD</option>
                            <option id="CurDisJPY" value="JPY" @if (old("CurModalDisetor") == "JPY") selected="selected" @endif>JPY</option>
                            <option id="CurDisSGD" value="SGD" @if (old("CurModalDisetor") == "SGD") selected="selected" @endif>SGD</option>
                            <option id="CurDisEUR" value="EUR" @if (old("CurModalDisetor") == "EUR") selected="selected" @endif>EUR</option>
                            <option id="CurDisCHF" value="CHF" @if (old("CurModalDisetor") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-4" style="padding-left: 0" >
                      

                          <input  type="text" class="form-control" name="ModalDisetor" value="{{old('ModalDisetor')}}" id="ModalDisetor" placeholder="Modal Disetor">
                    </div>
                  </div>
                </div>
                        
                    <div class="form-group">
                      <label for="UploadSK" class="col-sm-3 control-label">Upload SK Kemenkumham</label>

                      <div class="col-sm-3">
                        <input type="file" name="FileSK">
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
          <!-- /Modal edit Skkems -->

              <!-- Modal input skkems -->
              <div class="modal fade" id="modal-input-skkems">
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Input Data SK Kemenkumham</h4>
                    </div>
                    <div class="modal-body">
                      <form action="{{url('skkemstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                      {{ csrf_field() }}

                      <div class="box-body">

                      <div class="form-group">
                        <label for="NomorSK" class="col-sm-3 control-label">Nomor SK</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" name="NomorSK" value="{{old('NomorSK')}}" id="NomorSK" placeholder="Nomor SK Kemenkumham">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="TanggalSK" class="col-sm-3 control-label">Tanggal SK</label>
                        <div class="col-sm-4"> 
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input type="text" class="form-control pull-right" value="{{old('TanggalSK')}}" name="TanggalSK" id="tgl_skkem">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                  <label for="ModalDasar" class="col-sm-3 control-label">Modal Dasar</label>

                    <div class="row">
                      <div class="col-xs-2 " style="padding-right: 5">
                        
                          <select style="width: 80px" class="form-control" name="CurModalDasar" id="CurModalDasar" value="{{old('CurModalDasar')}}">
                            <option value="IDR" @if (old("CurModalDasar") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurModalDasar") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurModalDasar") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurModalDasar") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurModalDasar") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurModalDasar") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-4" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="ModalDasar" value="{{old('ModalDasar')}}" id="ModalDasar" placeholder="Modal Dasar">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="ModalDisetor" class="col-sm-3 control-label">Modal Disetor</label>

                    <div class="row">
                      <div class="col-xs-2 " style="padding-right: 5">
                        
                          <select style="width: 80px" class="form-control" name="CurModalDisetor" id="CurModalDisetor" value="{{old('CurModalDisetor')}}">
                            <option value="IDR" @if (old("CurModalDisetor") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurModalDisetor") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurModalDisetor") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurModalDisetor") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurModalDisetor") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurModalDisetor") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-4" style="padding-left: 0" >
                      

                          <input  type="text" class="form-control" name="ModalDisetor" value="{{old('ModalDisetor')}}" id="ModalDisetor" placeholder="Modal Disetor">
                    </div>
                  </div>
                </div>
                        
                    <div class="form-group">
                      <label for="UploadSK" class="col-sm-3 control-label">Upload SK Kemenkumham</label>

                      <div class="col-sm-3">
                        <input type="file" name="FileSK">
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
          <!-- /Modal input Skkems -->


              <div class="tab-pane" id="siup">
                <!-- Form SIUP/NIB -->
          @role('admin')

          <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input-siup">
                <i class="fa fa-plus"></i>  Tambah SIUP / NIB
          </button>
          <br><br>
          @endrole
                <!--/.Form siup/nib -->


                  <!-- Modal input siup / nib -->
                  <div class="modal fade" id="modal-input-siup">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Input Data SIUP / NIB</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{url('siupstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                          {{ csrf_field() }}

                          <div class="box-body">

                          <div class="form-group">
                              <label for="JenisIzin" class="col-sm-3 control-label">Jenis Izin</label>

                              <div class="col-sm-2" style="margin-left: 15px;">
                                <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                <!-- radio -->
                                <div class="form-group">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="JenisIzin" id="JenisIzin" @if (old("JenisIzin") == "SIUP") checked="checked"  @endif value="SIUP" checked>
                                      SIUP
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="JenisIzin" id="JenisIzin" @if (old("JenisIzin") == "NIB") checked="checked" @endif value="NIB">
                                      NIB
                                    </label>
                                  </div>
                                  
                                </div>

                              </div>
                            </div>

                            <div class="form-group">
                              <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen</label>

                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen" value="{{old('NomorDokumen')}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan</label>

                              <div class="col-sm-4"> 
                                <div class="input-group date">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                  <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="tgl_siup1">
                                </div>

                              </div>
                            </div>

                            <div class="form-group">
                              <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                              <div class="col-sm-6" style="margin-left: 15px;">
                                <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                <!-- radio -->
                                <div class="form-group">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="MasaBerlakuStatus" id="MasaBerlakuStatus1" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivSiup()">
                                      Berlaku seterusnya
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="MasaBerlakuStatus" id="MasaBerlakuStatus2" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivSiup()">
                                      Berlaku sampai dengan  
                                    </label> 
                                    
                                  </div>
                                  <!--  -->
                                  <div class="col-sm-8" id="isi_tanggal_berlaku_siup" style="display: none"> 
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="tgl_siup2">
                                    </div>
                                  </div>
                                <!--  -->
                                </div>

                              </div>
                            </div>

                           
                  
                            <div class="form-group">
                              <label for="UploadSiup" class="col-sm-3 control-label">Upload SIUP/NIB</label>

                              <div class="col-sm-4">
                                <input type="file" name="FileSiup">
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
              <!-- /Modal input siup / nib -->

              <!-- Modal edit siup / nib -->
              <div class="modal fade" id="modal-edit-siup">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data SIUP / NIB</h4>
                        </div>
                        <div class="modal-body">
                          <form action="{{action('SiupController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data"> 
                          
                          {{ method_field('patch')}}
                          {{ csrf_field() }}

                          <div class="box-body">

                          <div class="form-group">
                              <input type="hidden" id="id_siup" name="id_siup">
                              <label for="JenisIzin" class="col-sm-3 control-label">Jenis Izin</label>

                              <div class="col-sm-2" style="margin-left: 15px;">
                                <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                <!-- radio -->
                                <div class="form-group">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="JenisIzin" id="JenisIzin1" @if (old("JenisIzin") == "SIUP") checked="checked"  @endif value="SIUP" checked>
                                      SIUP
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="JenisIzin" id="JenisIzin2" @if (old("JenisIzin") == "NIB") checked="checked" @endif value="NIB">
                                      NIB
                                    </label>
                                  </div>
                                  
                                </div>

                              </div>
                            </div>

                            <div class="form-group">
                              <label for="NomorDokumen" class="col-sm-3 control-label">Nomor Dokumen</label>

                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen" value="{{old('NomorDokumen')}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="TanggalPenerbitan" class="col-sm-3 control-label">Tanggal Penerbitan</label>

                              <div class="col-sm-4"> 
                                <div class="input-group date">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                  <input type="text" class="form-control pull-right" value="{{old('TanggalPenerbitan')}}" name="TanggalPenerbitan" id="edit_tgl_siup1">
                                </div>

                              </div>
                            </div>

                            <div class="form-group">
                              <label for="InstansiPenerbit" class="col-sm-3 control-label">Instansi Penerbit</label>

                              <div class="col-sm-6">
                                <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="MasaBerlaku" class="col-sm-3 control-label">Masa Berlaku</label>

                              <div class="col-sm-6" style="margin-left: 15px;">
                                <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                                <!-- radio -->
                                <div class="form-group">
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuStatus1" @if (old("MasaBerlakuStatus") == "0") checked="checked"  @endif value="0" checked onclick="ShowHideDivSiupEdit()">
                                      Berlaku seterusnya
                                    </label>
                                  </div>
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="MasaBerlakuStatus" id="EditMasaBerlakuStatus2" @if (old("MasaBerlakuStatus") == "1") checked="checked" @endif value="1" onclick="ShowHideDivSiupEdit()">
                                      Berlaku sampai dengan  
                                    </label> 
                                    
                                  </div>
                                  <!--  -->
                                  <div class="col-sm-8" id="edit_isi_tanggal_berlaku_siup" style="display: none"> 
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" value="{{old('MasaBerlaku')}}" name="MasaBerlaku" id="edit_tgl_siup2">
                                    </div>
                                  </div>
                                <!--  -->
                                </div>

                              </div>
                            </div>
                  
                            <div class="form-group">
                              <label for="UploadSiup" class="col-sm-3 control-label">Upload SIUP/NIB</label>

                              <div class="col-sm-4">
                                <input type="file" name="FileSiup">
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
              <!-- /Modal edit siup / nib -->


                <!-- table list siup/nib -->

                <!-- Content Here -->
              
                <?php $No = 1; ?>
              

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th style="width: 4%">No</th>
                      <th style="width: 5%">Jenis Izin</th>
                      <th style="width: 12%">Nomor Dokumen</th>
                      <th style="width: 12%">Tanggal Penerbitan</th>
                      <th style="width: 18%">Instansi Penerbit</th>
                      <th style="width: 10%">Masa Berlaku</th>
                      <th style="width: 12%">File</th>
                      @role('admin') <th style="width: 11%">Action</th> @endrole
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($vendor->siups as $a)
                      
                    <tr>
                    
                      <td>{{$No}}</td>
                      <?php $No++; ?>
                      <td>{{$a->jenis_izin}}</td>
                      <td>{{$a->no_dokumen}}</td>
                      <td align="center">{{ \Carbon\Carbon::parse($a->tgl_penerbitan)->format('j F Y') }}</td>
                      <td>{{$a->instansi_penerbit}}</td>
                      <td>
                        <?php
                          if ($a->masa_berlaku_status == 0)
                              echo "Berlaku seterusnya";
                          else
                              // echo "ada masa berlakunya";
                              echo  \Carbon\Carbon::parse($a->berlaku_sampai)->format('j F Y');
                        ?>

                      </td>
                      <td>
                        @if ($a->filename <>"")
                          <a href="{{url('documents/siupnib/'.$a->filename)}}" target="_blank" type="application/pdf"><button type="button" class="btn btn-block btn-primary btn-sm">lihat dokumen</button></a>
                        @else 
                          <button type="button" class="btn btn-block btn-danger btn-sm">tidak ada file</button>
                        @endif
                        </td>
                      
                        @role('admin')
                      <td>
                      <button data-toggle="modal" data-target="#modal-edit-siup" 
                              data-jenis_izin="{{$a->jenis_izin}}"
                              data-id_siup="{{$a->id}}"
                              data-no_dokumen="{{$a->no_dokumen}}"
                              data-tgl_penerbitan="{{$a->tgl_penerbitan}}"
                              data-instansi_penerbit="{{$a->instansi_penerbit}}"
                              data-masa_berlaku_status="{{$a->masa_berlaku_status}}"
                              data-berlaku_sampai="{{$a->berlaku_sampai}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>
                        <button type="submit" data-toggle="modal" onclick="deleteSiup({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                      </td>
                      @endrole
                    </tr>
                    @endforeach

                    </tbody>
                    
                  </table>


              <!-- Content Here -->

              <!-- ./table list SK Kemenkumham -->

            </div>


              <!-- /.tab-pane -->
              <div class="tab-pane active" id="akta">
                
                <!-- Form akta -->
          @role('admin')
              <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-input-akta">
                <i class="fa fa-plus"></i>  Tambah Akta
              </button>
          @endrole

          


            <!-- Modal input akta -->
            <div class="modal fade" id="modal-input-akta">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Input Data AKta</h4>
                    </div>
                    <div class="modal-body">

                      <form action="{{url('aktastore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                          <div class="form-group">
                            <label for="jenisakta" class="col-sm-3 control-label">Jenis Akta</label>

                            <div class="col-sm-3" style="margin-left: 15px;">
                              <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                              <!-- radio -->
                              <div class="form-group">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="JenisAkta" id="JenisAkta" @if (old("bidang") == "Pendirian") checked="checked"  @endif value="Pendirian" checked>
                                    Pendirian <?php echo Session::get('activetab');?>
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="JenisAkta" id="JenisAkta" @if (old("bidang") == "Perubahan") checked="checked" @endif value="Perubahan">
                                    Perubahan
                                  </label>
                                </div>
                                
                              </div>

                            </div>
                          </div>

                          <div class="form-group">
                            <label for="NamaNotaris" class="col-sm-3 control-label">Nama Notaris</label>

                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="NamaNotaris" id="NamaNotaris" placeholder="Nama Notaris" value="{{old('NamaNotaris')}}">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="NomorAkta" class="col-sm-3 control-label">Nomor Akta</label>

                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="NomorAkta" value="{{old('NomorAkta')}}" id="NomorAkta" placeholder="Nomor Akta">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="TanggalAkta" class="col-sm-3 control-label">Tanggal Akta</label>

                            <div class="col-sm-4"> 
                              <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" value="{{old('TanggalAkta')}}" name="TanggalAkta" id="tgl_akta">
                            </div>

                            </div>
                          </div>


                          <div class="form-group">
                            <label for="UploadAkta" class="col-sm-3 control-label">Upload Akta</label>

                            <div class="col-sm-2">
                              <input type="file" name="FileAkta">
                              <!-- <input type="text" class="form-control" name="FileAkta" value="{{old('UploadAkta')}}" id="UploadAkta" placeholder="Upload Akta"> -->
                              <input type="hidden" class="form-control" name="vendor_id" value="{{$vendor->id}}" id="vendor_id" >
                              <input type="hidden" class="form-control" name="vendor_name" value="{{$vendor->nama}}" id="vendor_name" >
                            </div>
                          </div>
                          
                        </div>
                        <!-- /.box-body -->
                      
                        <!-- /.box-footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>

                    </div>
                </div>
                  <!-- /.modal-content -->
              </div>
            </div>
                <!-- /.modal-dialog -->
          <!-- /Modal input akta -->

          <!-- Modal edit akta -->
          <div class="modal fade" id="modal-edit-akta">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Edit Data Akta</h4>
                    </div>
                    <div class="modal-body">

                      <form action="{{action('AktasController@update','test')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('patch')}}
                        {{ csrf_field() }}
                        <div class="box-body">

                          <div class="form-group">
                            <input type="hidden" id="id_akta" name="id_akta">
                            <label for="jenisakta" class="col-sm-3 control-label">Jenis Akta</label>

                            <div class="col-sm-3" style="margin-left: 15px;">
                              <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                              <!-- radio -->
                              <div class="form-group">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="JenisAkta" id="JenisAkta1" @if (old("bidang") == "Pendirian") checked="checked"  @endif value="Pendirian" checked>
                                    Pendirian <?php echo Session::get('activetab');?>
                                  </label>
                                </div>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="JenisAkta" id="JenisAkta2" @if (old("bidang") == "Perubahan") checked="checked" @endif value="Perubahan">
                                    Perubahan
                                  </label>
                                </div>
                                
                              </div>

                            </div>
                          </div>

                          <div class="form-group">
                            <label for="NamaNotaris" class="col-sm-3 control-label">Nama Notaris</label>

                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="NamaNotaris" id="NamaNotaris" placeholder="Nama Notaris" value="{{old('NamaNotaris')}}">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="NomorAkta" class="col-sm-3 control-label">Nomor Akta</label>

                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="NomorAkta" value="{{old('NomorAkta')}}" id="NomorAkta" placeholder="Nomor Akta">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="TanggalAkta" class="col-sm-3 control-label">Tanggal Akta</label>

                            <div class="col-sm-4"> 
                              <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" value="{{old('TanggalAkta')}}" name="TanggalAkta" id="tgl_akta_edit">
                            </div>

                            </div>
                          </div>


                          <div class="form-group">
                            <label for="UploadAkta" class="col-sm-3 control-label">Upload Akta</label>

                            <div class="col-sm-2">
                              <input type="file" name="FileAkta">
                              <!-- <input type="text" class="form-control" name="FileAkta" value="{{old('UploadAkta')}}" id="UploadAkta" placeholder="Upload Akta"> -->
                              <input type="hidden" class="form-control" name="vendor_id" value="{{$vendor->id}}" id="vendor_id" >
                              <input type="hidden" class="form-control" name="vendor_name" value="{{$vendor->nama}}" id="vendor_name" >
                            </div>
                          </div>
                          
                        </div>
                        <!-- /.box-body -->
                      
                        <!-- /.box-footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                      </form>

                    </div>
                </div>
                  <!-- /.modal-content -->
              </div>
            </div>
                <!-- /.modal-dialog -->
          <!-- /Modal edit akta -->

          
          <!-- table list akta -->

            <!-- Content Here -->
          
            <?php $No = 1; ?>
          
            </br></br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 4%">No</th>
                  <th style="width: 13%">Jenis Akta</th>
                  <th style="width: 30%">Nama Notaris</th>
                  <th style="width: 10%">Nomor Akta</th>
                  <th style="width: 10%">Tanggal Akta</th>
                  <th style="width: 15%">File</th>
                @role('admin') 
                  <th style="width: 11%">Action</th> 
                 @endrole
                </tr>
                </thead>
                <tbody>
                
                @foreach($vendor->aktas as $a)
                  
                <tr>
                 
                  <td>{{$No}}</td>
                  <?php $No++; ?>
                  <td>{{$a->jenis}}</td>
                  <td>{{$a->nama_notaris}}</td>
                  <td>{{$a->nomor}}</td>
                  <td>{{ \Carbon\Carbon::parse($a->tgl_akta)->format('j F Y') }}</td>
                  <td><!-- iframe src="{{url('documents/akta/'.$a->filename)}}" width="100%" height="600"></iframe> -->
                  @if ($a->filename <>"")
                    <a href="{{url('documents/akta/'.$a->filename)}}" target="_blank" type="application/pdf"><button type="button" class="btn btn-block btn-primary btn-sm">lihat dokumen</button></a>
                  @else 
                  <button type="button" class="btn btn-block btn-danger btn-sm">tidak ada file</button>
                  @endif
                  </td>
                  @role('admin')
                  <td>
                    
                  <button data-toggle="modal" data-target="#modal-edit-akta" 
                              data-id_akta="{{$a->id}}"
                              data-jenis="{{$a->jenis}}"
                              data-nama_notaris="{{$a->nama_notaris}}"
                              data-nomor="{{$a->nomor}}"
                              data-tgl_akta="{{$a->tgl_akta}}"
                              class="btn btn-info"><i class="fa fa-pencil"></i></button>

                    <button type="submit" data-toggle="modal" onclick="deleteAkta({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                  </td>
                  @endrole
                </tr>
                @endforeach

                </tbody>
                
              </table>


          <!-- Content Here -->

          <!-- ./table list akta -->

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->