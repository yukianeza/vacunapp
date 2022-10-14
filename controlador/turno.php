<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/turnoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $pabellon =  new turno($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['turno'] = $pabellon->getTurno();
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

        $data['Turno'] = test_input($_GET["descripcion"]);
        
        $result['mensaje'] = $pabellon->insertTurno($data);
        $pabellon->disconnectBD();   
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

}

?>

