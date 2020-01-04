 <!-- Custom Tabs (Pulled to the right) -->
 <?php $tabName =  Session::get('activetab'); ?>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#perpajakan" data-toggle="tab">Dokumen Perpajakan</a></li>
              <li><a href="#lapkeu" data-toggle="tab">Laporan Keuangan</a></li>
              <li><a href="#modal" data-toggle="tab">Modal</a></li>
              <li class="active"><a href="#rekening" data-toggle="tab">Rekening Bank</a></li>
              
              <li class="pull-left header"><i class="fa fa-area-chart">&nbsp;</i>Data Keuangan</li>
            </ul>
            <div class="tab-content">

            <!-- Tab pane -->
            <div class="tab-pane" id="perpajakan">
                <!-- Form API -->
                <center><h4>Dokumen Perpajakan</h4></center>
               @role('admin')
              <form action="{{url('perpajakanstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                  <div class="form-group">
                  <label for="JenisDokumen" class="col-sm-2 control-label">Jenis Dokumen</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 400px" class="form-control" name="JenisDokumen" id="JenisDokumen" value="{{old('JenisDokumen')}}">
                            <option value="NPWP" @if (old("JenisDokumen") == "NPWP") selected="selected" @endif>NPWP (Nomor Pokok Wajib Pajak)</option>
                            <option value="SPT" @if (old("JenisDokumen") == "SPT") selected="selected" @endif>SPT (Surat Pemberitahuan Tahunan)</option>
                            <option value="SKT" @if (old("JenisDokumen") == "SKT") selected="selected" @endif>SKT (Surat Keterangan Terdaftar)</option>
                            <option value="SPPKP" @if (old("JenisDokumen") == "SPPKP") selected="selected" @endif>SPPKP (Surat Pengukuhan Pengusaha Kena Pajak)</option>
                            
                          </select>
                      </div>
                      
                  </div>
                </div>

                    <div class="form-group">
                      <label for="NomorDokumen" class="col-sm-2 control-label">Nomor Dokumen</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NomorDokumen" id="NomorDokumen" placeholder="Nomor Dokumen Perpajakan" value="{{old('NomorDokumen')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="TahunPenerbitan" class="col-sm-2 control-label">Tahun Penerbitan</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="TahunPenerbitan" id="TahunPenerbitan" placeholder="Tahun" value="{{old('TahunPenerbitan')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                  <label for="FilePerpajakan" class="col-sm-2 control-label">Upload Dokumen</label>

                  <div class="col-sm-2">
                    <input type="file" name="FilePerpajakan">
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
                            <th style="width: 20%">Jenis Dokumen</th>
                            <th style="width: 15%">Nomor Dokumen</th>
                            <th style="width: 5%">Tahun Penerbitan</th>
                            <th style="width: 10%">File</th>
                            @role('admin') <th style="width: 5%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->perpajakans as $a)
                            
                          <tr>
                         
                            <td>{{$No}}</td>
                            <?php $No++; 
                              if($a->jenis_dokumen=="NPWP"){
                                $jenis_desc = "Nomor Pokok Wajib Pajak (NPWP)";
                              } else if ($a->jenis_dokumen=="SPT"){
                                $jenis_desc = "Surat Pemberitahuan Tahunan (SPT)";
                              } else if ($a->jenis_dokumen=="SKT"){
                                $jenis_desc = "Surat Keterangan Terdaftar (SKT)";
                              } else if ($a->jenis_dokumen=="SPPKP"){
                                $jenis_desc = "Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)";
                              }
                            ?>
                            <td>{{$jenis_desc}}</td>
                            <td align="center">{{$a->nomor_dokumen}}</td>
                            <td>{{$a->tahun}}</td>
                            <td>
                            <a href="{{url('documents/perpajakan/'.$a->filename)}}" target="_blank" type="application/pdf">lihat dokumen</a>
                            </td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deletePerpajakan({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane" id="lapkeu">
                <!-- Form API -->
                <center><h4>Laporan Keuangan / Neraca</h4></center>
              @role('admin')                     
              <form action="{{url('lapkeustore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                  <div class="form-group">
                  <label for="NilaiAsset" class="col-sm-2 control-label">Nilai Asset</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 72px" class="form-control" name="CurNilaiAsset" id="CurNilaiAsset" value="{{old('CurNilaiAsset')}}">
                            <option value="IDR" @if (old("CurNilaiAsset") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurNilaiAsset") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurNilaiAsset") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurNilaiAsset") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurNilaiAsset") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurNilaiAsset") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-2" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="NilaiAsset" value="{{old('NilaiAsset')}}" id="NilaiAsset" placeholder="Nilai Asset">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="NilaiPenjualan" class="col-sm-2 control-label">Nilai Penjualan</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 72px" class="form-control" name="CurNilaiPenjualan" id="CurNilaiPenjualan" value="{{old('CurNilaiPenjualan')}}">
                            <option value="IDR" @if (old("CurNilaiPenjualan") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurNilaiPenjualan") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurNilaiPenjualan") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurNilaiPenjualan") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurNilaiPenjualan") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurNilaiPenjualan") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-2" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="NilaiPenjualan" value="{{old('NilaiPenjualan')}}" id="NilaiPenjualan" placeholder="Nilai Penjualan">
                    </div>
                  </div>
                </div>

                    <div class="form-group">
                      <label for="TahunLaporan" class="col-sm-2 control-label">Tahun Laporan</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="TahunLaporan" id="TahunLaporan" placeholder="Tahun" value="{{old('TahunLaporan')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                  <label for="FileLapkeu" class="col-sm-2 control-label">Upload Dokumen</label>

                  <div class="col-sm-2">
                    <input type="file" name="FileLapkeu">
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
                            <th style="width: 10%">Tahun Laporan</th>
                            <th style="width: 20%">Nilai Asset</th>
                            <th style="width: 20%">Nilai Penjualan</th>
                            <th style="width: 10%">File</th>
                            @role('admin') <th style="width: 10%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->lapkeus as $a)
                            
                          <tr>
                         
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td align="center">{{$a->tahun}}</td>
                            <td align="right">{{$a->cur_nilai_asset}}&nbsp {{number_format($a->nilai_asset,2)}}</td>
                            <td align="right">{{$a->cur_nilai_penjualan}}&nbsp {{number_format($a->nilai_penjualan,2)}}</td>
                            <td>
                            <a href="{{url('documents/lapkeu/'.$a->filename)}}" target="_blank" type="application/pdf">lihat dokumen</a>
                            </td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteLapkeu({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane active" id="rekening">
                <!-- Form API -->
              @role('admin')
              <form action="{{url('rekeningstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="NoRek" class="col-sm-2 control-label">Nomor Rekening</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NoRek" id="NoRek" placeholder="Nomor Rekening" value="{{old('NoRek')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="PemegangRekening" class="col-sm-2 control-label">Pemegang Rekening</label>

                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="PemegangRekening" id="PemegangRekening" placeholder="Atas Nama" value="{{old('PemegangRekening')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="NamaBank" class="col-sm-2 control-label">Nama Bank</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NamaBank" id="NamaBank" placeholder="Nama Bank" value="{{old('NamaBank')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Cabang" class="col-sm-2 control-label">Cabang</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="Cabang" id="Cabang" placeholder="Nama Cabang" value="{{old('Cabang')}}">
                      </div>
                    </div>

                  <div class="form-group">
                  <label for="MataUang" class="col-sm-2 control-label">Mata Uang</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 72px" class="form-control" name="MataUang" id="MataUang" value="{{old('MataUang')}}">
                            <option value="IDR" @if (old("MataUang") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("MataUang") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("MataUang") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("MataUang") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("MataUang") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("MataUang") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                  </div>
                </div>                                        
          
                <div class="form-group">
                  <label for="FileRefBank" class="col-sm-2 control-label">Upload Surat Referensi Bank</label>

                  <div class="col-sm-2">
                    <input type="file" name="FileRefBank">
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
                            <th style="width: 15%">Nomor Rekening</th>
                            <th style="width: 20%">Atas Nama</th>
                            <th style="width: 15%">Nama Bank</th>
                            <th style="width: 15%">Cabang</th>
                            <th style="width: 8%">Mata Uang</th>
                            <th style="width: 10%">File</th>
                            @role('admin') <th>Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->rekenings as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->no_rekening}}</td>
                            <td>{{$a->pemegang_rekening}}</td>
                            <td>{{$a->nama_bank}}</td>
                            <td>{{$a->cabang}}</td>
                            <td>{{$a->mata_uang}}</td>
                            <td>
                            <a href="{{url('documents/rekening/'.$a->filename)}}" target="_blank" type="application/pdf">lihat dokumen</a>
                            </td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteRekening({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane" id="modal">
                <!-- Form API -->
              

              <?php $result = DB::table('modals')->where('vendor_id', '=', $vendor->id)->exists(); ?>

              @if ($result)
              <center><h4>Modal Sesuai Akta Terakhir</h4></center>
              <center>
              <form action="{{url('modalstore')}}" class="form-horizontal" method="POST" role="form">
                <div class="form-group">
                <label for="ModalDasar" class="col-sm-2 control-label" style="align:right;">Modal Dasar</label>

                  <div class="row">
                    <div class="col-xs-1 " style="padding-right: 0">
                      <label for="CurModalDasarTampil" class="col-sm-2 control-label">{{$vendor->modals->cur_modal_dasar}}</label>
                    </div>
                    <div class="col-xs-2" style="padding-left: 0" >
                      <label for="ModalDasarTampil" class="col-sm-2 control-label">{{number_format($vendor->modals->modal_dasar,2)}}</label>
                  </div>
                </div>

                <label for="ModalDisetor" class="col-sm-2 control-label">Modal Disetor</label>

                  <div class="row">
                    <div class="col-xs-1 " style="padding-right: 0">
                      <label for="CurModalDisetorTampil" class="col-sm-2 control-label">{{$vendor->modals->cur_modal_disetor}}</label>
                    </div>
                    <div class="col-xs-2" style="padding-left: 0" >
                      <label for="ModalDisetorTampil" class="col-sm-2 control-label">{{number_format($vendor->modals->modal_disetor,2)}}</label>
                  </div>
                </div>

                 
                  </div>

                </form>    
                @role('admin')
                    <button type="submit" data-toggle="modal" onclick="deleteModal1({{$vendor->modals->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i> Clear Data</button>
                  @endrole

                </center>    
                @else
                
                @role('member')
                <span class="label label-danger">Data Modal belum di input</span>
                @endrole

                @role('admin')
                <form action="{{url('modalstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                  <div class="form-group">
                  <label for="ModalDasar" class="col-sm-2 control-label">Modal Dasar</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 72px" class="form-control" name="CurModalDasar" id="CurModalDasar" value="{{old('CurModalDasar')}}">
                            <option value="IDR" @if (old("CurModalDasar") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurModalDasar") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurModalDasar") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurModalDasar") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurModalDasar") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurModalDasar") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-2" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="ModalDasar" value="{{old('ModalDasar')}}" id="ModalDasar" placeholder="Modal Dasar">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="ModalDisetor" class="col-sm-2 control-label">Modal Disetor</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 72px" class="form-control" name="CurModalDisetor" id="CurModalDisetor" value="{{old('CurModalDisetor')}}">
                            <option value="IDR" @if (old("CurModalDisetor") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurModalDisetor") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurModalDisetor") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurModalDisetor") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurModalDisetor") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurModalDisetor") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-2" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="ModalDisetor" value="{{old('ModalDisetor')}}" id="ModalDisetor" placeholder="Modal Disetor">
                    </div>
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
                
                
                @endif
                               
            
            </div>
              <!-- /.tab-pane -->

          
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->