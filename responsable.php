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
            <h1>Paciente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Responsable</li>
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
                <div class="col-md-2">
                    <div class="form-group">
                        <label>DNI</label>
                        <input type="text" class="form-control" id="txt_filter_dni"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nombre 1</label>
                        <input type="text" class="form-control" id="txt_filter_nombre1"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nombre 2</label>
                        <input type="text" class="form-control" id="txt_filter_nombre2"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Apellido Paterno</label>
                        <input type="text" class="form-control" id="txt_filter_apellido_paterno"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Apellido Materno</label>
                        <input type="text" class="form-control" id="txt_filter_apellido_materno"/>
                    </div>
                </div>
                <!-- /.col -->
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <button type="button" class="btn btn-success" onclick="cargarFiltroResponsable()">Filtrar</button>
          </div>
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal"  onclick="cargarAgregarPaciente()">Registrar nueva paciente</button>
              </div>
              <div class="card-body">
                <table id="tablepabellones" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Fecha de nacimiento</th>
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

<!-- Modales Pabellon -->
<!-- Agregar Pabellon -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Agregar Responsable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <label>Nombre 1:</label>
                    <input class="form-control" type="text" id="txt_add_nombre1">
                    <br>

                    <label>Nombre 2:</label>
                    <input class="form-control" type="text" id="txt_add_nombre2">
                    <br>

                    <label>Apellido Paterno:</label>
                    <input class="form-control" type="text" id="txt_add_apellido_paterno">
                    <br>

                    <label>Apellido Materno:</label>
                    <input class="form-control" type="text" id="txt_add_apellido_materno">
                    <br>

                    <label>DNI:</label>
                    <input class="form-control" type="text" id="txt_add_dni">
                    <br>

                    <label>Fecha de nacimiento:</label>
                    <input class="form-control" type="date" id="txt_add_fecha_nacimiento">
                    <br>

                    <label>Celular:</label>
                    <input class="form-control" type="text" id="txt_add_celular">
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="agregarResponsable();"
                    data-dismiss="modal">Agregar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modificar Pabellon -->
