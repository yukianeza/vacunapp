<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/responsableModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $responsable =  new responsable($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['paciente'] = $pabellon->getPaciente();
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "modificar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['Turno'] = test_input($_GET["descripcion"]);
    
        $result['mensaje'] = $pabellon->updateTurno($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "eliminar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['Turno'] = test_input($_GET["descripcion"]);

        $result['mensaje'] = $pabellon->deleteTurno($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "agregar"){

        $data['responsable_dni'] = test_input($_GET["responsable_dni"]);
        $data['nombre1'] = test_input($_GET["nombre1"]);
        $data['nombre2'] = test_input($_GET["nombre2"]);
        $data['apellido_paterno'] = test_input($_GET["apellido_paterno"]);
        $data['apellido_materno'] = test_input($_GET["apellido_materno"]);
        $data['genero'] = test_input($_GET["genero"]);
        $data['fecha_nacimiento'] = test_input($_GET["fecha_nacimiento"]);
        $data['celular'] = test_input($_GET["celular"]);
        $data['telefono'] = test_input($_GET["telefono"]);
        
        $result['mensaje'] = $responsable->insertCita($data);
        $responsable->disconnectBD();   
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

        $data['responsable_dni'] = test_input($_GET["responsable_dni"]);
        $result['responsable'] = $responsable->getValidationResponsable($data);
        $responsable->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

