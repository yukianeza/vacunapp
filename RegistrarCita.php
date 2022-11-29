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
            <h1>Programar Cita</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="citas.php">Citas</a></li>
              <li class="breadcrumb-item active">Programar Cita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mr-2">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form paciente -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Paciente</h3>
                    </div>
                    <!-- /.card-header -->
                    
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <label>Buscar por dni</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger" onclick="buscarDniPaciente()">Buscar</button>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" class="form-control" id="txt_dni">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 1</label>
                                <input type="text" class="form-control" id="txt_nombre1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 2</label>
                                <input type="text" class="form-control" id="txt_nombre2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 3</label>
                                <input type="text" class="form-control" id="txt_nombre3">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="txt_apellido_paterno">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Materno</label>
                                <input type="text" class="form-control" id="txt_apellido_materno">
                            </div>
                            <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control select2" style="width: 100%;" id="txt_genero">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <input type="date" class="form-control" id="txt_fecha_nacimiento"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Direccion</label>
                                <input type="text" class="form-control" id="txt_direccion">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
                <!-- general form trabajador -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del trabajador</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Usuario</label>
                                <select class="form-control select2" style="width: 100%;" id="spn_nombre_usuario">
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <!-- general form responsable -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Responsable</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <label>Buscar por dni</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-danger" onclick="buscarDniResponsable()">Buscar</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="text" class="form-control" id="txt_dni_responsable">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 1</label>
                                <input type="text" class="form-control" id="txt_nombre1_responsable">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 2</label>
                                <input type="text" class="form-control" id="txt_nombre2_responsable">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="txt_apellido_paterno_responsable">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Materno</label>
                                <input type="text" class="form-control" id="txt_apellido_materno_responsable">
                            </div>
                            <div class="form-group">
                                <label>Genero</label>
                                <select class="form-control select2" style="width: 100%;" id="txt_genero_responsable">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <input type="date" class="form-control" id="txt_fecha_nacimiento_responsable"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Celular</label>
                                <input type="text" class="form-control" id="txt_celular_responsable">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telefono</label>
                                <input type="text" class="form-control" id="txt_telefono_responsable">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- general form cita -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Datos de la cita</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Fecha y Hora:</label>
                                <input type="datetime-local" class="form-control" id="txt_fecha_cita"/>
                            </div>
                            <div class="form-group">
                                <label>Mesa</label>
                                <select class="form-control select2" style="width: 100%;" id="txt_mesa">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vacuna - Aplicacion</label>
                                <select class="form-control select2" multiple="multiple" style="width: 100%;" id="txt_vacuna_aplicacion">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Observacion</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="txt_observacion"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-body">
                        <button type="button" class="btn btn-danger" onclick="registrarCita()">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
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
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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

    window.onload = function(){
        getData();
    }

    function getData() {
        getList();
    }

    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });

    function getList(){

        var now = moment().format("YYYY-MM-DD");
        console.log(now);
        document.getElementById("txt_fecha_nacimiento").value = now;
        //txt_genero
        $.ajax({
            url: "controlador/usuario.php?accion=lectura",
            typw: "GET",
            success: function(val){
                console.log(val);
                var cad = "";
                for (i in val['usuario']){
                    aux = "<option value='" + val['usuario'][i].id + "'>" + val['usuario'][i].usuario + "</option>";
                    cad = cad + aux;
                }
                document.getElementById("spn_nombre_usuario").innerHTML = cad;
            }
        });

        $.ajax({
            url: "controlador/genero.php?accion=lectura",
            typw: "GET",
            success: function(val){
                console.log(val);
                var cad = "";
                for (i in val['genero']){
                    aux = "<option value='" + val['genero'][i].id + "'>" + val['genero'][i].descripcion + "</option>";
                    cad = cad + aux;
                }
                document.getElementById("txt_genero").innerHTML = cad;
                document.getElementById("txt_genero_responsable").innerHTML = cad;
            }
        });

        $.ajax({
            url: "controlador/vacuna_aplicacion.php?accion=lectura",
            typw: "GET",
            success: function(val){
                console.log(val);
                var cad = "";
                for (i in val['VacunaAplicacion']){
                    aux = "<option value='" + val['VacunaAplicacion'][i].id + "'>" + val['VacunaAplicacion'][i].vacuna + " - " + val['VacunaAplicacion'][i].aplicacion + "</option>";
                    cad = cad + aux;
                }
                document.getElementById("txt_vacuna_aplicacion").innerHTML = cad;
            }
        });

        $.ajax({
            url: "controlador/mesa.php?accion=lectura",
            typw: "GET",
            success: function(val){
                console.log(val);
                var cad = "";
                for (i in val['mesa']){
                    aux = "<option value='" + val['mesa'][i].id + "'>" + val['mesa'][i].nombre + "</option>";
                    cad = cad + aux;
                }
                document.getElementById("txt_mesa").innerHTML = cad;
            }
        });

    }


    function buscarDniPaciente(){
        console.log("ingreso a buscar dni");
        dni = document.getElementById("txt_dni").value;

        $.ajax({
            url: "controlador/registrarCitaControlador.php?" + 
                                'accion=buscardni' +
                                '&paciente_dni=' + dni,
            type: "GET",
            success: function(val){
                console.log(val);

                for (i in val['paciente']){
                    document.getElementById("txt_nombre1").value = val['paciente'][i].nombre1;
                    document.getElementById("txt_nombre2").value = val['paciente'][i].nombre2;
                    document.getElementById("txt_nombre3").value = val['paciente'][i].nombre3;
                    document.getElementById("txt_apellido_paterno").value = val['paciente'][i].apellido_paterno;
                    document.getElementById("txt_apellido_materno").value = val['paciente'][i].apellido_materno;
                    document.getElementById("txt_fecha_nacimiento").value = val['paciente'][i].fecha_nacimiento;
                    document.getElementById("txt_direccion").value = val['paciente'][i].direccion;
                    console.log(window.location.href);
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                    console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Documento no encontrado'
                    })
                }
        });

    }

  function buscarDniResponsable(){
    console.log("ingreso a buscar dni");
    dni = document.getElementById("txt_dni_responsable").value;

        
    $.ajax({
        url: "controlador/registrarCitaControlador.php?" + 
                            'accion=buscardni' +
                            '&paciente_dni=' + dni,
        type: "GET",
        success: function(val){
            console.log(val);
            if (val['paciente'].length){
                for (i in val['paciente']){
                    document.getElementById("txt_nombre1_responsable").value = val['paciente'][i].nombre1;
                    document.getElementById("txt_nombre2_responsable").value = val['paciente'][i].nombre2;
                    document.getElementById("txt_apellido_paterno_responsable").value = val['paciente'][i].apellido_paterno;
                    document.getElementById("txt_apellido_materno_responsable").value = val['paciente'][i].apellido_materno;
                    document.getElementById("txt_fecha_nacimiento_responsable").value = val['paciente'][i].fecha_nacimiento;
                    document.getElementById("txt_celular_responsable").value = val['paciente'][i].celular;
                    document.getElementById("txt_telefono_responsable").value = val['paciente'][i].telefono;
                }
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Documento no encontrado'
                })
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Documento no encontrado'
                })
            }
    });

  }

  function buscarUsuario(){
    console.log("ingreso a buscar dni");
    dni = document.getElementById("txt_dni_trabajador").value;

        
    $.ajax({
        url: "controlador/registrarCitaControlador.php?" + 
                            'accion=buscardni' +
                            '&paciente_dni=' + dni,
        type: "GET",
        success: function(val){
            console.log(val);
            if (val['paciente'].length){
                for (i in val['paciente']){
                    document.getElementById("txt_nombre1_responsable").value = val['paciente'][i].nombre1;
                    document.getElementById("txt_nombre2_responsable").value = val['paciente'][i].nombre2;
                    document.getElementById("txt_apellido_paterno_responsable").value = val['paciente'][i].apellido_paterno;
                    document.getElementById("txt_apellido_materno_responsable").value = val['paciente'][i].apellido_materno;
                    //document.getElementById("txt_fecha_nacimiento").value = val['paciente'].nombre1;
                    document.getElementById("txt_celular_responsable").value = val['paciente'][i].celular;
                    document.getElementById("txt_telefono_responsable").value = val['paciente'][i].telefono;
                    console.log(window.location.href);
                }
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Documento no encontrado'
                })
            }

        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Documento no encontrado'
                })
            }
    });

  }

  function errorMensaje(mensaje){
    Swal.fire({
        icon: 'warning',
        text: mensaje
    })  
  }



  function registrarCita(){

    var error = "";

    //paciente
    paciente_dni = document.getElementById("txt_dni").value;
    paciente_nombre1 = document.getElementById("txt_nombre1").value;
    paciente_nombre2 = document.getElementById("txt_nombre2").value;
    paciente_nombre3 = document.getElementById("txt_nombre3").value;
    paciente_genero = document.getElementById("txt_genero").value;
    paciente_apellido_paterno = document.getElementById("txt_apellido_paterno").value;
    paciente_apellido_materno = document.getElementById("txt_apellido_materno").value;
    paciente_fecha_nacimiento = document.getElementById("txt_fecha_nacimiento").value;
    paciente_direccion = document.getElementById("txt_direccion").value;
    //paciente_fecha_nacimiento = paciente_fecha_nacimiento.replaceAll("/","-");

    if (paciente_dni.length == 0  || paciente_dni.length != 8 ){
        error = "Campo dni no vacio o excede los 8 digitos permitido en paciente";
    }
    if( paciente_nombre1.length == 0 ) {
        error = error + " - Campo nombre 1 se encuenta vacio en paciente";
    } 
    if ( paciente_apellido_paterno.length == 0 ) { 
        error =  error + " - Campo apellido paterno esta vacio en paciente";
    }
    if ( paciente_apellido_materno.length == 0 ) {
        error = error + " - Campo apellido materno esta vacio en paciente"
    }
    
    console.log(paciente_dni);
    console.log(paciente_nombre1);
    console.log(paciente_nombre2);
    console.log(paciente_nombre3);
    console.log(paciente_apellido_paterno);
    console.log(paciente_apellido_materno);
    console.log(paciente_fecha_nacimiento);
    console.log(paciente_direccion);

    //trabajador
    trabajador_usuario = document.getElementById("spn_nombre_usuario").value;

    console.log(trabajador_usuario);

    //responsable
    responsable_dni = document.getElementById("txt_dni_responsable").value;
    responsable_nombre1 = document.getElementById("txt_nombre1_responsable").value;
    responsable_nombre2 = document.getElementById("txt_nombre2_responsable").value;
    responsable_genero = document.getElementById("txt_genero_responsable").value;
    responsable_apellido_paterno = document.getElementById("txt_apellido_paterno_responsable").value;
    responsable_apellido_materno = document.getElementById("txt_apellido_materno_responsable").value;
    responsable_fecha_nacimiento = document.getElementById("txt_fecha_nacimiento_responsable").value;
    responsable_celular = document.getElementById("txt_celular_responsable").value;
    responsable_telefono = document.getElementById("txt_telefono_responsable").value;
    //responsable_fecha_nacimiento = responsable_fecha_nacimiento.replaceAll("/","-");

    if (responsable_dni.length == 0  || paciente_dni.length != 8 ){
        error = error + " - Campo dni no vacio o excede los 8 digitos permitido en responsable";
    }
    if( responsable_nombre1.length == 0 ) {
        error = error + " - Campo nombre 1 se encuenta vacio en responsable";
    }
    if( responsable_apellido_paterno.length == 0 ) {
        error = error + " - Campo apellido paterno se encuenta vacio en responsable";
    }
    if( responsable_apellido_paterno.length == 0 ) {
        error = error + " - Campo apellido materno se encuenta vacio en responsable";
    }

    console.log(responsable_dni);
    console.log(responsable_nombre1);
    console.log(responsable_nombre2);
    console.log(responsable_apellido_paterno);
    console.log(responsable_apellido_materno);
    console.log(responsable_fecha_nacimiento);
    console.log(responsable_celular);
    console.log(responsable_telefono);

    //Cita
    cita_fecha = document.getElementById("txt_fecha_cita").value;
    cita_mesa = document.getElementById("txt_mesa").value;
    cita_vacuna_aplicacion = $("#txt_vacuna_aplicacion").val();
    cita_observacion = document.getElementById("txt_observacion").value;
    //cita_fecha = cita_fecha.replaceAll("/","-");
    console.log(cita_fecha);

    if (cita_fecha.length == 0) {
        error = error + " - Campo fecha de la cita se encuenta vacio";
    }

    if (error != ""){
        alert(error);
        return;
    }

    lista_vacuna = "";
    for (i=0; i<cita_vacuna_aplicacion.length; i++){
        console.log(cita_vacuna_aplicacion[i]);
        lista_vacuna=lista_vacuna + cita_vacuna_aplicacion[i] + ",";
    }

    console.log(cita_vacuna_aplicacion);
    
    $.ajax({
        url: "controlador/registrarCitaControlador.php?responsable_dni="+responsable_dni+
                                "&accion=agregar"
                                +"&responsable_nombre1="+responsable_nombre1
                                +"&responsable_nombre2="+responsable_nombre2
                                +"&responsable_apellido_paterno="+responsable_apellido_paterno
                                +"&responsable_apellido_materno="+responsable_apellido_materno
                                +"&responsable_genero="+responsable_genero
                                +"&responsable_fecha_nacimiento="+responsable_fecha_nacimiento
                                +"&responsable_celular="+responsable_celular
                                +"&responsable_telefono="+responsable_telefono
                                +"&paciente_dni="+paciente_dni
                                +"&paciente_nombre1="+paciente_nombre1
                                +"&paciente_nombre2="+paciente_nombre2
                                +"&paciente_nombre3="+paciente_nombre3
                                +"&paciente_apellido_paterno="+paciente_apellido_paterno
                                +"&paciente_apellido_materno="+paciente_apellido_materno
                                +"&paciente_genero="+paciente_genero
                                +"&paciente_fecha_nacimiento="+paciente_fecha_nacimiento
                                +"&trabajador_usuario="+trabajador_usuario
                                +"&cita_fecha="+cita_fecha
                                +"&cita_mesa="+cita_mesa
                                +"&cita_vacuna_aplicacion="+cita_vacuna_aplicacion
                                +"&cita_observacion="+cita_observacion,
        type: "GET",
        success: function(val){
            console.log("entro");
            console.log(val);
            idcita = val["idcita"].idcita;
            // Insertar en la tabla cita vacuna_aplicacion
            for (i=0; i<cita_vacuna_aplicacion.length; i++){
                console.log(cita_vacuna_aplicacion[i]);
                $.ajax({
                    url: "controlador/registrarCitaControlador.php?idcita=" + idcita + "&accion=agregarvacuna" + "&vacuna=" +cita_vacuna_aplicacion[i],
                    type: "GET",
                    success: function(val){

                        estado = val['mensaje'].mensaje;

                        if (estado == 'OK'){
                            var message = 'Se registro exitosamente!!!';
                            console.log("se registro correctamente");
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
                        }
                        else{
                            var message = 'Algo salio mal !!';
                            console.log("mensaje de registrar ");
                            console.log(estado);
                            Swal.fire({
                                title: message,
                                icon: 'error'
                            });
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);        
                    }
                })

            }
            //sms
            console.log("entro en result");

            /*
            window.location.href= "enviarSMS.php?responsable_dni="+responsable_dni
                                                +"&responsable_nombre1="+responsable_nombre1
                                                +"&responsable_nombre2="+responsable_nombre2
                                                +"&responsable_apellido_paterno="+responsable_apellido_paterno
                                                +"&responsable_apellido_materno="+responsable_apellido_materno
                                                +"&responsable_genero="+responsable_genero
                                                +"&responsable_fecha_nacimiento="+responsable_fecha_nacimiento
                                                +"&responsable_celular="+responsable_celular
                                                +"&responsable_telefono="+responsable_telefono
                                                +"&paciente_dni="+paciente_dni
                                                +"&paciente_nombre1="+paciente_nombre1
                                                +"&paciente_nombre2="+paciente_nombre2
                                                +"&paciente_nombre3="+paciente_nombre3
                                                +"&paciente_apellido_paterno="+paciente_apellido_paterno
                                                +"&paciente_apellido_materno="+paciente_apellido_materno
                                                +"&paciente_genero="+paciente_genero
                                                +"&paciente_fecha_nacimiento="+paciente_fecha_nacimiento
                                                +"&trabajador_usuario="+trabajador_usuario
                                                +"&cita_fecha="+cita_fecha
                                                +"&cita_mesa="+cita_mesa
                                                +"&cita_vacuna_aplicacion="+cita_vacuna_aplicacion
                                                +"&cita_observacion="+cita_observacion;*/
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
    })
    }
    



</script>
</body>
</html>