<div class="modal fade" id="itemModal1" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Modificar Responsable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <input class="form-control" type="text" id="txt_mod_codigo" readonly>    

                    <label>Nombre 1:</label>
                    <input class="form-control" type="text" id="txt_mod_nombre1">
                    <br>

                    <label>Nombre 2:</label>
                    <input class="form-control" type="text" id="txt_mod_nombre2">
                    <br>

                    <label>Apellido Paterno:</label>
                    <input class="form-control" type="text" id="txt_mod_apellido_paterno">
                    <br>

                    <label>Apellido Materno:</label>
                    <input class="form-control" type="text" id="txt_mod_apellido_materno">
                    <br>

                    <label>DNI:</label>
                    <input class="form-control" type="text" id="txt_mod_dni">
                    <br>

                    <label>Fecha de nacimiento:</label>
                    <input class="form-control" type="date" id="txt_mod_fecha_nacimiento">
                    <br>

                    <label>Celular:</label>
                    <input class="form-control" type="text" id="txt_mod_celular">
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="modificarResponsable();"
                    data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Eliminar Pabellon -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Eliminar Responsable</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="txt_del_codigo" hidden>    
                    <label>Responsable</label>
                    <input class="form-control" type="text" id="txt_del_nombre" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary"
                    onclick="eliminarResponsable()"
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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    var $timer;

    //Funciones de consulta al controlador
    var datatable = $('#tablepabellones').DataTable({"deferRender": true,
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
        getResponsable();
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

    function getResponsable(){
        $.ajax({
            url: "controlador/responsable.php?accion=lectura",
            type: "GET",
            success: function(val){
                datatable.destroy();
                var cad = "";
                
                for (i in val['responsable']) {
                    var correlative = parseInt(i) + 1;

                    aux = '<td align="center">' + correlative  + '</td>';
                    aux = aux + '<td align="center">' + val['responsable'][i].nombre1 + " " + val['responsable'][i].nombre2 + '</td>';
                    aux = aux + '<td align="center">' + val['responsable'][i].apellido_paterno + " " + val['responsable'][i].apellido_materno + '</td>';
                    aux = aux + '<td align="center">' + val['responsable'][i].dni + '</td>';
                    aux = aux + '<td align="center">' + val['responsable'][i].fecha_nacimiento + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info" type="button" onclick="cargarResponsable(\'' 
                    + val['responsable'][i].id + '\',\'' 
                    + val['responsable'][i].nombre1 + '\',\'' 
                    + val['responsable'][i].nombre2 + '\',\''
                    + val['responsable'][i].apellido_paterno + '\',\''  
                    + val['responsable'][i].apellido_materno + '\',\'' 
                    + val['responsable'][i].dni + '\',\'' 
                    + val['responsable'][i].fecha_nacimiento + '\''
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger" type="button" onclick="cargarEliminarResponsable(\''
                    + val['responsable'][i].id + '\',\''
                    + val['responsable'][i].nombre1 + ' ' + val['responsable'][i].nombre2 + ' ' + val['responsable'][i].apellido_paterno + " " + val['responsable'][i].apellido_materno +
                    '\')" title="eliminar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tablepabellones').DataTable({"deferRender": true,
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
    function cargarResponsable(id, nombre1, nombre2, apellido_paterno, apellido_materno, dni, fecha_nacimiento) {
        document.getElementById("txt_mod_codigo").value = id;
        document.getElementById("txt_mod_nombre1").value = nombre1;
        document.getElementById("txt_mod_nombre2").value = nombre2;
        document.getElementById("txt_mod_apellido_paterno").value = apellido_paterno;
        document.getElementById("txt_mod_apellido_materno").value = apellido_materno;
        document.getElementById("txt_mod_dni").value = dni;
        document.getElementById("txt_mod_fecha_nacimiento").value = fecha_nacimiento;
    }

    function cargarEliminarResponsable(id, nombre) {
        document.getElementById("txt_del_codigo").value = id;
        document.getElementById("txt_del_nombre").value = nombre;
    }

    function cargarAgregarResponsable() {
        document.getElementById("txt_add_nombre1").value = "";
        document.getElementById("txt_add_nombre2").value = "";
        document.getElementById("txt_add_apellido_paterno").value = "";
        document.getElementById("txt_add_apellido_materno").value = "";
        document.getElementById("txt_add_dni").value = "";
        document.getElementById("txt_add_fecha_nacimiento").value = "";
    }

    //Opciones Insertar, Eliminar, Modificar

    function modificarResponsable(){

        //codigo
        var codigo = document.getElementById("txt_mod_codigo").value;

        //nombre
        var nombre1 = document.getElementById("txt_mod_nombre1").value;

        //capacidad
        var nombre2 = document.getElementById("txt_mod_nombre2").value;

        //detalle
        var apellido_paterno = document.getElementById("txt_mod_apellido_paterno").value;

        //estado
        var apellido_materno = document.getElementById("txt_mod_apellido_materno").value;      

        var dni = document.getElementById("txt_mod_dni").value;      

        var fecha_nacimiento = document.getElementById("txt_mod_fecha_nacimiento").value;      

        console.log("entro en el codigo" + codigo);
        console.log("entro en el nombre" + nombre1);
        console.log("entro en el capacidad" + nombre2);
        console.log("entro en el detalle" + apellido_paterno);
        console.log("entro en el estado" + apellido_materno);
        console.log("entro en el estado" + dni);
        console.log("entro en el estado" + fecha_nacimiento);

        $.ajax({
            
            url: "controlador/responsable.php?codigo=" + codigo + 
                                            '&nombre1=' + nombre1 + 
                                            '&nombre2=' + nombre2 + 
                                            '&apellido_paterno=' + apellido_paterno +              	                                
                                            '&apellido_materno=' + apellido_materno +
                                            '&dni=' + dni +
                                            '&fecha_nacimiento=' + fecha_nacimiento +
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
            },            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        });        
    }

    function eliminarResponsable(){
        var codigo = document.getElementById("txt_del_codigo").value;
        var nombre = document.getElementById("txt_del_nombre").value;

        $.ajax({
            url: "controlador/responsable.php?codigo=" + codigo + "&nombre=" + nombre + '&accion=eliminar',
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
            },error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        });
    }

    function agregarResponsable(){

        var nombre1 = document.getElementById("txt_add_nombre1").value;


        var nombre2 = document.getElementById("txt_add_nombre2").value;


        var apellido_paterno = document.getElementById("txt_add_apellido_paterno").value;


        var apellido_materno = document.getElementById("txt_add_apellido_materno").value;   

        var dni = document.getElementById("txt_add_dni").value;

        var fecha_nacimiento = document.getElementById("txt_add_fecha_nacimiento").value;   

        $.ajax({
            
            url: "controlador/responsable.php?" +
                                            'nombre1=' + nombre1 + 
                                            '&nombre2=' + nombre2 + 
                                            '&apellido_paterno=' + apellido_paterno +              	                                
                                            '&apellido_materno=' + apellido_materno +
                                            '&dni=' + dni +
                                            '&fecha_nacimiento=' + fecha_nacimiento +
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
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        });
    }

    function cargarFiltroResponsable(){

        var nombre = document.getElementById("txt_filter_nombre").value.length;
        var detalle = document.getElementById("txt_filter_detalle").value.length;
        var estado = document.getElementById("txt_filter_estado").value;
        var cantidadi = document.getElementById("txt_filter_capacidadi").value.length;
        var cantidade = document.getElementById("txt_filter_capacidade").value.length;
        

        if(nombre == 0){
            nombre = "%";
        }else {
            nombre = document.getElementById("txt_filter_nombre").value;
        }
        if(detalle == 0){
            detalle= "%";
        }else {
            detalle = document.getElementById("txt_filter_detalle").value;
        }
        if(estado == 3){
            estado = "%"
        }else {
            estado = document.getElementById("txt_filter_estado").value;
        }
        if(cantidadi == 0){
            cantidadi = 0;
        }else {
            cantidadi = document.getElementById("txt_filter_capacidadi").value;
        }
        if(cantidade == 0){
            cantidade = 99999999;
        }else {
            cantidade = document.getElementById("txt_filter_capacidade").value;
        }
        /*
        var nombre = document.getElementById("txt_filter_nombre").value;
        var capacidad = document.getElementById("txt_filter_capacidad").value;
        var detalle = document.getElementById("txt_filter_detalle").value;
        var estado = document.getElementById("txt_filter_estado").value;
        var cantidadi = document.getElementById("txt_filter_capacidadi").value;
        var cantidade = document.getElementById("txt_filter_capacidade").value;
        */
        console.log("Filter entro en el nombre" + nombre);
        console.log("Filter entro en el detalle" + detalle);
        console.log("Filter entro en el estado" + estado);

        console.log("Filter entro en el cantidadi" + cantidadi);
        console.log("Filter entro en el cantidade" + cantidade);

        
        $.ajax({

            url: "controlador/responsable.php?" + 
                                            'nombre=' + nombre +
                                            '&detalle=' + detalle +
                                            '&estado=' + estado +
                                            '&cantidadi=' + cantidadi +
                                            '&cantidade=' + cantidade +
                                            '&accion=filter',
            type:"GET",
            success: function(val){
                console.log(val);
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['pabellonf']));
                
                for (i in val['pabellonf']) {
                    aux = '<td align="center">' + val['pabellonf'][i].id + '</td>';
                    aux = aux + '<td align="center">' + val['pabellonf'][i].nombre + '</td>';
                    aux = aux + '<td align="center">' + val['pabellonf'][i].capacidad + '</td>';
                    aux = aux + '<td align="center">' + val['pabellonf'][i].detalle + '</td>';
                    aux = aux + '<td align="center">' + val['pabellonf'][i].estado + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info" type="button" onclick="cargarPabellon(\'' 
                    + val['pabellonf'][i].id + '\',\'' 
                    + val['pabellonf'][i].nombre + '\',\'' 
                    + val['pabellonf'][i].capacidad + '\',\'' 
                    + val['pabellonf'][i].detalle + '\','  
                    + val['pabellonf'][i].estado  
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger" type="button" onclick="cargarEliminarPabellon(\''
                    + val['pabellonf'][i].id + '\',\''
                    + val['pabellonf'][i].nombre +
                    '\')" title="eliminar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tablepabellones').DataTable({"deferRender": true,
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
