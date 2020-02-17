@extends('layouts.app_spare')

@section('content')

<style>
        .anyClass {
          overflow-x: scroll;
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
          
          <?php $No = 1; ?>
          

            <table id="example1"  class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th >No</th>
                  <th >No PR</th>
                  <th >PR Line</th>
                  <th >Shopping Cart</th>
                  <th >PR Received Date</th>
                  <th ></th>PGr</th>
                  <th >No RFx</th>
                  <th >No Material</th>
                  <th >Nama Material</th>
                  <th >Qty</th>
                  <th >UoM</th>
                  <th >Unit Price</th>
                  <th >Total Budget</th>
                  <th >PR Currency</th>
                  <th >No PO</th>
                  <th >PO Line</th>
                  <th >Negosiasi Mulai</th>
                  <th >Negosiasi Sampai</th>
                  <th >Klarifikasi Mulai</th>
                  <th >Klarifikasi Sampai</th>
                  @role('admin')
                    <th>Action</th>
                  @endrole  
                </tr>
                </thead>
                <tbody>
                
              

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
