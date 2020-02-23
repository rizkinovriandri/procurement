@extends('layouts.app_spare')

@section('content')

<style>
        .anyClass {
         
        }
        
  </style>

<!-- Content Wrapper. Contains page content -->
    
    <section class="content-header">
      <h1>
        Data Pengadaan
        <small>Daftar Item RFx</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Pengadaan</a></li>
        <li class="active">Daftar item</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">List Rfx</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
           
          </div>
        </div>
        <div class="box-body anyClass">
          
          <!-- Content Here -->
          <br>
          <button  type="button" style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modal-upload-pengadaan">
            <i class="fa fa-plus"></i>  Upload Data
          </button>

          <!-- Modal input pengadaan -->
          <div class="modal fade" id="modal-upload-pengadaan">
            <div class="modal-dialog">
            <div class="modal-content" style="top: 100px">
              <form method="post" action="pengadaan/import" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Spreadsheet Pengadaan</h5>
              </div>
              <div class="modal-body">
           
                {{ csrf_field() }}
           
                <label>Pilih file spreadsheet (.xls atau .xlsx)</label>
                <div class="form-group">
                  <input type="file" name="filePengadaan" required="required">
                </div>
           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
              </div>
            </form>
            </div>
            </div>
          </div>
        

          <br><br><br>
          <?php $No = 1; ?>
          

            <table id="tbl_pengadaan"  class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th >No</th>
                  <th >No PR</th>
                  <th >PR Line</th>
                  <th >Shopping Cart</th>
                  <th >PR Received Date</th>
                  <th >PGr</th>
                  <th >No Material</th>
                  <th style="width: 400px">Nama Material</th>
                  <th >Qty</th>
                  <th >UoM</th>
                  <th >Unit Price</th>
                  <th >Total Budget</th>
                  <th >PR Currency</th>
                  <th >No RFx</th>
                  <th style="width: 250px">Judul RFx</th>
                  <th >Tgl RFx</th>
                  <th >Submission Deadline</th>
                  <th >Tgl Opening Tender</th>
                  <th >TE Mulai</th>
                  <th >TE Sampai</th>
                  <th >Negosiasi Mulai</th>
                  <th >Negosiasi Sampai</th>
                  <th >Klarifikasi Mulai</th>
                  <th >Klarifikasi Sampai</th>
                  <th >No PO</th>
                  <th >PO Line</th>
                  <th >Created at</th>
                  <th >Updated at</th>
                  @role('admin')
                    <th>Action</th>
                  @endrole  
                </tr>
                </thead>
                <tbody>

                  @foreach($pengadaans as $row)  
                    <tr>
                      <!-- <td>{{$row->id}}</td>  -->
                      <td>{{$No}}</td>
                      <td>{{$row->pr_no}}</a></td>
                      <td>{{$row->pr_line}}</td>
                      <td>{{$row->shopping_cart}}</td>
                      <td>{{ \Carbon\Carbon::parse($row->transfer_date)->format('d-M-Y') }}</td>
                      <td>{{$row->pgr}}</td>
                      <td>{{$row->no_material}}</td>
                      <td>{{$row->nama_material}}</td>
                      <td align="right">{{$row->quantity}}</td>
                      <td>{{$row->uom}}</td>
                      <td align="right">{{number_format($row->unit_price,2)}}</td>
                      <td align="right">{{number_format($row->total_budget,2)}}</td>
                      <td>{{$row->pr_cur}}</td>
                      <td>{{$row->rfx}}</td>
                      <td>{{$row->rfx_title}}</td>
                      <td style="white-space: nowrap">{{ $row->rfx_date ? \Carbon\Carbon::parse($row->rfx_date)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->sub_deadline ? \Carbon\Carbon::parse($row->sub_deadline)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->tgl_opening ? \Carbon\Carbon::parse($row->tgl_opening)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->te_start ? \Carbon\Carbon::parse($row->te_start)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->te_to ? \Carbon\Carbon::parse($row->te_to)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->nego_start ? \Carbon\Carbon::parse($row->nego_start)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->nego_to ? \Carbon\Carbon::parse($row->nego_to)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->clarification_start ? \Carbon\Carbon::parse($row->clarification_start)->format('d-M-Y') : "" }}</td>
                      <td style="white-space: nowrap">{{ $row->clarification_to ? \Carbon\Carbon::parse($row->clarification_to)->format('d-M-Y') : "" }}</td>
                      <td>{{$row->po_no}}</td>
                      <td>{{$row->po_line}}</td>
                      <td style="white-space: nowrap">{{$row->created_at}}</td>
                      <td style="white-space: nowrap">{{$row->updated_at}}</td>
                      <td>
                        hapus
                      </td>
                    </tr>
                    <?php $No++; ?>
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
     function deleteVendor(id)
     {
         var id = id;
         var url = '{{ route("vendors.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
  </script>

@endsection
