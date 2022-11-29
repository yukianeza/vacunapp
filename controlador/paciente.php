<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/pacienteModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $paciente =  new paciente($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['paciente'] = $paciente->getPaciente();
        $paciente->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "modificar"){

        $data['codigo'] = test_input($_GET["codigo"]);
        $data['nombre1'] = $_GET["nombre1"];

        $data['nombre2'] = $_GET["nombre2"];
        $data['apellido_paterno'] = $_GET["apellido_paterno"];
        $data['apellido_materno'] = $_GET["apellido_materno"];
        $data['dni'] = $_GET["dni"];
        $data['fecha_nacimiento'] = $_GET["fecha_nacimiento"];
    
        $result['mensaje'] = $paciente->updatePaciente($data);
        $paciente->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "eliminar"){

        $data['codigo'] = test_input($_GET["codigo"]);
        $data['nombre'] = test_input($_GET["nombre"]);

        $result['mensaje'] = $paciente->deletePaciente($data);
        $paciente->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "agregar"){

        $data['nombre1'] = test_input($_GET["nombre1"]);
        $data['nombre2'] = test_input($_GET["nombre2"]);
        $data['apellido_paterno'] = test_input($_GET["apellido_paterno"]);
        $data['apellido_materno'] = test_input($_GET["apellido_materno"]);
        $data['dni'] = test_input($_GET["dni"]);
        $data['fecha_nacimiento'] = test_input($_GET["fecha_nacimiento"]);
        
        $result['mensaje'] = $paciente->insertPaciente($data);
        $paciente->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "filter"){

        $data['Turno'] = test_input($_GET["descripcion"]);
        $result['turnof'] = $pabellon->getFilterTurno($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "buscar"){

        $data['paciente_dni'] = test_input($_GET["paciente_dni"]);
        $result['paciente'] = $paciente->getValidationPaciente($data);
        $paciente->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

