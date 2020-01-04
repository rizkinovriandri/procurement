 <!-- Custom Tabs (Pulled to the right) -->
 <?php $tabName =  Session::get('activetab'); ?>
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#pengurus" data-toggle="tab">Data Pengadaan</a></li>
              <li class="pull-left header"><i class="fa fa-dollar">&nbsp;</i>Data Historikal Kontrak</li>
            </ul>
            <div class="tab-content">

            <!-- Tab pane -->
            <div class="tab-pane active" id="pengurus">
                <!-- Form API -->
                

                <!-- List table API -->

                      <!-- Content Here -->
                      
                      <?php $No = 1; ?>
                      
                      <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th style="width: 4%">No</th>
                            <th>Nomor Kontrak</th>
                            <th>Judul</th>
                            <th>Type</th>
                            <th>Metode Pengadaan</th>
                            <th>Tahun</th>
                            <th>Tgl Kontrak</th>
                            <th>Mata Uang</th>
                            <th>Nilai Kontrak</th>
                          </tr>
                          </thead>
                          <tbody>

                          
                          
                          @foreach($vendor->kontraks->sortByDesc('po_date') as $a)
                            
                          <tr>
                          
                            <td>{{$No}}</td>
                            <?php $No++; ?>
                            <td>{{$a->po_no}}</td>
                            <td>{{str_replace('?',' ',$a->judul)}}</td>
                            <td>{{$a->po_type}}</td>
                            <td>{{$a->metode}}</td>
                            <td>{{$a->tahun}}</td>
                            <td align="center">{{ \Carbon\Carbon::parse($a->po_date)->format('j F Y') }}</td>
                            <td>{{$a->currency}}</td>
                            <td align="right">{{number_format($a->nilai_kontrak,2)}}</td>
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