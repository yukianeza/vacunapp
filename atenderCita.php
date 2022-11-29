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
            <h1>Historial Cita</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="citas.php">Citas</a></li>
              <li class="breadcrumb-item active">Atender Cita</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content mr-2">
      <div class="container-fluid">
        <!-- Timeline -->

        <!-- /.card -->

        <div class="row">
          <div class="col-12">
            <div class="timeline">
                <div class="timeline">
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-red" id="fecha de atencion">Registro de Cita</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">

                            <h3 class="timeline-header">Detalle de la cita</h3>
                            <div class="timeline-body">
                                <input class="form-control" type="text" id="txt_det_codigo" hidden>
                                <input class="form-control" type="text" id="txt_det_codigo_paciente" hidden>    
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
                            </div>
                        </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                        <span class="bg-green" id="atencion_hora">CRED</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">CRED - Fecha actualizado: <label id="fecha_actualizacion"></label> </h3>
                            <div class="timeline-body" id="cred_cita">
                                <label>Talla: </label>
                                <input class="form-control" type="texr" id="txt_talla" >
                                <label>Peso: </label>
                                <input class="form-control" type="text" id="txt_peso" >
                                <br>
                                <div class="form-group">
                                    <label>Pe: </label>
                                    <select class="custom-select" id="txt_pe">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Te: </label>
                                    <select class="custom-select" id="txt_te">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pt: </label>
                                    <select class="custom-select" id="txt_pt">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Desarrollo: </label>
                                    <select class="custom-select" id="txt_desarrollo">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <label>Res. Hab: </label>
                                <input class="form-control" type="text" id="txt_reshab" >
                                <br>
                                <div class="form-group">
                                    <label>Seguro: </label>
                                    <select class="custom-select" id="txt_seguro">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Anemia: </label>
                                    <select class="custom-select" id="txt_anemia">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Profilax: </label>
                                    <select class="custom-select" id="txt_profilax">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>
                            <div class="timeline-footer">
                                <button type="button" id="btn_cred" class="btn btn-sm bg-maroon" onclick="actualizarCred()">Guardar</button>
                            </div>
                        </div>       
                    </div>

                    <div class="time-label">
                        <span class="bg-green" id="atencion_hora">Vacuna</span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">Aplicacion de vacunas</h3>
                            <div class="timeline-body" id="cred_vacuna_cita">
                                <div class="form-group">
                                    <label>Vacuna 1</label>
                                    <select class="form-control" id="txt_filter_estado">
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                        <option value="3" selected>Ambos</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Vacuna 2</label>
                                    <select class="form-control" id="txt_filter_estado">
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                        <option value="3" selected>Ambos</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Vacuna 3</label>
                                    <select class="form-control" id="txt_filter_estado">
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                        <option value="3" selected>Ambos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="timeline-footer">
                                <button type="button" id="btn_vacunas" class="btn btn-sm bg-maroon" onclick="actualizarVacunas()">Guardar</button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="time-label">
                        <span class="bg-red" id="fecha de atencion">Finalizar</span>
                    </div>
                    <div>
                        <i class="fas fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header">Opciones Cita</h3>
                            <div class="timeline-body">
                                <button class="btn btn-success" id="btn_finalizar" onclick="finalizarCita()">Finalizar Cita</button>
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
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

    var id = '';

    var vacunas_array = [];

    window.onload = function(){
        
        if (localStorage.getItem("atender_cita")){
            id = localStorage.getItem("atender_cita");
        }else {
            id = '0';
        }
        
        getData();
        
    }

    function getData() {
        console.log("Entro al getData");
        console.log(id);
        var id_cita = id;
        if (id_cita == '') {
            return;
        }
        
        $.when(
            $.ajax({
                url: "controlador/cita.php?accion=atender&cita=" + id_cita,
                type: "get"
            }),
            $.ajax({
                url: "controlador/cita.php?accion=vacunacita&cita=" + id_cita,
                type: "get"
            })
        )
        .done(function(cita, vacunas){
            
            console.log(cita);
            console.log(cita[0]['cita'][0]);

            document.getElementById("txt_det_codigo_paciente").value = cita[0]['cita'][0].idpaciente;

            document.getElementById("txt_det_codigo").value = cita[0]['cita'][0].id;
            document.getElementById("txt_det_fecha_cita").value = cita[0]['cita'][0].fecha_programada;
            document.getElementById("txt_det_estado").value = cita[0]['cita'][0].estado;
            document.getElementById("txt_det_dni_paciente").value = cita[0]['cita'][0].paciente_dni;
            document.getElementById("txt_det_paciente").value = cita[0]['cita'][0].paciente;
            document.getElementById("txt_det_dni_responsable").value = cita[0]['cita'][0].responsable_dni;
            document.getElementById("txt_det_responsable").value = cita[0]['cita'][0].responsable;
            document.getElementById("txt_det_celular").value = cita[0]['cita'][0].celular;
            document.getElementById("txt_det_usuario").value = cita[0]['cita'][0].usuario;

            document.querySelector('#fecha_actualizacion').innerText = cita[0]['cita'][0].fecha_actualizacion;
            document.getElementById("txt_talla").value = cita[0]['cita'][0].talla;
            document.getElementById("txt_peso").value = cita[0]['cita'][0].peso;
            document.getElementById("txt_pe").value = cita[0]['cita'][0].pe;
            document.getElementById("txt_te").value = cita[0]['cita'][0].te;
            document.getElementById("txt_pt").value = cita[0]['cita'][0].pt;
            document.getElementById("txt_desarrollo").value = cita[0]['cita'][0].desarrollo;
            document.getElementById("txt_reshab").value = cita[0]['cita'][0].reshab;
            document.getElementById("txt_seguro").value = cita[0]['cita'][0].seguro;
            document.getElementById("txt_anemia").value = cita[0]['cita'][0].anemia;
            document.getElementById("txt_profilax").value = cita[0]['cita'][0].profilax;

            console.log(typeof(cita[0]['cita'][0].estado));
            console.log(cita[0]['cita'][0].estado);

            if(cita[0]['cita'][0].estado == 'Realizado'){
                console.log("bloquea");
                //document.getElementById("myText").readOnly = true;
                //$('#yourSelect').prop('disabled', true);
                document.getElementById("txt_det_codigo").readOnly = true;
                document.getElementById("txt_det_fecha_cita").readOnly = true;
                document.getElementById("txt_det_estado").readOnly = true;
                document.getElementById("txt_det_dni_paciente").readOnly = true;
                document.getElementById("txt_det_paciente").readOnly = true;
                document.getElementById("txt_det_dni_responsable").readOnly = true;
                document.getElementById("txt_det_responsable").readOnly = true;
                document.getElementById("txt_det_celular").readOnly = true;
                document.getElementById("txt_det_usuario").readOnly = true;

                document.getElementById("txt_talla").readOnly = true;
                document.getElementById("txt_peso").readOnly = true;
                $('#txt_pe').prop('disabled', true);
                $('#txt_te').prop('disabled', true);
                $('#txt_pt').prop('disabled', true);
                $('#txt_desarrollo').prop('disabled', true);
                $('#txt_seguro').prop('disabled', true);
                $('#txt_anemia').prop('disabled', true);
                $('#txt_profilax').prop('disabled', true);
                document.getElementById("txt_reshab").readOnly = true;
                $('#btn_cred').prop('disabled', true);
                $('#btn_vacunas').prop('disabled', true);
                $('#btn_finalizar').prop('disabled', true);
                //btn_finalizar
            }

            console.log(vacunas);
            var cad = '';
            for(i in vacunas[0]['cita']){
                
                console.log(vacunas[0]['cita'][i]);
                aux = '<div class="form-group">' + 
                        '<label>' + vacunas[0]['cita'][i].vacunas + '</label>' +
                        '<select class="form-control" id="txt_vacuna_' + vacunas[0]['cita'][i].id + '">' +
                            '<option value="0">No</option>' +
                            '<option value="1">Si</option>' +
                        '</select>' +
                      '</div>';

                cad = cad + aux;
            }

            document.getElementById("cred_vacuna_cita").innerHTML = cad;

            for(i in vacunas[0]['cita']){
                
                console.log(vacunas[0]['cita'][i]);
                var id_label = "txt_vacuna_" + vacunas[0]['cita'][i].id
                document.getElementById(id_label).value = vacunas[0]['cita'][i].aplico ;
                var vacuna = {
                    id: vacunas[0]['cita'][i].id,
                    etiqueta: 'txt_vacuna_' + vacunas[0]['cita'][i].id
                };
                vacunas_array.push(vacuna);

                //validar estado
                if (cita[0]['cita'][0].estado == 'Realizado'){
                    $('#'+id_label).prop('disabled', true);
                }

            }

        })


    }

    function actualizarCred(){
        console.log("-- ACTUALIZAR DATOS CRED --");
        var talla = document.getElementById("txt_talla").value;
        var peso = document.getElementById("txt_peso").value;
        var pe = document.getElementById("txt_pe").value;
        var te = document.getElementById("txt_te").value;
        var pt = document.getElementById("txt_pt").value;
        var desarrollo = document.getElementById("txt_desarrollo").value;
        var reshab = document.getElementById("txt_reshab").value;
        var seguro = document.getElementById("txt_seguro").value;
        var anemia = document.getElementById("txt_anemia").value;
        var profilax = document.getElementById("txt_profilax").value;
        var paciente_id = document.getElementById("txt_det_codigo_paciente").value;

        var id_cita = id;

        $.ajax({
            url: "controlador/cita.php?accion=actualizarCrud&cita=" + 
            id_cita + "&talla="+talla+"&peso="+peso+"&pe="+pe+"&te="+te+"&pt="+pt+
            "&desarrollo="+desarrollo+"&reshab="+reshab+"&seguro="+seguro+
            "&anemia="+anemia+"&profilax="+profilax+"&paciente_id="+paciente_id,
            type: "get",
            success: function(val){
                console.log(val);
                Swal.fire({
                    text: val['mensaje'].mensaje,
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
        })
    }

    function actualizarVacunas(){
        console.log("-- ACTUALIZAR DATOS VACUNAS --");
        console.log(vacunas_array);
        var id_cita = id
        var json = JSON.stringify(vacunas_array);
        var vacuna_modify = [];

        for( i in vacunas_array ){
            var vacuna_index = {
                id: vacunas_array[i].id,
                valor: document.getElementById(vacunas_array[i].etiqueta).value    
            }
            vacuna_modify.push(vacuna_index);
        }
        var json = JSON.stringify(vacuna_modify);
        console.log(json);
        $.ajax({
            url: "controlador/cita.php?accion=actualizarVacunas&cita=" + id_cita+"&json="+json,
            type: "get",
            success: function(val){
                console.log(val);
                Swal.fire({
                    text: val['mensaje'].mensaje,
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
        })

    }

    function finalizarCita(){
        console.log("-- Finalizar Cita --");
        var id_cita = id;
        $.ajax({
            url: "controlador/cita.php?accion=finalizarCita&cita="+id_cita,
            type: "get",
            success: function(val){
                console.log(val);
                Swal.fire({
                    text: val['mensaje'].mensaje,
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
        })
    }

</script>
</body>
</html>
