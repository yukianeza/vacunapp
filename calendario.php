<?php 

include_once 'templates/header.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="./plugins/moment/moment.min.js"></script>
<script src="./plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>

    //window.onload = function(){getData();}
    function getData(){

        var date1 = new Date()
        var d    = date1.getDate(),
            m    = date1.getMonth(),
            y    = date1.getFullYear()

        var citas_array_test = [];

        $.ajax({
            
            url: "controlador/cita.php?accion=lectura",
            type:"GET",
            success: function(val){
                console.log(val); 
                const output = []
                /*
                for saledetail in all_saledetails:
                curr_saledetail = {
                    'id': saledetail.id,
                    'sale_id': saledetail.sale_id,
                    'product_id': saledetail.product_id,
                    'quantity': saledetail.quantity,
                    'subtotal': saledetail.subtotal,
                    'tax_amount': saledetail.tax_amount,
                }
                output.append(curr_saledetail)


                    var citas_array = {
                        title: "Todos los dias", 
                        start: new Date(y, m, 1), 
                        backgroundColor: '#f56954',
                        borderColor:  '#f56954',
                        allDay : true 
                    }; // Array con 3 elementos
                */

                for(i in val["cita"]){
                    /*var citas = {
                        title: val['cita'][i].dni, 
                        start: new Date(val['cita'][i].fecha),
                        backgroundColor: '#f56954',
                        borderColor:  '#f56954',
                        allDay : false 
                    }*/
                    var citas = {
                        title: "Todos los dias", 
                        start: new Date(y, m, 1), 
                        backgroundColor: '#f56954',
                        borderColor:  '#f56954',
                        allDay : true 
                    };
                    citas_array_test.push(citas);
                }
                return citas_array_test;
            }
        });  
    }

    function getData1(){

        var date1 = new Date()
        var d    = date1.getDate(),
            m    = date1.getMonth(),
            y    = date1.getFullYear()

        var citas_array_test = [];

        $.ajax({
            
            url: "controlador/cita.php?accion=lectura",
            type:"GET",
            success: function(val){
                const output = []

                for(i in val["cita"]){
                    var citas = {
                        title: val['cita'][i].dni, 
                        start: new Date(val['cita'][i].fecha),
                        backgroundColor: '#f56954',
                        borderColor:  '#f56954',
                        allDay : false,
                    }
                    citas_array_test.push(citas);
                }

                var Calendar = FullCalendar.Calendar;
                var calendarEl = document.getElementById('calendar');

                var citas_array = {
                    title: "Todos los dias", 
                    start: new Date(y, m, 1), 
                    backgroundColor: '#f56954',
                    borderColor:  '#f56954',
                    allDay : true 
                }; // Array con 3 elementos
                var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    //Random default events
                    events: citas_array_test,
                    editable  : false,
                    droppable : false, // this allows things to be dropped onto the calendar !!!
                    drop      : function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                    }
                });

                calendar.render();



                //return citas_array_test;
            }
        });  
    }

    $(function () {
    getData1();
    /* initialize the external events
        -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex        : 1070,
            revert        : true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        })

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
        -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------
    

    var citas_array = {
        title: "Todos los dias", 
        start: new Date(y, m, 1), 
        backgroundColor: '#f56954',
        borderColor:  '#f56954',
        allDay : true 
    }; // Array con 3 elementos
    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: [citas_array],
        editable  : false,
        droppable : false, // this allows things to be dropped onto the calendar !!!
        drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
        }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
        })
    })
    $('#add-new-event').click(function (e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
        return
        }

        // Create events
        var event = $('<div />')
        event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
    })
    })
</script>
</body>
</html>
