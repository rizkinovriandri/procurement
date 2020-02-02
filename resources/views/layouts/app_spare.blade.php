<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/skins/skin-green.min.css')}}">

  <link rel="icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/png">
<!-- Tell the browser to be responsive to screen width -->
   <!-- Bootstrap 3.3.7 -->
   <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/skins/skin-green.min.css')}}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{url('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="{{url('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
   <!-- Select2 -->
   <link rel="stylesheet" href="{{url('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/skins/skin-green.min.css')}}">
  
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
 

 


  <style>
        .container-fluid {
          overflow-x: scroll;
        }

        #hidden_div {
            display: none;
        }
        
  </style>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">


<!-- ------------------------- TEMPLATE HEADER ------------------------------- -->
  @include('layouts.header')
  

<!-- ------------------------- TEMPLATE HEADER ------------------------------- -->

<!-- ------------------------- TEMPLATE SIDEBAR ------------------------------- -->

  @include('layouts.sidebar')

<!-- ------------------------- TEMPLATE SIDEBAR ------------------------------- -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('inc.messages')
      @yield('content')
  </div>
  <!-- /.content-wrapper -->
 

<!-- ------------------------- TEMPLATE FOOTER ------------------------------- --> 

  @include('layouts.footer')

<!-- ------------------------- TEMPLATE FOOTER ------------------------------- --> 

   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{url('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>



<!-- InputMask -->
<script src="{{url('adminlte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('adminlte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- datepicker -->
<script src="{{url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- DataTables -->
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte/dist/js/demo.js')}}"></script>
<!-- page script -->

<!-- test tambahan -->

<!-- jQuery 3 -->
<!-- <script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- <script src="{{url('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> -->
<!-- Select2 -->
<script src="{{url('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Morris.js charts -->
<!-- <script src="{{url('adminlte/bower_components/raphael/raphael.min.js')}}"></script> -->
<!-- <script src="{{url('adminlte/bower_components/morris.js/morris.min.js')}}"></script> -->
<!-- Sparkline -->
<script src="{{url('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- Slimscroll -->
<script src="{{url('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{url('adminlte/dist/js/adminlte.min.js')}}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{url('adminlte/dist/js/demo.js')}}"></script> -->





<!-- jQuery 3 -->
<!-- <script src="{{url('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="{{url('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> -->


<!-- InputMask -->
<script src="{{url('adminlte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('adminlte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

<!-- ./ test tambahan -->

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  var url = window.location;
  // for sidebar menu but not for treeview submenu
  $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
  }).parent().siblings().removeClass('active').end().addClass('active');
  // for treeview which is like a submenu
  $('ul.treeview-menu a').filter(function() {
      return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active');


</script>

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#tgl_siup1').datepicker({
        autoclose: true
      })

      $('#tgl_siup2').datepicker({
        autoclose: true
      })

      $('#edit_tgl_siup1').datepicker({
        autoclose: true
      })

      $('#edit_tgl_siup2').datepicker({
        autoclose: true
      })

      $('#tgl_tdp1').datepicker({
        autoclose: true
      })

      $('#tgl_tdp2').datepicker({
        autoclose: true
      })

      $('#edit_tgl_tdp1').datepicker({
        autoclose: true
      })

      $('#edit_tgl_tdp2').datepicker({
        autoclose: true
      })

      $('#tgl_siujk1').datepicker({
        autoclose: true
      })

      $('#tgl_siujk2').datepicker({
        autoclose: true
      })

      $('#edit_tgl_siujk1').datepicker({
        autoclose: true
      })

      $('#edit_tgl_siujk2').datepicker({
        autoclose: true
      })

      $('#tgl_api1').datepicker({
        autoclose: true
      })

      $('#tgl_api2').datepicker({
        autoclose: true
      })

      $('#edit_tgl_api1').datepicker({
        autoclose: true
      })

      $('#edit_tgl_api2').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_skkem').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_skkem_edit').datepicker({
        autoclose: true
      })

      //Date picker
      $('#datepicker3').datepicker({
        autoclose: true
      })

      //Date picker
      $('#datepicker4').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_akta').datepicker({
        autoclose: true,
        todayHighlight: true
      })

      //Date picker
      $('#tgl_akta_edit').datepicker({
        autoclose: true,
        todayHighlight: true
      })      

       //Date picker
       $('#tgl_awal_sertifikat').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_akhir_sertifikat').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_mulai_proyek').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_selesai_proyek').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_awal_keagenan').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_akhir_keagenan').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_awal_keagenan').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_awal_suspend').datepicker({
        autoclose: true
      })

      //Date picker
      $('#tgl_akhir_suspend').datepicker({
        autoclose: true
      })

 
      function ShowHideDivSiup() {
          // var chkYes = document.getElementById("MasaBerlakuStatus2");
          // console.log('Event trigered');
          // var isi_tanggal_berlaku = document.getElementById("isi_tanggal_berlaku_siup");
          // isi_tanggal_berlaku_siup.style.display = chkYes.checked ? "block" : "none";
          console.log('Event trigered');
      }
                            

      function deleteVendor2(id)
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

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })  

  </script>

  <script>

      

      //==============================================================
          //[start] script modal edit Siup
          //$('#modal-edit-siup').on('show.bs.modal', function (event) {

          

          $('#modal-edit-siup').on('show.bs.modal', function (event) {

          //console.log('Modal opened');

          if ( event.relatedTarget != null) {
            var button = $(event.relatedTarget) // Button that triggered the modal
          } 
          var no_dokumen = button.data('no_dokumen') // Extract info from data-* attributes
          var jenis_izin = button.data('jenis_izin')
          var id_siup = button.data('id_siup')
          var tgl_penerbitan = button.data('tgl_penerbitan')
          var instansi_penerbit = button.data('instansi_penerbit')
          var masa_berlaku_status = button.data('masa_berlaku_status') 
          var berlaku_sampai = button.data('berlaku_sampai')

          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)  
          //modal.find('.modal-title').text('New message to ' + recipient)

          if (jenis_izin=="SIUP"){
            $("#JenisIzin1").prop("checked", true)
          }
          else if (jenis_izin=="NIB"){
            $("#JenisIzin2").prop("checked", true)
          }

          modal.find('.modal-body #NomorDokumen').val(no_dokumen)
          modal.find('.modal-body #id_siup').val(id_siup)
          modal.find('.modal-body #edit_tgl_siup1').val(tgl_penerbitan)
          modal.find('.modal-body #InstansiPenerbit').val(instansi_penerbit)
          //modal.find('.modal-body #InstansiPenerbit').val(masa_berlaku_status)

          
          if (masa_berlaku_status=="0"){
            $("#EditMasaBerlakuStatus1").prop("checked", true)
            console.log('Modal 0');
          }
          else{
            $("#EditMasaBerlakuStatus2").prop("checked", true)
            console.log('Modal 1');
            ShowHideDivSiupEdit();
          }
          
          modal.find('.modal-body #edit_tgl_siup2').val(berlaku_sampai)
          
          })

          //})
          //[end] script modal edit Siup

      //==============================================================

  </script>

  
  <script>

          

          //==============================================================
          //[start] script modal edit Skkem
          $('#modal-edit-skkem').on('show.bs.modal', function (event) {

          //console.log('Modal opened');
          
          if ( event.relatedTarget != null) {
            var button = $(event.relatedTarget) // Button that triggered the modal
          }
          
          var nomor_sk = button.data('nomor_sk') // Extract info from data-* attributes
          var id_skkem = button.data('id_skkem')
          var tgl_sk = button.data('tgl_sk')
          var cur_modal_dasar = button.data('cur_modal_dasar')
          var modal_dasar = button.data('modal_dasar')
          var cur_modal_disetor = button.data('cur_modal_disetor')
          var modal_disetor = button.data('modal_disetor')

          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          //modal.find('.modal-title').text('New message to ' + recipient)
          modal.find('.modal-body #NomorSK').val(nomor_sk)
          modal.find('.modal-body #id_skkem').val(id_skkem)
          modal.find('.modal-body #tgl_skkem_edit').val(tgl_sk)
          modal.find('.modal-body #ModalDasar').val(modal_dasar)
          modal.find('.modal-body #ModalDisetor').val(modal_disetor)
          
          //penentuan select menu cur modal dasar
          if (cur_modal_dasar=="IDR"){
          $("#CurModIDR").prop("selected", true)
          }
          else if (cur_modal_dasar=="USD"){
            $("#CurModUSD").prop("selected", true)
          }
          else if (cur_modal_dasar=="JPY"){
            $("#CurModJPY").prop("selected", true)
          }
          else if (cur_modal_dasar=="SGD"){
            $("#CurModSGD").prop("selected", true)
          }
          else if (cur_modal_dasar=="EUR"){
            $("#CurModEUR").prop("selected", true)
          }
          else if (cur_modal_dasar=="CHF"){
            $("#CurModCHF").prop("selected", true)
          }

          //penentuan select menu cur modal disetor
          if (cur_modal_disetor=="IDR"){
          $("#CurDisIDR").prop("selected", true)
          }
          else if (cur_modal_disetor=="USD"){
            $("#CurDisUSD").prop("selected", true)
          }
          else if (cur_modal_disetor=="JPY"){
            $("#CurDisJPY").prop("selected", true)
          }
          else if (cur_modal_disetor=="SGD"){
            $("#CurDisSGD").prop("selected", true)
          }
          else if (cur_modal_disetor=="EUR"){
            $("#CurDisEUR").prop("selected", true)
          }
          else if (cur_modal_disetor=="CHF"){
            $("#CurDisCHF").prop("selected", true)
          }


          })



          //[end] script modal edit SKkem

        //==============================================================

        //==============================================================
          //[start] script modal edit pengurus
        $('#modal-edit').on('show.bs.modal', function (event) {

        //console.log('Modal opened');
        
        if ( event.relatedTarget != null) {
          var button = $(event.relatedTarget) // Button that triggered the modal
        }
        var name = button.data('name') // Extract info from data-* attributes
        var pengurus_id = button.data('pengurus_id')
        var jabatan = button.data('jabatan')
        var no_telepon = button.data('no_telepon')
        var no_hp = button.data('no_hp')
        var email = button.data('email')

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)  
        //modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body #Nama').val(name)
        modal.find('.modal-body #Jabatan').val(jabatan)
        modal.find('.modal-body #NomorTelepon').val(no_telepon)
        modal.find('.modal-body #NomorHp').val(no_hp)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #pengurus_id').val(pengurus_id)
        })
        //[end] scrip modal edit pengurus

        //==============================================================
        
         //[start] script modal edit Akta
         $('#modal-edit-akta').on('show.bs.modal', function (event) {

        //console.log('Modal opened');
        if ( event.relatedTarget != null) {
          var button = $(event.relatedTarget) // Button that triggered the modal
        }
        var jenis = button.data('jenis') // Extract info from data-* attributes
        var id_akta = button.data('id_akta')
        var nama_notaris = button.data('nama_notaris')
        var nomor = button.data('nomor')
        var tgl_akta = button.data('tgl_akta')

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
        if (jenis=="Pendirian"){
          $("#JenisAkta1").prop("checked", true)
        }
        else{
          $("#JenisAkta2").prop("checked", true)
        }
        modal.find('.modal-body #NamaNotaris').val(nama_notaris)
        modal.find('.modal-body #NomorAkta').val(nomor)
        modal.find('.modal-body #tgl_akta_edit').val(tgl_akta)
        modal.find('.modal-body #id_akta').val(id_akta)

        // $('input[name="tgl_akta_edit"]').datepicker({                
        //   format: "yyyy/mm/dd",           
        //   autoclose: true,
        //   todayHighlight: true
        // });

       

        })
        //[end] scrip modal edit akta

        //==============================================================

        //==============================================================
        
         //[start] script modal edit tdp
         $('#modal-edit-tdp').on('show.bs.modal', function (event) {

        //console.log('Modal opened');
        if ( event.relatedTarget != null) {
          var button = $(event.relatedTarget) // Button that triggered the modal
        }
             
        var no_dokumen = button.data('no_dokumen') // Extract info from data-* attributes
        var id_tdp = button.data('id_tdp')
        var tgl_penerbitan = button.data('tgl_penerbitan')
        var instansi_penerbit = button.data('instansi_penerbit')
        var masa_berlaku_status = button.data('masa_berlaku_status')
        var berlaku_sampai = button.data('berlaku_sampai')

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)
       
        modal.find('.modal-body #NomorDokumen').val(no_dokumen)
        modal.find('.modal-body #id_tdp').val(id_tdp)
        modal.find('.modal-body #edit_tgl_tdp1').val(tgl_penerbitan)
        modal.find('.modal-body #InstansiPenerbit').val(instansi_penerbit)

        if (masa_berlaku_status=="0"){
              $("#EditMasaBerlakuTdp1").prop("checked", true)
              console.log('Modal 0');
            }
            else{
              $("#EditMasaBerlakuTdp2").prop("checked", true)
              console.log('Modal 1');
              ShowHideDivTdpEdit();
            }

        modal.find('.modal-body #edit_tgl_tdp2').val(berlaku_sampai)
        
        // $('input[name="tgl_akta_edit"]').datepicker({                
        //   format: "yyyy/mm/dd",           
        //   autoclose: true,
        //   todayHighlight: true
        // });



        })
        //[end] scrip modal edit tdp

        //==============================================================

        //==============================================================
        
         //[start] script modal edit siujk
         $('#modal-edit-siujk').on('show.bs.modal', function (event) {

          //console.log('Modal opened');
          if ( event.relatedTarget != null) {
            var button = $(event.relatedTarget) // Button that triggered the modal
          }
              
          var no_dokumen = button.data('no_dokumen') // Extract info from data-* attributes
          var id_siujk = button.data('id_siujk')
          var tgl_penerbitan = button.data('tgl_penerbitan')
          var instansi_penerbit = button.data('instansi_penerbit')
          var masa_berlaku_status = button.data('masa_berlaku_status')
          var berlaku_sampai = button.data('berlaku_sampai')

          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          //modal.find('.modal-title').text('New message to ' + recipient)

          modal.find('.modal-body #NomorDokumen').val(no_dokumen)
          modal.find('.modal-body #id_siujk').val(id_siujk)
          modal.find('.modal-body #edit_tgl_siujk1').val(tgl_penerbitan)
          modal.find('.modal-body #InstansiPenerbit').val(instansi_penerbit)

          if (masa_berlaku_status=="0"){
                $("#EditMasaBerlakuSiujk1").prop("checked", true)
                console.log('Modal 0');
              }
              else{
                $("#EditMasaBerlakuSiujk2").prop("checked", true)
                console.log('Modal 1');
                ShowHideDivSiujkEdit()
              }

          modal.find('.modal-body #edit_tgl_siujk2').val(berlaku_sampai)

          // $('input[name="tgl_akta_edit"]').datepicker({                
          //   format: "yyyy/mm/dd",           
          //   autoclose: true,
          //   todayHighlight: true
          // });



          })
          //[end] scrip modal edit siujk

          //==============================================================


          //==============================================================
        
         //[start] script modal edit api
         $('#modal-edit-api').on('show.bs.modal', function (event) {

        //console.log('Modal opened');
        if ( event.relatedTarget != null) {
          var button = $(event.relatedTarget) // Button that triggered the modal
        }
            
        var no_dokumen = button.data('no_dokumen') // Extract info from data-* attributes
        var id_api = button.data('id_api')
        var tgl_penerbitan = button.data('tgl_penerbitan')
        var instansi_penerbit = button.data('instansi_penerbit')
        var masa_berlaku_status = button.data('masa_berlaku_status')
        var berlaku_sampai = button.data('berlaku_sampai')

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        //modal.find('.modal-title').text('New message to ' + recipient)

        modal.find('.modal-body #NomorDokumen').val(no_dokumen)
        modal.find('.modal-body #id_api').val(id_api)
        modal.find('.modal-body #edit_tgl_api1').val(tgl_penerbitan)
        modal.find('.modal-body #InstansiPenerbit').val(instansi_penerbit)

        if (masa_berlaku_status=="0"){
              $("#EditMasaBerlakuApi1").prop("checked", true)
              console.log('Modal 0');
            }
            else{
              $("#EditMasaBerlakuApi2").prop("checked", true)
              console.log('Modal 1');
              ShowHideDivApiEdit()
            }

        modal.find('.modal-body #edit_tgl_api2').val(berlaku_sampai)

        // $('input[name="tgl_akta_edit"]').datepicker({                
        //   format: "yyyy/mm/dd",           
        //   autoclose: true,
        //   todayHighlight: true
        // });

        })
        //[end] scrip modal edit api

        //==============================================================

       
        
    </script>



</body>
</html>