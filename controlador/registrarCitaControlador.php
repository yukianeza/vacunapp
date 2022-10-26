<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/citaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $cita =  new cita($bd); 
    
    if($_GET["accion"] === "agregar"){

        //$data['area'] = test_input($_GET["area"]);
        //$data['descripcion'] = test_input($_GET["descripcion"]);
        //paciente
        $data['paciente_dni'] = intval(test_input($_GET["paciente_dni"]));
        $data['paciente_nombre1'] = test_input($_GET["paciente_nombre1"]);
        $data['paciente_nombre2'] = test_input($_GET["paciente_nombre2"]);
        $data['paciente_nombre3'] = test_input($_GET["paciente_nombre3"]);
        $data['paciente_apellido_paterno'] = test_input($_GET["paciente_apellido_paterno"]);
        $data['paciente_apellido_materno'] = test_input($_GET["paciente_apellido_materno"]);
        $data['paciente_genero'] = test_input($_GET["paciente_genero"]);
        $data['paciente_fecha_nacimiento'] = test_input($_GET["paciente_fecha_nacimiento"]);
        //$data['paciente_direccion'] = test_input($_GET["paciente_direccion"]);
        //trabajador
        $data['trabajador_usuario'] = test_input($_GET["trabajador_usuario"]);
        //responsable
        $data['responsable_dni'] = test_input($_GET["responsable_dni"]);
        $data['responsable_nombre1'] = test_input($_GET["responsable_nombre1"]);
        $data['responsable_nombre2'] = test_input($_GET["responsable_nombre2"]);
        $data['responsable_apellido_paterno'] = test_input($_GET["responsable_apellido_paterno"]);
        $data['responsable_apellido_materno'] = test_input($_GET["responsable_apellido_materno"]);
        $data['responsable_genero'] = test_input($_GET["responsable_genero"]);
        $data['responsable_fecha_nacimiento'] = test_input($_GET["responsable_fecha_nacimiento"]);
        $data['responsable_celular'] = test_input($_GET["responsable_celular"]);
        $data['responsable_telefono'] = test_input($_GET["responsable_telefono"]);
        //cita
        $data['cita_fecha'] = test_input($_GET["cita_fecha"]);
        $data['cita_mesa'] = test_input($_GET["cita_mesa"]);
        $data['cita_vacuna_aplicacion'] = $_GET["cita_vacuna_aplicacion"];
        $data['cita_observacion'] = test_input($_GET["cita_observacion"]);

        $result['idcita'] = $cita->insertCita($data);

        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "buscardni"){

        $data['dni'] = test_input($_GET["paciente_dni"]);
        $result['paciente'] = $cita->getDni($data);
        $cita->disconnectBD();
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit(); 
    }

    if($_GET["accion"] === "filter"){

        $data['descripcion'] = test_input($_GET["descripcion"]);
        $data['area'] = test_input($_GET["area"]);
        $result['puestof'] = $puesto->getFilterPuesto($data);
        $puesto->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "agregarvacuna"){
        $data["cita"] = test_input($_GET["idcita"]);
        $data["vacuna"] = test_input($_GET["vacuna"]);
        $result['mensaje'] = $cita->insertCitaVacunaAplicacion($data);
        $cita->disconnectBD();
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);
    }

}

?>

