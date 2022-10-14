<?php 
include_once 'templates/header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 mr-2">
          <div class="col-sm-6">
            <h1>Turno</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Turno</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mr-2">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Filtros</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="txt_filter_nombre"/>
                    </div>
                </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <button type="button" class="btn btn-success" onclick="cargarFiltroTurno()">Filtrar</button>
          </div>
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal"  onclick="cargarAgregarTurno()">Registrar nuevo turno</button>
              </div>
              <div class="card-body">
                <table id="tableareas" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody id="gridbody">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Modales Area -->
<!-- Agregar Area -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Agregar Turno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <label>Nombre:</label>
                    <input class="form-control" type="text" id="txt_add_nombre">
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="agregarTurno();"
                    data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modificar Area -->
<div class="modal fade" id="itemModal1" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Modificar Turno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <input class="form-control" type="text" id="txt_mod_codigo" readonly>    

                    <label>Nombre:</label>
                    <input class="form-control" type="text" id="txt_mod_nombre">
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="modificarTurno();"
                    data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Eliminar Area -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Eliminar Turno</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="txt_del_codigo" hidden>    
                    <label>Turno</label>
                    <input class="form-control" type="text" id="txt_del_nombre" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary"
                    onclick="eliminarTurno()"
                    data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    var $timer;

    //Funciones de consulta al controlador
    var datatable = $('#tableareas').DataTable({"deferRender": true,
                                            "language": {
                                                "sProcessing":     "",
                                                "sLengthMenu":     "Mostrar _MENU_ registros",
                                                "sZeroRecords":    "No se encontraron resultados",
                                                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                                "sInfoPostFix":    "",
                                                "sSearch":         "Buscar:",
                                                "searchPlaceholder": "Escriba aquí..",
                                                "sUrl":            "",
                                                "sInfoThousands":  ",",
                                                "oPaginate": {
                                                    "sFirst":    "Primero",
                                                    "sLast":     "Último",
                                                    "sNext":     "Siguiente",
                                                    "sPrevious": "Anterior"
                                                },
                                                "oAria": {
                                                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                                },
                                            },
                                            "responsive": true,
                                            "autoWidth": true,
                                        });


  

    //Cuando incia la pagina
    window.onload = function(){
        getData();
    }

    function getData() {
        getTurno();
    }

    // Funcion para testear respuesta del JSON 
    function testResponse(){
        var jsonData = JSON.parse(val);
                console.log("Este es el valor del val: " + val);
                if (jsonData.success == "1")
                {
                    console.log("tengo data");
                }
                else
                {
                    alert('Invalid Credentials!');
                }
    }

    function getTurno(){
        $.ajax({
            url: "controlador/turno.php?accion=lectura",
            type: "GET",
            success: function(val){
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['turno']));
                
                for (i in val['turno']) {
                    aux = '<td align="center">' + val['turno'][i].id + '</td>';
                    aux = aux + '<td align="center">' + val['turno'][i].descripcion + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info" type="button" onclick="cargarTurno(\'' 
                    + val['turno'][i].id + '\',\'' 
                    + val['turno'][i].descripcion + '\'' 
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger" type="button" onclick="cargarEliminarTurno(\''
                    + val['turno'][i].id + '\',\''
                    + val['turno'][i].descripcion +
                    '\')" title="eliminar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tableareas').DataTable({"deferRender": true,
                                                "language": {
                                                    "sProcessing":     "",
                                                    "sLengthMenu":     "Mostrar _MENU_ registros",
                                                    "sZeroRecords":    "No se encontraron resultados",
                                                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                                    "sInfoPostFix":    "",
                                                    "sSearch":         "Buscar:",
                                                    "searchPlaceholder": "Escriba aquí..",
                                                    "sUrl":            "",
                                                    "sInfoThousands":  ",",
                                                    "oPaginate": {
                                                        "sFirst":    "Primero",
                                                        "sLast":     "Último",
                                                        "sNext":     "Siguiente",
                                                        "sPrevious": "Anterior"
                                                    },
                                                    "oAria": {
                                                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                                    }
                                                },
                                                "responsive": true,
                                                "autoWidth": true,
                                            });


                console.log("Entro en el ajax");
            }
        });
    }

    $('#reservation').daterangepicker()
  

    //seteo de modales
    function cargarTurno(id, descripcion) {
        document.getElementById("txt_mod_codigo").value = id;
        document.getElementById("txt_mod_nombre").value = descripcion;
    }

    function cargarEliminarTurno(id, descripcion) {
        document.getElementById("txt_del_codigo").value = id;
        document.getElementById("txt_del_nombre").value = descripcion;
    }

    function cargarAgregarTurno() {
        document.getElementById("txt_add_nombre").value = "";
    }

    //Opciones Insertar, Eliminar, Modificar

    function modificarTurno(){

        //codigo
        var codigo = document.getElementById("txt_mod_codigo").value;

        //nombre
        var descripcion = document.getElementById("txt_mod_nombre").value;  

        console.log("entro en el codigo" + codigo);
        console.log("entro en el nombre" + descripcion);

        $.ajax({
            
            url: "controlador/turno.php?codigo=" + codigo + 
                                            '&descripcion=' + descripcion + 
                                            '&accion=modificar',
            type:"GET",
            success: function(val){
                console.log(val['mensaje'].mensaje);
                var message;
                message = val['mensaje'].mensaje;
                console.log(val); 
                Swal.fire({
                    title: message,
                    icon: 'success',
                    buttons: true
                }).then((result) => {
                    if(result){
                        // Do Stuff here for success
                        location.reload();
                    }else{
                        // something other stuff
                    }
                })
            },
        });        
    }

    function eliminarTurno(){
        var codigo = document.getElementById("txt_del_codigo").value;
        var descripcion = document.getElementById("txt_del_nombre").value;

        $.ajax({
            url: "controlador/turno.php?codigo=" + codigo + "&descripcion=" + descripcion + '&accion=eliminar',
            type: "GET",
            success: function(val){
                var message;
                message = val['mensaje'].mensaje;
                Swal.fire({
                    title: message,
                    icon: 'success',
                    buttons: true
                }).then((result) => {
                    if(result){
                        location.reload();
                    }else{
                        // something other stuff
                    }
                })
            },
        });
    }

    function agregarTurno(){

        //nombre
        var descripcion = document.getElementById("txt_add_nombre").value;

        console.log("entro en el nombre" + descripcion);

        $.ajax({
            
            url: "controlador/turno.php?" +
                                            'descripcion=' + descripcion + 
                                            '&accion=agregar',
            type:"GET",
            success: function(val){
                console.log(val['mensaje'].mensaje);
                var message;
                message = val['mensaje'].mensaje;
                console.log(val); 
                Swal.fire({
                    title: message,
                    icon: 'success',
                    buttons: true
                }).then((result) => {
                    if(result){
                        // Do Stuff here for success
                        location.reload();
                    }else{
                        // something other stuff
                    }
                })
            },
        });
    }

    function cargarFiltroTurno(){

        var descripcion = document.getElementById("txt_filter_nombre").value.length;
        
        if(descripcion == 0){
            descripcion = "%";
        }else {
            descripcion = document.getElementById("txt_filter_nombre").value;
        }
        /*
        var nombre = document.getElementById("txt_filter_nombre").value;
        */
        console.log("Filter entro en el nombre" + descripcion);

        $.ajax({

            url: "controlador/turno.php?" + 
                                            'descripcion=' + descripcion +
                                            '&accion=filter',
            type:"GET",
            success: function(val){
                console.log(val);
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['turnof']));
                
                for (i in val['turnof']) {
                    aux = '<td align="center">' + val['turnof'][i].id + '</td>';
                    aux = aux + '<td align="center">' + val['turnof'][i].descripcion + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info" type="button" onclick="cargarTurno(\'' 
                    + val['turnof'][i].id + '\',\''
                    + val['turnof'][i].descripcion + '\''  
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger" type="button" onclick="cargarEliminarTurno(\''
                    + val['turnof'][i].id + '\',\''
                    + val['turnof'][i].descripcion +
                    '\')" title="eliminar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tableareas').DataTable({"deferRender": true,
                                                "language": {
                                                    "sProcessing":     "",
                                                    "sLengthMenu":     "Mostrar _MENU_ registros",
                                                    "sZeroRecords":    "No se encontraron resultados",
                                                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                                                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                                    "sInfoPostFix":    "",
                                                    "sSearch":         "Buscar:",
                                                    "searchPlaceholder": "Escriba aquí..",
                                                    "sUrl":            "",
                                                    "sInfoThousands":  ",",
                                                    "oPaginate": {
                                                        "sFirst":    "Primero",
                                                        "sLast":     "Último",
                                                        "sNext":     "Siguiente",
                                                        "sPrevious": "Anterior"
                                                    },
                                                    "oAria": {
                                                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                                                    }
                                                },
                                                "responsive": true,
                                                "autoWidth": true,
                                            });


                console.log("Entro en el del filtro");
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        });
        
    }


</script>
</body>
</html>
