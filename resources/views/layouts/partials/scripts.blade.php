<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/defaults-es_CL.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#areasFisicas-table').dataTable( {
            dom: 'Bfrtip',
        buttons: [
            {
                extend:'csv',
                title:'Areas_Fisicas'
            }, 
            {
                extend:'excel',
                title: 'Areas_Fisicas'
                 
            }, 
            {
                extend:'pdf',
                title: 'Areas_Fisicas'
            }
        
                ],
        "columnDefs": [{
            "targets": 'nosort',
                        "orderable" : false,
                        "searchable": false,
                        "printable" : false,
                        "exportable" : false
        }]
       });
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#Enabled').bootstrapToggle();
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#departamentosProses-table').dataTable( {
        
        dom: 'Bfrtip',
        buttons: [
            {
                extend:'csv',
                title:'Departamentos_Prose'
            }, 
            {
                extend:'excel',
                title: 'Departamentos_Prose'
                 
            }, 
            {
                extend:'pdf',
                title: 'Departamentos_Prose'
            }
        
                ],
        "columnDefs": [{
            "targets": 'nosort',
                        "orderable" : false,
                        "searchable": false,
                        "printable" : false,
                        "exportable" : false
        
                       }]
        
       
        
       });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#perfilesProses-table').dataTable( {
        
        dom: 'Brtip',
        buttons: [
            {
                extend:'csv',
                title:'Perfiles_Prose'
            }, 
            {
                extend:'excel',
                title: 'Perfiles_Prose'
                 
            }, 
            {
                extend:'pdf',
                title: 'Perfiles_Prose'
            }
        
                ],
        "columnDefs": [{
            "targets": 'nosort',
                        "orderable" : false,
                        "searchable": false,
                        "printable" : false,
                        "exportable": false
        
                       }]
        
       
        
       });
});
</script>       