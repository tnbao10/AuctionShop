
<!-- jQuery -->
<script src="{{asset("admin/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("admin/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset("admin/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- ChartJS -->
<script src="{{asset("admin/chart.js/Chart.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("admin/sparklines/sparkline.js")}}"></script>
{{--
<!-- jQuery Knob Chart -->
<script src="{{asset("admin/jquery-knob/jquery.knob.min.js")}}"></script> --}}
<!-- daterangepicker -->
{{-- <script src="{{asset("admin/moment/moment.min.js")}}"></script> --}}
{{-- <script src="{{asset("admin/daterangepicker/daterangepicker.js")}}"></script> --}}
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{asset("admin/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script> --}}
<!-- Summernote -->
<script src="{{asset("admin/summernote/summernote-bs4.min.js")}}"></script>
<!-- overlayScrollbars -->
{{-- <script src="{{asset("admin/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script> --}}
<!-- DataTables -->
<script src="{{asset("admin/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("admin/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{asset("admin/js/adminlte.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset("admin/js/pages/dashboard.js")}}"></script> --}}
<script src="{{asset("ckeditor/ckeditor.js")}}"></script>
{{-- <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}
<script>
    $(function () {
      // Summernote
      $('.textarea').summernote()
    })
  </script>
@toastr_js

<script>
  $(function () {
    // Summernote
    $('#bv_noidung').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
{{-- <script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'sp_mota' );
    CKEDITOR.replace( 'dm_mota' );
</script> --}}
@stack('datatable')
