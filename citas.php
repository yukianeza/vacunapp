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
            <h1>Citas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Cita</li>
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
                        <label>DNI</label>
                        <input type="text" class="form-control" id="txt_filter_dni"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="custom-select" id="spn_filter_estado">
                            <option value="%" selected>Todos</option>
                            <option value="1">Creado</option>
                            <option value="2">Realizado</option>
                            <option value="3">Reprogramado</option>
                            <option value="4">Cancelado</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Desde:</label>
                        <input type="datetime-local" class="form-control" id="txt_filter_fechai"/>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Hasta:</label>
                        <input type="datetime-local" class="form-control" id="txt_filter_fechae"/>
                    </div>
                </div>
                <!-- /.col -->
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer text-center">
            <button type="button" class="btn btn-success" onclick="cargarFiltroCita()">Filtrar</button>
          </div>
        </div>
        <!-- /.card -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="RegistrarCita.php" type="button" class="btn btn-primary">Registrar nueva cita</a>
              </div>
              <div class="card-body">
                <table id="tablepabellones" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fecha y Hora</th>
                    <th>DNI Paciente</th>
                    <th>Paciente</th>
                    <th>DNI Responsable</th>
                    <th>Responsable</th>
                    <th>Estado</th>
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
<!-- Modificar Pabellon -->
<div class="modal fade" id="itemModal1" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Postergar Cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="text" class="form-control" id="txt_mod_codigo" hidden/>
            <div class="modal-body">
                <div class="form-group">
                    <label>Fecha:</label>
                    <input type="datetime-local" class="form-control" id="txt_mod_fecha"/>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary"
                    onclick="postergarCita();"
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
                <h5 class="modal-title" id="itemModalLabel">Cancelar Cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="txt_del_codigo" hidden>    
                    <label>??Seguro que deseas cancelar la cita?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary"
                    onclick="cancelarCita()"
                    data-dismiss="modal">Si</button>
            </div>
        </div>
    </div>
</div>

<!-- Eliminar Pabellon -->
<div class="modal fade" id="closeCitaModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Concluir Cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="txt_aten_codigo" hidden>    
                    <label>??Estas seguro de cambiar de estado a Realizado?</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary"
                    onclick="concluirCita()"
                    data-dismiss="modal">Si</button>
            </div>
        </div>
    </div>
</div>

