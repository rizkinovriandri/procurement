 <!-- Custom Tabs (Pulled to the right) -->
 <?php $tabName =  Session::get('activetab'); ?>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#pengalaman" data-toggle="tab">Pengalaman Pekerjaan</a></li>
              <li><a href="#fasilitas" data-toggle="tab">Fasilitas dan Peralatan</a></li>
              <li><a href="#sertifikasi" data-toggle="tab">Sertifikasi</a></li>
              <li><a href="#tenagaahli" data-toggle="tab">Tenaga Ahli</a></li>
              <li><a href="#keagenan" data-toggle="tab">Keagenan</a></li>
              <li class="active"><a href="#bidang" data-toggle="tab">Bidang</a></li>
              <li class="pull-left header"><i class="fa fa-cogs">&nbsp;</i>Data Teknis</li>
            </ul>
            <div class="tab-content">

            <!-- Tab pane -->
            <div class="tab-pane active" id="bidang">
                <!-- Form API -->
                <center><h4>Klasifikasi Vendor</h4></center>




                <!--/.Form API -->

                <!-- List table API -->

                      <!-- Content Here -->

                      <!-- form start -->

            <?php $bidang_vendor = $vendor->type; ?>

            @if ($bidang_vendor == "Barang")

            <form action="{{url('subbarangstore')}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body">

                
              <div class="form-group">
                <label for="ModalDasar" class="col-sm-2 control-label" style="align:right;">Bidang</label>

                <div class="col-sm-4">
                  <label for="Bidang" class="col-sm-0 control-label">:&nbsp&nbsp&nbsp{{$vendor->type}}</label>
                </div>
              </div>
              @role('admin')
                <div class="form-group">
                  <label for="SubBarang" class="col-sm-2 control-label">Sub bidang (Klasifikasi)</label>
                  <div class="col-sm-5">
                          <select class="form-control select2" name="SubBarang" style="width: 100%;">
                          
                         <?php 
                            $itembidangs = DB::select('select * from item_bidang WHERE bidang = "Barang"');
                          ?>
                            @foreach($itembidangs as $row)

                              <option>{{$row->sub_bidang}}</option>
                              
                            @endforeach
                          </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="NamaBarang" class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="NamaBarang" value="{{old('NamaBarang')}}" id="NamaBarang" placeholder="Nama Barang">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Merk" class="col-sm-2 control-label">Merk / Brand</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="Merk" value="{{old('Merk')}}" id="Merk" placeholder="Merk Barang">
                  </div>
                </div>

                <div class="form-group">
                  <label for="Sumber" class="col-sm-2 control-label">Sumber / Source</label>

                <div class="col-sm-2" style="margin-left: 15px;">
                    <!-- <input type="text" class="form-control" id="bidang" placeholder="Bidang"> -->
                    <!-- radio -->
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="sumber" id="sumber" @if (old("sumber") == "Lokal") checked="checked"  @endif value="Lokal" checked>
                          Lokal
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="sumber" id="sumber" @if (old("sumber") == "Import") checked="checked" @endif value="Import">
                          Import
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  
                  <div class="col-sm-2">
                   
                    <input type="hidden" class="form-control" name="vendor_id" value="{{$vendor->id}}" id="vendor_id" >
                    <input type="hidden" class="form-control" name="vendor_name" value="{{$vendor->nama}}" id="vendor_name" >
                  </div>
                </div>

                <center>
                <!-- <button type="reset" class="btn btn-default pull-center">Reset</button>
                &nbsp;&nbsp; -->
                <button type="submit" class="btn btn-primary pull-center">Submit</button>
               </center> 
               @endrole
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
              </div>
              <!-- /.box-footer -->
            </form>
                      
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th style="width: 20%">Sub Bidang</th>
                            <th style="width: 30%">Nama Barang</th>
                            <th style="width: 20%">Merk</th>
                            <th style="width: 10%">Sumber</th>
                            @role('admin')
                            <th style="width: 4%">Action</th>
                            @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->subbarangs as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            
                            <td>{{$a->sub_bidang}}</td>
                            <td>{{$a->nama_barang}}</td>
                            <td>{{$a->merk}}</td>
                            <td>{{$a->sumber}}</td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteSubBarang({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            @endrole
                          </tr>
                          <?php $No++; ?>
                          @endforeach

                          </tbody>
                          
                        </table>
                  @else

              <form action="{{url('subjasastore')}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body">

                
              <div class="form-group">
                <label for="ModalDasar" class="col-sm-2 control-label" style="align:right;">Bidang</label>

                <div class="col-sm-4">
                  <label for="Bidang" class="col-sm-0 control-label">:&nbsp&nbsp&nbsp{{$vendor->type}}</label>
                </div>
              </div>
              @role('admin')
                <div class="form-group">
                  <label for="SubJasa" class="col-sm-2 control-label">Sub bidang (Klasifikasi)</label>
                  <div class="col-sm-5">
                          <select class="form-control select2" name="SubJasa" style="width: 100%;">
                          
                         <?php 
                            $itembidangs = DB::select('select * from item_bidang WHERE bidang = "Jasa"');
                          ?>
                            @foreach($itembidangs as $row)

                              <option>{{$row->sub_bidang}}</option>
                              
                            @endforeach
                          </select>
                  </div>
                </div>
             
                <div class="form-group">
                  
                  <div class="col-sm-2">
                   
                    <input type="hidden" class="form-control" name="vendor_id" value="{{$vendor->id}}" id="vendor_id" >
                    <input type="hidden" class="form-control" name="vendor_name" value="{{$vendor->nama}}" id="vendor_name" >
                  </div>
                </div>

                <center>
                <!-- <button type="reset" class="btn btn-default pull-center">Reset</button>
                &nbsp;&nbsp; -->
                <button type="submit" class="btn btn-primary pull-center">Submit</button>
               </center> 
               @endrole
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
              </div>
              <!-- /.box-footer -->
            </form>
                    <div class="table_sub_jasa" style="width:800px">
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width:60px">No</th>
                            <th style="width:700px">Sub Bidang</th>
                            @role('admin') <th style="width:80px">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->subjasas as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            
                            <td>{{$a->sub_bidang}}</td>
                            
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteSubJasa({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              
                            </td>
                            @endrole
                          </tr>
                          <?php $No++; ?>
                          @endforeach

                          </tbody>
                          
                        </table>
                      </div>
                    <!-- Content Here -->

                <!--/. List table API  -->
                @endif
            </div>
              <!-- /.tab-pane -->

            <!-- Tab pane -->
            <div class="tab-pane" id="keagenan">
                <!-- Form API -->
                @role('admin')
              <form action="{{url('keagenanstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="NamaPrinciple" class="col-sm-2 control-label">Nama Principle</label>

                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="NamaPrinciple" id="NamaPrinciple" placeholder="Nama Principle" value="{{old('NamaPrinciple')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="JenisBarang" class="col-sm-2 control-label">Jenis Barang</label>

                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="JenisBarang" id="JenisBarang" placeholder="Jenis Barang" value="{{old('JenisBarang')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="KeagenanBerlakuMulai" class="col-sm-2 control-label">Berlaku Mulai</label>

                      <div class="col-sm-2"> 
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" value="{{old('KeagenanBerlakuMulai')}}" name="KeagenanBerlakuMulai" id="tgl_awal_keagenan">
                              
                           </div>

                      </div>
                    </div>

                    <div class="form-group">
                    <label for="KeagenanBerlakuSampai" class="col-sm-2 control-label">Berlaku Sampai</label>

                    <div class="col-sm-2"> 
                      <div class="input-group date">
                      <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                      <input type="text" class="form-control pull-right" value="{{old('KeagenanBerlakuSampai')}}" name="KeagenanBerlakuSampai" id="tgl_akhir_keagenan">
                    </div>

                    </div>
                    
                  </div>
          
                    <div class="form-group">
                      <label for="UploadKeagenan" class="col-sm-2 control-label">Upload Dokumen</label>

                      <div class="col-sm-2">
                        <input type="file" name="FileKeagenan">
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
                            <th style="width: 20%">Nama Principle</th>
                            <th style="width: 20%">Jenis Barang</th>
                            <th style="width: 20%">Berlaku Mulai</th>
                            <th style="width: 20%">Berlaku Sampai</th>
                            <th>File</th>
                            @role('admin') <th>Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->keagenans as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->nama_principle}}</td>
                            <td>{{$a->jenis_barang}}</td>
                            <td>{{ \Carbon\Carbon::parse($a->tgl_berlaku_mulai)->format('j F Y') }}</td>
                            
                            @if ($a->tgl_berlaku_sampai==null) 
                              <td>-</td>
                             @else 
                              <td>{{ \Carbon\Carbon::parse($a->tgl_berlaku_sampai)->format('j F Y') }}</td>
                            @endif

                            <td><!-- iframe src="{{url('documents/akta/'.$a->filename)}}" width="100%" height="600"></iframe> -->
                              <a href="{{url('documents/keagenan/'.$a->filename)}}" target="_blank" type="application/pdf">lihat dokumen</a>
                            </td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteKeagenan({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane" id="pengalaman">
                <!-- Form API -->
                <center><h4>Pengalaman Pekerjaan</h4></center>
              @role('admin')
              <form action="{{url('pengalamanstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="NamaPelanggan" class="col-sm-2 control-label">Nama Pelanggan</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NamaPelanggan" id="NamaPelanggan" placeholder="Nama Pelanggan" value="{{old('NamaPelanggan')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="NamaPekerjaan" class="col-sm-2 control-label">Nama Pekerjaan</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NamaPekerjaan" id="NamaPekerjaan" placeholder="Nama Pekerjaan" value="{{old('NamaPekerjaan')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="KeteranganSingkat" class="col-sm-2 control-label">Keterangan Singkat Pekerjaan</label>

                      <div class="col-sm-5">
                        <textarea class="form-control" name="KeteranganSingkat" id="KeteranganSingkat"  value="{{old('KeteranganSingkat')}}">
                        </textarea>
                      </div>
                      
                    </div>

                  <div class="form-group">
                  <label for="NilaiProyek" class="col-sm-2 control-label">Nilai Proyek</label>

                    <div class="row">
                      <div class="col-xs-1 " style="padding-right: 0">
                        
                          <select style="width: 72px" class="form-control" name="CurNilaiProyek" id="CurNilaiProyek" value="{{old('CurNilaiProyek')}}">
                            <option value="IDR" @if (old("CurNilaiProyek") == "IDR") selected="selected" @endif>IDR</option>
                            <option value="USD" @if (old("CurNilaiProyek") == "USD") selected="selected" @endif>USD</option>
                            <option value="JPY" @if (old("CurNilaiProyek") == "JPY") selected="selected" @endif>JPY</option>
                            <option value="SGD" @if (old("CurNilaiProyek") == "SGD") selected="selected" @endif>SGD</option>
                            <option value="EUR" @if (old("CurNilaiProyek") == "EUR") selected="selected" @endif>EUR</option>
                            <option value="CHF" @if (old("CurNilaiProyek") == "CHF") selected="selected" @endif>CHF</option>
                          </select>
                      </div>
                      <div class="col-xs-2" style="padding-left: 0" >

                          <input  type="text" class="form-control" name="NilaiProyek" value="{{old('NilaiProyek')}}" id="NilaiProyek" placeholder="Nilai Proyek">
                    </div>
                  </div>
                </div>

                   <div class="form-group">
                      <label for="NomorKontrak" class="col-sm-2 control-label">Nomor Kontrak</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" name="NomorKontrak" id="NomorKontrak" placeholder="Nomor Kontrak" value="{{old('NomorKontrak')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TanggalMulai" class="col-sm-2 control-label">Tanggal Mulai</label>

                      <div class="col-sm-2"> 
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" value="{{old('TanggalMulai')}}" name="TanggalMulai" id="tgl_mulai_proyek">
                              
                           </div>

                      </div>
                    </div>

                    <div class="form-group">
                    <label for="TanggalSelesai" class="col-sm-2 control-label">Tanggal Selesai</label>

                    <div class="col-sm-2"> 
                      <div class="input-group date">
                      <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                      <input type="text" class="form-control pull-right" value="{{old('TanggalSelesai')}}" name="TanggalSelesai" id="tgl_selesai_proyek">
                    </div>

                    </div>
                    
                  </div>

                  <div class="form-group">
                      <label for="ContactPerson" class="col-sm-2 control-label">Contact Person</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="ContactPerson" id="ContactPerson" placeholder="Contact Person" value="{{old('ContactPerson')}}"> <i>*Karyawan Pelanggan yang bisa dihubungi</i>
                      </div>
                    </div>

                  <div class="form-group">
                      <label for="NoContact" class="col-sm-2 control-label">Nomor Contact Person</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NoContact" id="NoContact" placeholder="Nomor Contact Person" value="{{old('NoContact')}}">
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

                  <!-- <div class="col-md-9" style="overflow-x: auto"> -->
                 
                  <div class="container-fluid" style="overflow-x:auto;">

                  <table style="width:100px;" id="dtHorizontalExample" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Pekerjaan</th>
                            <th style="width: 25%">Keterangan Singkat</th>
                            <th>Nilai Proyek</th>
                            <th>Nomor Kontrak</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Nama Contact Person</th>
                            <th>No. Contact Person</th>
                            @role('admin') <th>Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->pengalamans as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td style="white-space: nowrap;">{{$a->nama_pelanggan}}</td>
                            <td style="white-space: nowrap;">{{$a->nama_pekerjaan}}</td>
                            <td style="white-space: nowrap;">{{$a->keterangan}}</td>
                            <td style="white-space: nowrap;" align="right">{{$a->cur_nilai_proyek}}&nbsp {{number_format($a->nilai_proyek,2)}}</td>
                            <td style="white-space: nowrap;">{{$a->nomor_kontrak}}</td>
                            <td style="white-space: nowrap;">{{$a->tgl_mulai_proyek}}</td>
                            <td style="white-space: nowrap;">{{$a->tgl_selesai_proyek}}</td>
                            <td style="white-space: nowrap;">{{$a->contact_person}}</td>
                            <td style="white-space: nowrap;">{{$a->no_contact_person}}</td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deletePengalaman({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                            @endrole
                          </tr>
                          @endforeach

                          </tbody>
                          
                        </table>
                      
                      </div>
                    <!-- </div> -->

                    <!-- Content Here -->

                <!--/. List table API  -->
            
            </div>
              <!-- /.tab-pane -->

            <!-- Tab pane -->
            <div class="tab-pane" id="fasilitas">
                <!-- Form API -->
                <center><h4>Fasilitas dan Peralatan</h4></center>
                @role('admin')
              <form action="{{url('fasilitasstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="NamaPeralatan" class="col-sm-2 control-label">Nama Peralatan</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NamaPeralatan" id="NamaPeralatan" placeholder="Nama Peralatan" value="{{old('NamaPeralatan')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="Spesifikasi" class="col-sm-2 control-label">Spesifikasi</label>

                      <div class="col-sm-5">
                        <textarea class="form-control" name="Spesifikasi" id="Spesifikasi"  value="{{old('NamaSertifikat')}}">
                        </textarea>
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="Jumlah" class="col-sm-2 control-label">Jumlah / Kuantitas</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="Jumlah" id="Jumlah" placeholder="" value="{{old('Jumlah')}}"> 
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TahunPembuatan" class="col-sm-2 control-label">Tahun Pembuatan</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="TahunPembuatan" id="TahunPembuatan" placeholder="" value="{{old('TahunPembuatan')}}"> 
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
                            <th style="width: 20%">Nama Fasilitas/Peralatan</th>
                            <th style="width: 25%">Spesifikasi</th>
                            <th style="width: 7%">Jumlah</th>
                            <th style="width: 10%">Tahun Pembuatan</th>
                            @role('admin') <th style="width: 10%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->fasilitas as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->nama_peralatan}}</td>
                            <td>{{$a->spesifikasi}}</td>
                            <td>{{$a->jumlah}}</td>
                            <td>{{$a->tahun_pembuatan}}</td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteFasilitas({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane" id="sertifikasi">
                <!-- Form API -->
                @role('admin')
              <form action="{{url('sertifikatstore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="JenisSertifikat" class="col-sm-2 control-label">Jenis Sertifikat</label>

                      <div class="col-sm-3">
                      <select style="width: 200px" class="form-control" name="JenisSertifikat" id="JenisSertifikat" value="{{old('JenisSertifikat')}}">
                            <option value="Mutu" @if (old("JenisSertifikat") == "Mutu") selected="selected" @endif>Mutu</option>
                            <option value="Lingkungan Hidup" @if (old("JenisSertifikat") == "Lingkungan Hidup") selected="selected" @endif>Lingkungan Hidup</option>
                            <option value="Patent dan Lisensi" @if (old("JenisSertifikat") == "Patent dan Lisensi") selected="selected" @endif>Patent dan Lisensi</option>
                            <option value="Asosiasi Profesi" @if (old("JenisSertifikat") == "Asosiasi Profesi") selected="selected" @endif>Asosiasi Profesi</option>
                            <option value="Lainnya" @if (old("JenisSertifikat") == "Lainnya") selected="selected" @endif>Lainnya</option>
                            
                          </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="NomorSertifikat" class="col-sm-2 control-label">Nomor Sertifikat</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NomorSertifikat" id="NomorSertifikat" placeholder="Nomor Sertifikat" value="{{old('NomorSertifikat')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="NamaSertifikat" class="col-sm-2 control-label">Nama Sertifikat</label>

                      <div class="col-sm-5">
                        <input type="text" class="form-control" name="NamaSertifikat" id="NamaSertifikat" placeholder="Nama Sertifikat" value="{{old('NamaSertifikat')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="InstansiPenerbit" class="col-sm-2 control-label">Instansi Penerbit</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="InstansiPenerbit" id="InstansiPenerbit" placeholder="Instansi Penerbit" value="{{old('InstansiPenerbit')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="BerlakuMulai" class="col-sm-2 control-label">Berlaku Mulai</label>

                      <div class="col-sm-2"> 
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" value="{{old('BerlakuMulai')}}" name="BerlakuMulai" id="tgl_awal_sertifikat">
                              
                           </div>

                      </div>
                    </div>

                    <div class="form-group">
                    <label for="BerlakuSampai" class="col-sm-2 control-label">Berlaku Sampai</label>

                    <div class="col-sm-2"> 
                      <div class="input-group date">
                      <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                      <input type="text" class="form-control pull-right" value="{{old('BerlakuSampai')}}" name="BerlakuSampai" id="tgl_akhir_sertifikat">
                    </div>

                    </div>
                    
                  </div>
                                                
                <div class="form-group">
                  <label for="UploadSertifikat" class="col-sm-2 control-label">Upload Dokumen</label>

                  <div class="col-sm-2">
                    <input type="file" name="FileSertifikat">
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
                            <th style="width: 10%">Type</th>
                            <th style="width: 10%">No Sertifikat</th>
                            <th style="width: 20%">Nama Sertifikat</th>
                            <th style="width: 10%">Instansi Penerbit</th>
                            <th style="width: 10%">Tanggal Terbit</th>
                            <th style="width: 10%">Tanggal Kadaluarsa</th>
                            <th style="width: 10%">File</th>
                            @role('admin') <th style="width: 10%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->sertifikats as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->type}}</td>
                            <td>{{$a->nomor}}</td>
                            <td>{{$a->nama}}</td>
                            <td>{{$a->instansi_penerbit}}</td>
                            <td>{{ \Carbon\Carbon::parse($a->tgl_terbit)->format('j F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->tgl_kadaluarsa)->format('j F Y') }}</td>

                            <td><!-- iframe src="{{url('documents/akta/'.$a->filename)}}" width="100%" height="600"></iframe> -->
                              <a href="{{url('documents/sertifikat/'.$a->filename)}}" target="_blank" type="application/pdf">lihat dokumen</a>
                            </td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteSertifikat({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
            <div class="tab-pane" id="tenagaahli">
                <!-- Form API -->
                @role('admin')
              <form action="{{url('tenagaahlistore')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="NamaPersonil" class="col-sm-2 control-label">Nama Personil</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="NamaPersonil" id="NamaPersonil" placeholder="Nama Tenaga Ahli" value="{{old('NamaPersonil')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="PendidikanTerakhir" class="col-sm-2 control-label">Pendidikan Terakhir</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="PendidikanTerakhir" id="PendidikanTerakhir" placeholder="" value="{{old('PendidikanTerakhir')}}">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label for="Keahlian" class="col-sm-2 control-label">Keahlian Utama</label>

                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="Keahlian" id="Keahlian" placeholder="Keahlian Utama" value="{{old('Keahlian')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Pengalaman" class="col-sm-2 control-label">Pengalaman (tahun)</label>

                      <div class="col-sm-1">
                        <input type="text" class="form-control" name="Pengalaman" id="Pengalaman" placeholder="" value="{{old('Pengalaman')}}"> 
                      </div>
                    </div>

                  <div class="form-group">
                  <label for="Status" class="col-sm-2 control-label">Status</label>

                    <div class="row">
                      <div class="col-xs-6 " style="padding-right: 0">
                        
                          <select style="width: 120px" class="form-control" name="Status" id="Status" value="{{old('Status')}}">
                            <option value="Permanen" @if (old("Status") == "Permanen") selected="selected" @endif>Permanen</option>
                            <option value="Kontrak" @if (old("Status") == "Kontrak") selected="selected" @endif>Kontrak</option>
                          </select>
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

                <!-- List table API -->

                      <!-- Content Here -->
                      
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th style="width: 20%">Nama Personil</th>
                            <th style="width: 5%">Pendidikan Terakhir</th>
                            <th style="width: 20%">Keahlian Utama</th>
                            <th style="width: 15%">Pengalaman</th>
                            <th style="width: 15%">Status</th>
                            @role('admin') <th style="width: 10%">Action</th> @endrole
                          </tr>
                          </thead>
                          <tbody>
                          
                          @foreach($vendor->tenagaahlis as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->nama}}</td>
                            <td>{{$a->pendidikan}}</td>
                            <td>{{$a->keahlian}}</td>
                            <td>{{$a->pengalaman}} &nbsp tahun</td>
                            <td>{{$a->status}}</td>
                            @role('admin')
                            <td>
                              <button type="submit" data-toggle="modal" onclick="deleteTenagaAhli({{$a->id}})" data-target="#DeleteModal" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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