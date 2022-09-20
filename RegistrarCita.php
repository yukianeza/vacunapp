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
                                    <button type="button" class="btn btn-danger">Buscar</button>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 1</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 2</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 3</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Materno</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Direccion</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
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
                            <label>Buscar por usuario</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger">Buscar</button>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Turno</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">-- Seleccione un turno --</option>
                                    <option>Mañana</option>
                                    <option>Tarde</option>
                                    <option>Noche</option>
                                    <option>Amanecida</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Chabelo</option>
                                    <option>Pepito</option>
                                    <option>Tomas</option>
                                    <option>Esther</option>
                                    <option>Vilma</option>
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
                                        <button type="button" class="btn btn-danger">Buscar</button>
                                    </div>
                                    <!-- /btn-group -->
                                    <input type="text" class="form-control">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 1</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombres 2</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Paterno</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Apellido Materno</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label>Fecha de nacimiento:</label>
                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1"/>
                                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Celular</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telefono</label>
                                <input type="text" class="form-control" id="exampleInputPassword1">
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
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pabellón</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Pabellon A</option>
                                    <option>Pabellón B</option>
                                    <option>Pabellón C</option>
                                    <option>Pabellón D</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mesa</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Mesa A</option>
                                    <option>Mesa B</option>
                                    <option>Mesa C</option>
                                    <option>Mesa D</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vacuna</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">Vacuna A</option>
                                    <option>Vacuna B</option>
                                    <option>Vacuna C</option>
                                    <option>Vacuna D</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Observacion</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
                        <button type="submit" class="btn btn-danger">Registrar</button>
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
<script>



  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
    $('#reservation').daterangepicker()
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservationdate1').datetimepicker({
        format: 'L'
    });
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
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
</script>
</body>
</html>
