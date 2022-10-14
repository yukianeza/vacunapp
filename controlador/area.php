<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/areaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $pabellon =  new area($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['area'] = $pabellon->getArea();
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "modificar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['descripcion'] = test_input($_GET["descripcion"]);
    
        $result['mensaje'] = $pabellon->updateArea($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "eliminar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['descripcion'] = test_input($_GET["descripcion"]);

        $result['mensaje'] = $pabellon->deleteArea($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "agregar"){

        $data['descripcion'] = test_input($_GET["descripcion"]);
        
        $result['mensaje'] = $pabellon->insertArea($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "filter"){

        $data['descripcion'] = test_input($_GET["descripcion"]);
        $result['areaf'] = $pabellon->getFilterArea($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