<!-- Detalle Cita -->
<div class="modal fade" id="DetalleCitaModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="itemModalLabel">Detalle de la cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" id="txt_det_codigo" hidden>    
                    <label>Fecha de la cita: </label>
                    <input class="form-control" type="datetime-local" id="txt_det_fecha_cita" readonly>
                    <label>Estado de la cita:</label>
                    <input class="form-control" type="text" id="txt_det_estado" readonly>
                    <label>DNI paciente:</label>
                    <input class="form-control" type="text" id="txt_det_dni_paciente" readonly>
                    <label>Nombre y apellidos del paciente:</label>
                    <input class="form-control" type="text" id="txt_det_paciente" readonly>
                    <label>DNI Responsable:</label>
                    <input class="form-control" type="text" id="txt_det_dni_responsable" readonly>
                    <label>Nombre y apellido del responsable:</label>
                    <input class="form-control" type="text" id="txt_det_responsable" readonly>
                    <label>Celular (SMS):</label>
                    <input class="form-control" type="text" id="txt_det_celular" readonly>
                    <label>Usuario:</label>
                    <input class="form-control" type="text" id="txt_det_usuario" readonly><br>
                    <label>VACUNAS PROGRAMADAS:</label><br>
                    <div id="bodyVacuna">
                        <span>No hay vacunas registradas</span>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="atenderCita()">Atender Cita</button>
                    <label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary"
                    
                    data-dismiss="modal">Si</button>
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
                                                "sEmptyTable":     "Ning??n dato disponible en esta tabla",
                                                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                                "sInfoPostFix":    "",
                                                "sSearch":         "Buscar:",
                                                "searchPlaceholder": "Escriba aqu??..",
                                                "sUrl":            "",
                                                "sInfoThousands":  ",",
                                                "oPaginate": {
                                                    "sFirst":    "Primero",
                                                    "sLast":     "??ltimo",
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
                                            "order": [[ 0, 'desc' ]]
                                        });


  

    //Cuando incia la pagina
    window.onload = function(){
        getData();
    }

    function getData() {
        getCita();
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

    function getCita(){
        $.ajax({
            url: "controlador/cita.php?accion=getlista",
            type: "GET",
            success: function(val){
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['cita']));

                for (i in val['cita']) {
                    aux = '<td align="center">' + val['cita'][i].id + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].fecha + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].dni_paciente + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].paciente + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].dni_responsable + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].responsable + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].estado + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="cargarModificarCita(\'' 
                    + val['cita'][i].id + '\',\'' 
                    + val['cita'][i].fecha + '\''
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger btn-styles" type="button" onclick="cargarCancelarCita(\''
                    + val['cita'][i].id + '\',\''
                    + val['cita'][i].estado +
                    '\')" title="cancelar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="enviarMensaje(\'' 
                    + val['cita'][i].fecha + '\',\'' 
                    + val['cita'][i].dni_paciente + '\',\'' 
                    + val['cita'][i].dni_responsable + '\''  
                    + ')" title="reenviar sms"><i class="fa fa-sms"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="verDetalle(\'' 
                    + val['cita'][i].id +'\',\'' 
                    + val['cita'][i].fecha + '\',\'' 
                    + val['cita'][i].dni_paciente + '\',\'' 
                    + val['cita'][i].dni_responsable + '\''  
                    + ')" data-toggle="modal" data-target="#DetalleCitaModal" title="ver detalle de la cita"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="cambiarAtendido(\'' 
                    + val['cita'][i].id + '\''
                    + ')" data-toggle="modal" data-target="#closeCitaModal" title="cambiar a Realizado"><i class="fa fa-edit"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tablepabellones').DataTable({"deferRender": true,
                                                "language": {
                                                    "sProcessing":     "",
                                                    "sLengthMenu":     "Mostrar _MENU_ registros",
                                                    "sZeroRecords":    "No se encontraron resultados",
                                                    "sEmptyTable":     "Ning??n dato disponible en esta tabla",
                                                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                                    "sInfoPostFix":    "",
                                                    "sSearch":         "Buscar:",
                                                    "searchPlaceholder": "Escriba aqu??..",
                                                    "sUrl":            "",
                                                    "sInfoThousands":  ",",
                                                    "oPaginate": {
                                                        "sFirst":    "Primero",
                                                        "sLast":     "??ltimo",
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
                                                "order": [[ 0, 'desc' ]]
                                            });


                console.log("Entro en el ajax");
            }
        });
    }

    $('#reservation').daterangepicker()
  

    //seteo de modales
    function cargarModificarCita(id, fecha  ) {
        document.getElementById("txt_mod_codigo").value = id;
        document.getElementById("txt_mod_fecha").value = fecha;
    };

    function cargarCancelarCita(id, estado) {
        document.getElementById("txt_del_codigo").value = id;
    };

    function cambiarAtendido(id){
        document.getElementById("txt_aten_codigo").value = id
    };

    function cancelarCita(){
      var codigo = document.getElementById("txt_del_codigo").value;

              $.ajax({
            url: "controlador/cita.php?codigo=" + codigo + '&accion=cancelar',
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
    };

    function postergarCita(){
        var codigo = document.getElementById("txt_mod_codigo").value;
        var fecha = document.getElementById("txt_mod_fecha").value;
        console.log(fecha);
        console.log(codigo);
      console.log("postergar cita");
        $.ajax({
            url: "controlador/cita.php?codigo=" + codigo + "&fecha=" + fecha + '&accion=postergar',
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
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        });
    };

    function concluirCita(){
      var codigo = document.getElementById("txt_aten_codigo").value;
      console.log(codigo);
      $.ajax({
            url: "controlador/cita.php?codigo=" + codigo + '&accion=concluir',
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
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        });

    };

    function atenderCita(){
        id = document.getElementById("txt_det_codigo").value;

        console.log(id)
        console.log("-- ATENDER CITA --");

        localStorage.setItem("atender_cita",id);

        window.location.href = "./atenderCita.php";
        

    };

    function verDetalle(id, fecha_cita, dni_paciente, dni_responsable){
        document.getElementById("txt_det_fecha_cita").value = id;   
        document.getElementById("txt_det_dni_paciente").value = dni_paciente;   
        document.getElementById("txt_det_dni_responsable").value = dni_responsable;
        console.log("entro a ver detalle");
        
        $.ajax({
            url: "controlador/cita.php?accion=detalle&cita=" + id,
            type: "GET",
            success: function(val){

                var id = val['cita'][0].id;
                var fecha_programada = val['cita'][0].fecha_programada;
                console.log(fecha_programada);
                var estado = val['cita'][0].estado;
                var paciente_dni = val['cita'][0].paciente_dni;
                var paciente = val['cita'][0].paciente;
                var responsable_dni = val['cita'][0].responsable_dni;
                var responsable = val['cita'][0].responsable;
                var celular = val['cita'][0].celular;
                var usuario = val['cita'][0].usuario;

                document.getElementById("txt_det_codigo").value = id;
                document.getElementById("txt_det_fecha_cita").value = fecha_programada;
                document.getElementById("txt_det_estado").value = estado;
                document.getElementById("txt_det_dni_paciente").value = paciente_dni;
                document.getElementById("txt_det_paciente").value = paciente;
                document.getElementById("txt_det_dni_responsable").value = responsable_dni;
                document.getElementById("txt_det_responsable").value = responsable;
                document.getElementById("txt_det_celular").value = celular;
                document.getElementById("txt_det_usuario").value = usuario;
                
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        })

        $.ajax({
            url: "controlador/cita.php?accion=vacuna&cita=" + id,
            type: "GET",
            success: function(val){
                console.log(val);
                console.log(id);
                var cad = "";
                for (i in val["cita"]){
                    aux = "<span class='badge bg-primary' style='font-size: 0.9rem;'>" + val["cita"][i].vacunas + "</span>";
                    cad = cad + aux ;
                }

                document.getElementById("bodyVacuna").innerHTML = cad;

            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
        })


        //verDetalle('2022-10-29 11:48:09','74135021','74135021')
    }

    function enviarMensaje(fecha, dni_paciente, dni_responsable){
      window.location.href= "enviarSMS.php?responsable_dni="+dni_responsable
                                                            +"&paciente_dni="+dni_paciente
                                                            +"&cita_fecha="+fecha;
    }

    function cargarFiltroCita(){

        var dni = document.getElementById("txt_filter_dni").value.length;
        var estado = document.getElementById("spn_filter_estado").value.length;
        var fechai = document.getElementById("txt_filter_fechai").value.length;
        var fechae = document.getElementById("txt_filter_fechae").value.length;
        

        if(dni == 0){
          dni = "%";
        }else {
          dni = document.getElementById("txt_filter_dni").value;
        }
        if(estado == 0){
          estado= "%";
        }else {
          estado = document.getElementById("spn_filter_estado").value;
        }
        if(fechai == 0){
          fechai = "1999-01-01";
        }else {
          fechai = document.getElementById("txt_filter_fechai").value;
        }
        if(fechae == 0){
          fechae = "2999-01-01";
        }else {
          fechae = document.getElementById("txt_filter_fechae").value;
        }

        console.log(dni);
        console.log(estado);
        console.log(fechai);
        console.log(fechae);
        /*
        var nombre = document.getElementById("txt_filter_nombre").value;
        var capacidad = document.getElementById("txt_filter_capacidad").value;
        var detalle = document.getElementById("txt_filter_detalle").value;
        var estado = document.getElementById("txt_filter_estado").value;
        var cantidadi = document.getElementById("txt_filter_capacidadi").value;
        var cantidade = document.getElementById("txt_filter_capacidade").value;
        */
        console.log("Filter entro en el dni" + dni);
        console.log("Filter entro en el estado" + estado);
        console.log("Filter entro en el fechai" + fechai);
        console.log("Filter entro en el fechae" + fechae);
        
        $.ajax({

            url: "controlador/cita.php?" + 
                                            'dni=' + dni +
                                            '&estado=' + estado +
                                            '&fechai=' + fechai +
                                            '&fechae=' + fechae +
                                            '&accion=filter',
            type:"GET",
            success: function(val){
                if (val['cita'] === null){
                  console.log("no hay data")
                }
                else {
                  console.log("si hay data")
                
                datatable.destroy();
                var cad = "";
                console.log("Entro en el ajax 1" + Object.values(val['cita']));
                
                for (i in val['cita']) {
                    aux = '<td align="center">' + val['cita'][i].fecha + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].dni_paciente + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].paciente + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].dni_responsable + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].responsable + '</td>';
                    aux = aux + '<td align="center">' + val['cita'][i].estado + '</td>';
                    aux = aux + '<td class="text-center" >';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="cargarModificarCita(\'' 
                    + val['cita'][i].id + '\',\'' 
                    + val['cita'][i].fecha + '\'' 
                    + ')" data-toggle="modal" data-target="#itemModal1" title="modificar"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-danger btn-styles" type="button" onclick="cargarCancelarCita(\''
                    + val['cita'][i].id + '\',\''
                    + val['cita'][i].estado +
                    '\')" title="cancelar" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="enviarMensaje(\'' 
                    + val['cita'][i].fecha + '\',\'' 
                    + val['cita'][i].dni_paciente + '\',\'' 
                    + val['cita'][i].dni_responsable + '\''  
                    + ')" title="reenviar sms"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="verDetalle(\'' 
                    + val['cita'][i].id +'\',\'' 
                    + val['cita'][i].fecha + '\',\'' 
                    + val['cita'][i].dni_paciente + '\',\'' 
                    + val['cita'][i].dni_responsable + '\''  
                    + ')" data-toggle="modal" data-target="#itemModal1" title="ver detalle de la cita"><i class="fa fa-edit"></i></button>';
                    aux = aux + ' ';
                    aux = aux + '<button class="btn btn-info btn-styles" type="button" onclick="cambiarAtendido(\'' 
                    + val['cita'][i].id + '\''
                    + ')" data-toggle="modal" data-target="#closeCitaModal" title="cambiar a Realizado"><i class="fa fa-edit"></i></button>';
                    aux = aux + '</td>';

                    cad = cad  + '<tr>' + aux + '</tr>';
                }
                

                document.getElementById("gridbody").innerHTML = cad;

                datatable = $('#tablepabellones').DataTable({"deferRender": true,
                                                "language": {
                                                    "sProcessing":     "",
                                                    "sLengthMenu":     "Mostrar _MENU_ registros",
                                                    "sZeroRecords":    "No se encontraron resultados",
                                                    "sEmptyTable":     "Ning??n dato disponible en esta tabla",
                                                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                                                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                                                    "sInfoPostFix":    "",
                                                    "sSearch":         "Buscar:",
                                                    "searchPlaceholder": "Escriba aqu??..",
                                                    "sUrl":            "",
                                                    "sInfoThousands":  ",",
                                                    "oPaginate": {
                                                        "sFirst":    "Primero",
                                                        "sLast":     "??ltimo",
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
                                                "order": [[ 0, 'desc' ]]
                                            });

                }
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
