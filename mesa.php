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
            <h1>Mesas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Mesas</li>
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
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="txt_filter_nombre"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Cap. mayor igual que</label>
                            <input type="number" class="form-control" id="txt_filter_capacidadi"/>
                        </div>
                        <div class="col-md-6">
                            <label>Cap. menor igual que</label>
                            <input type="number" class="form-control" id="txt_filter_capacidade"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="custom-select" id="spn_filter_estado">
                            <option value="%" selected>Elegir...</option>
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Pabellon</label>
                        <select class="custom-select" id="spn_filter_pabellon">
                        </select>
                    </div>
                </div>
              <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Detalle</label>
                        <input type="text" class="form-control" id="txt_filter_detalle"/>
                    </div>
                </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <button type="button" class="btn btn-success" onclick="cargarFiltroMesa()">Filtrar</button>
          </div>
        </div>
        <!-- /.card -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal"  onclick="cargarAgregarMesa()">Registrar nueva Mesa</button>
              </div>
              <div class="card-body">
                <table id="tablemesas" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Capacidad</th>
                    <th>Detalle </th>
                    <th>Estado</th>
                    <th>Pabellon</th>
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
                <h5 class="modal-title" id="itemModalLabel">Agregar Mesa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <label>Nombre:</label>
                    <input class="form-control" type="text" id="txt_add_nombre">
                    <br>

                    <label>Capacidad:</label>
                    <input class="form-control" type="number" id="txt_add_capacidad">
                    <br>

                    <label>Detalle:</label>
                    <textarea class="form-control" id="txt_add_detalle" rows="3"></textarea>
                    <br>

                    <label>Estado:</label>
                    <select class="form-control" id="spn_add_estado">
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                    </select>
                    <br>

                    <label>Pabellon:</label>
                    <select class="form-control" id="spn_add_pabellon">
                    </select>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="agregarMesa();"
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
                <h5 class="modal-title" id="itemModalLabel">Modificar Mesa</h5>
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

                    <label>Capacidad:</label>
                    <input class="form-control" type="number" id="txt_mod_capacidad">
                    </select>
                    <br>

                    <label>Detalle:</label>
                    <textarea class="form-control" id="txt_mod_detalle" rows="3"></textarea>
                    <br>

                    <label>Estado:</label>
                    <select class="form-control" id="spn_mod_estado">
                        <option value="0">Inactivo</option>
                        <option value="1">Activo</option>
                    </select>
                    <br>

                    <label>Pabellon:</label>
                    <select class="form-control" id="spn_mod_pabellon">
                    </select>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="modificarMesa();"
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
                <h5 class="modal-title" id="itemModalLabel">Eliminar Mesa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="txt_del_codigo" hidden>    
                    <label>Pabellon</label>
                    <input class="form-control" type="text" id="txt_del_nombre" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary"
                    onclick="eliminarMesa()"
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
    var datatable = $('#tablemesas').DataTable({"deferRender": true,
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
        getMesas();
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

    function getMesas(){
        $.ajax({
            url: "controlador/mesa.php?accion=lectura",
            type: "GET",
            success: function(val){
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['mesa']));
                
                for (i in val['mesa']) {
                    aux = '<td align="center">' + val['mesa'][i].id + '</td>';
                    aux = aux + '<td align="center">' + val['mesa'][i].nombre + '</td>';
                    aux = aux + '<td align="center">' + val['mesa'][i].capacidad + '</td>';
                    aux = aux + '<td align="center">' + val['mesa'][i].detalle + '</td>';
                    aux = aux + '<td align="center">' + val['mesa'][i].estado + '</td>';
                    aux = aux + '<td align="center">' + val['mesa'][i].pabellon + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info" type="button" onclick="cargarMesa(\'' 
                    + val['mesa'][i].id + '\',\'' 
                    + val['mesa'][i].nombre + '\',\'' 
                    + val['mesa'][i].capacidad + '\',\'' 
                    + val['mesa'][i].detalle + '\','  
                    + val['mesa'][i].estado  + ',\'' 
                    + val['mesa'][i].pabellon + '\''
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger" type="button" onclick="cargarEliminarMesa(\''
                    + val['mesa'][i].id + '\',\''
                    + val['mesa'][i].nombre +
                    '\')" title="eliminar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tablemesas').DataTable({"deferRender": true,
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

        $.ajax({
                url: "controlador/pabellon.php?accion=lectura",
                type: "GET",
                success: function(val){
                    var cad = "";
                    console.log("Entro en el ajax 1" + Object.values(val['pabellon']));
                    for (i in val['pabellon']) {

                        aux = "<option value='" + val['pabellon'][i].id + "'>" + val['pabellon'][i].nombre +"</option>";
                        cad = cad + aux;
                    }
                    console.log(cad);
                    document.getElementById("spn_filter_pabellon").innerHTML = "<option value='%' selected>Elegir...</option>" + cad;
                    document.getElementById("spn_mod_pabellon").innerHTML = cad;
                    document.getElementById("spn_add_pabellon").innerHTML = cad;
            }
        });

    }

    $('#reservation').daterangepicker()
  

    //seteo de modales
    function cargarMesa(id, nombre, capacidad, detalle, estado, pabellon) {
        document.getElementById("txt_mod_codigo").value = id;
        document.getElementById("txt_mod_nombre").value = nombre;
        document.getElementById("txt_mod_capacidad").value = capacidad;
        document.getElementById("txt_mod_detalle").value = detalle;
        document.getElementById("spn_mod_estado").value = estado;
        document.getElementById("spn_mod_pabellon").value = pabellon;
    }

    function cargarEliminarMesa(id, nombre) {
        document.getElementById("txt_del_codigo").value = id;
        document.getElementById("txt_del_nombre").value = nombre;
    }

    function cargarAgregarMesa() {
        document.getElementById("txt_add_nombre").value = "";
        document.getElementById("txt_add_capacidad").value = 20;
        document.getElementById("txt_add_detalle").value = "";
        document.getElementById("spn_add_estado").value = 1;
    }

    //Opciones Insertar, Eliminar, Modificar

    function modificarMesa(){

        //codigo
        var codigo = document.getElementById("txt_mod_codigo").value;

        //nombre
        var nombre = document.getElementById("txt_mod_nombre").value;

        //capacidad
        var capacidad = document.getElementById("txt_mod_capacidad").value;

        //detalle
        var detalle = document.getElementById("txt_mod_detalle").value;

        //estado
        var estado = document.getElementById("spn_mod_estado").value;
        
        //pabellon
        var estado = document.getElementById("spn_mod_pabellon").value;

        console.log("entro en el codigo" + codigo);
        console.log("entro en el nombre" + nombre);
        console.log("entro en el capacidad" + capacidad);
        console.log("entro en el detalle" + detalle);
        console.log("entro en el estado" + estado);
        console.log("entro en el pabellon" + pabellon);

        $.ajax({
            
            url: "controlador/mesa.php?codigo=" + codigo + 
                                            '&nombre=' + nombre + 
                                            '&capacidad=' + capacidad + 
                                            '&detalle=' + detalle +              	                                
                                            '&estado=' + estado +
                                            '&pabellon=' + pabellon +
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

    function eliminarMesa(){
        var codigo = document.getElementById("txt_del_codigo").value;
        var nombre = document.getElementById("txt_del_nombre").value;

        $.ajax({
            url: "controlador/mesa.php?codigo=" + codigo + "&nombre=" + nombre + '&accion=eliminar',
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

    function agregarMesa(){

        //nombre
        var nombre = document.getElementById("txt_add_nombre").value;

        //capacidad
        var capacidad = document.getElementById("txt_add_capacidad").value;

        //detalle
        var detalle = document.getElementById("txt_add_detalle").value;

        //estado
        var estado = document.getElementById("spn_add_estado").value;   

        //pabellon
        var pabellon = document.getElementById("spn_add_pabellon").value;   

        console.log("entro en el nombre" + nombre);
        console.log("entro en el capacidad" + capacidad);
        console.log("entro en el detalle" + detalle);
        console.log("entro en el estado" + estado);
        console.log("entro en el estado" + pabellon);

        $.ajax({
            
            url: "controlador/mesa.php?" +
                                            'nombre=' + nombre + 
                                            '&capacidad=' + capacidad + 
                                            '&detalle=' + detalle +              	                                
                                            '&estado=' + estado +
                                            '&pabellon=' + pabellon +
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

    function cargarFiltroMesa(){

        var nombre = document.getElementById("txt_filter_nombre").value.length;
        var detalle = document.getElementById("txt_filter_detalle").value.length;
        var estado = document.getElementById("txt_filter_estado").value;
        var cantidadi = document.getElementById("txt_filter_capacidadi").value.length;
        var cantidade = document.getElementById("txt_filter_capacidade").value.length;
        var pabellon = document.getElementById("spn_filter_pabellon").value;
        

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
        console.log("Filter entro en el pabellon" + pabellon);

        
        $.ajax({

            url: "controlador/mesa.php?" + 
                                            'nombre=' + nombre +
                                            '&detalle=' + detalle +
                                            '&estado=' + estado +
                                            '&cantidadi=' + cantidadi +
                                            '&cantidade=' + cantidade +
                                            '&pabellon=' + pabellon +
                                            '&accion=filter',
            type:"GET",
            success: function(val){
                console.log(val);
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['mesaf']));
                
                for (i in val['mesaf']) {
                    aux = '<td align="center">' + val['mesaf'][i].id + '</td>';
                    aux = aux + '<td align="center">' + val['mesaf'][i].nombre + '</td>';
                    aux = aux + '<td align="center">' + val['mesaf'][i].capacidad + '</td>';
                    aux = aux + '<td align="center">' + val['mesaf'][i].detalle + '</td>';
                    aux = aux + '<td align="center">' + val['mesaf'][i].estado + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info" type="button" onclick="cargarMesa(\'' 
                    + val['mesaf'][i].id + '\',\'' 
                    + val['mesaf'][i].nombre + '\',\'' 
                    + val['mesaf'][i].capacidad + '\',\'' 
                    + val['mesaf'][i].detalle + '\','  
                    + val['mesaf'][i].estado + ','
                    + val['mesaf'][i].pabellon +   
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger" type="button" onclick="cargarEliminarMesa(\''
                    + val['mesaf'][i].id + '\',\''
                    + val['mesaf'][i].nombre +
                    '\')" title="eliminar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tablemesas').DataTable({"deferRender": true,
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
