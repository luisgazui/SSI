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
    <script src=" https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>
   
    <script src="{{ asset('/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/js/defaults-es_CL.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('/js/es.js') }}"></script> 
    <script src="{{ asset('/js/bootstrap-table-expandable.js') }}"></script>
    <script src="{{ asset('/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('/js/jquery.bootstrap-touchspin.min.js') }}"></script>

   <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                 format: 'DD-MM-YYYY',
                 locale:'es'
                       });
                });
        </script>

        <script type="text/javascript">
        $(function () {
            $('#datetimepicker9').datetimepicker({
                viewMode: 'years',
                format: 'MM-YYYY',
                locale:'es'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepickerD').datetimepicker({
                viewMode: 'years',
                format: 'MM-YYYY',
                locale:'es'
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepickerA').datetimepicker({
                viewMode: 'years',
                format: 'MM-YYYY',
                locale:'es'
            });
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
        }],
         language: {
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
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
         "scrollX": true,
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
        
                       }],
                       language: {
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        
       
        
       });
    });
</script>

<script>   
$(document).ready(function() {
    var table = $('#perfilesProses-table').DataTable({
       
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
                language: {
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    } );
} );    
</script>   

<script>   
$(document).ready(function() {
    var table = $('#table_edit').DataTable({
        language: {
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
} );    
</script> 
<script>   
$(document).ready(function() {
    var table = $('#metas-table').DataTable({
       "scrollX": true,
        dom: 'Brtip',
       
        buttons: [
            {
                extend:'csv',
                title:'Metas'
            }, 
            {
                extend:'excel',
                title: 'Metas'
                 
            }, 
            {
                extend:'pdf',
                title: 'Metas'
            }
        
                ],
                language: {
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    } );
} );    
</script> 

<script type="text/javascript">
    $(document).ready(function() {
        $('#otros-table').dataTable( {
            "scrollX": true,
            dom: 'Brtip',

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
        }],
         language: {
        
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Ãšltimo",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
       });
    });
</script> 

<script>
 $("input[name='Inspecciones']").TouchSpin({
    min: 0,
    max: 50,
 });
</script>
<script>
 $("input[name='Observaciones']").TouchSpin({
    min: 0,
    max: 50,
 });
</script>
<script>
 $("input[name='Interaciones']").TouchSpin({
    min: 0,
    max: 50,
 });
</script>
<script>
 $("input[name='Reuniones']").TouchSpin({
    min: 0,
    max: 50,
 });
</script>
<script>
 $("input[name='Charlas']").TouchSpin({
    min: 0,
    max: 50,
 });
</script>