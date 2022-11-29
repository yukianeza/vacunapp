<?php 

include_once 'templates/header.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Porcentaje de cumplimiento de citas de vacunación</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg" id='label_citas_incumplidas'>0</span>
                    <span>Citas incumplidas</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="bar-chart" height="200"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Porcentaje del cumplimiento de la cobertura de vacunacion Test</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">%0</span>
                    <span>Total de niños vacunados</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="bar-chart2" height="200"></canvas>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/fullcalendar/main.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>

<script>
  
  window.onload = function(){
    getData();
    getData1();
  }

  function getData(){
    var today = new Date();
    var year = today.getFullYear(); 
    
    $.ajax({
      url: "controlador/dashboard.php?accion=lectura&anio="+year,
      type: "GET",
      success: function(val){
        console.log(val['dashboard']);
        new Chart(document.getElementById("bar-chart"), {
          type: 'bar',
          data: {
            labels: ["Enero", "Febrero", "Marzo", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
          "Setiembre", "Octubre", "Noviembre", "Diciembre"],
            datasets: [
              {
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: [val['dashboard'][0].cantidad,
                       val['dashboard'][1].cantidad,
                       val['dashboard'][2].cantidad,
                       val['dashboard'][3].cantidad,
                       val['dashboard'][4].cantidad,
                       val['dashboard'][5].cantidad,
                       val['dashboard'][6].cantidad,
                       val['dashboard'][7].cantidad,
                       val['dashboard'][8].cantidad,
                       val['dashboard'][9].cantidad,
                       val['dashboard'][10].cantidad,
                       val['dashboard'][11].cantidad]
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: 'Cantidad de cumplimiento de citas de vacunación'
            }
          }
        });
      },error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
    })
  }

  function getData1(){
    var today = new Date();
    var year = today.getFullYear(); 
    
    $.ajax({
      url: "controlador/dashboard.php?accion=lectura2&anio="+year,
      type: "GET",
      success: function(val){
        console.log(val['dashboard']);
        new Chart(document.getElementById("bar-chart2"), {
          type: 'bar',
          data: {
            labels: ["Enero", "Febrero", "Marzo", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
          "Setiembre", "Octubre", "Noviembre", "Diciembre"],
            datasets: [
              {
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: [val['dashboard'][0].cantidad,
                       val['dashboard'][1].cantidad,
                       val['dashboard'][2].cantidad,
                       val['dashboard'][3].cantidad,
                       val['dashboard'][4].cantidad,
                       val['dashboard'][5].cantidad,
                       val['dashboard'][6].cantidad,
                       val['dashboard'][7].cantidad,
                       val['dashboard'][8].cantidad,
                       val['dashboard'][9].cantidad,
                       val['dashboard'][10].cantidad,
                       val['dashboard'][11].cantidad]
              }
            ]
          },
          options: {
            legend: { display: false },
            title: {
              display: true,
              text: 'Cantidad de cumplimiento de citas de vacunación'
            }
          }
        });
      },error: function(XMLHttpRequest, textStatus, errorThrown){
                console.log("Algo salio mal gg " + textStatus + " este thrown " + errorThrown + " el 1 " + XMLHttpRequest.responseText);
            }
    })
  }

</script>


</body>
</html>
