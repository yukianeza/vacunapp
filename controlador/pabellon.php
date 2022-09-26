<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/pabellonModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $pabellon =  new pabellon($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['pabellon'] = $pabellon->getPabellon();
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "modificar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['nombre'] = test_input($_GET["nombre"]);
        $data['capacidad'] = test_input($_GET["capacidad"]);
        $data['detalle'] = test_input($_GET["detalle"]);
        $data['estado'] = intval(test_input($_GET["estado"]));
    
        $result['mensaje'] = $pabellon->updatePabellon($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "eliminar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['nombre'] = test_input($_GET["nombre"]);

        $result['mensaje'] = $pabellon->deletePabellon($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "agregar"){

        $data['nombre'] = test_input($_GET["nombre"]);
        $data['capacidad'] = test_input($_GET["capacidad"]);
        $data['detalle'] = test_input($_GET["detalle"]);
        $data['estado'] = intval(test_input($_GET["estado"]));
        
        $result['mensaje'] = $pabellon->insertPabellon($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "filter"){

        $data['nombre'] = test_input($_GET["nombre"]);
        $data['detalle'] = test_input($_GET["detalle"]);
        $data['estado'] = test_input($_GET["estado"]);
        $data['cantidadi'] = test_input($_GET["cantidadi"]);
        $data['cantidade'] = test_input($_GET["cantidade"]);
        $result['pabellonf'] = $pabellon->getFilterPabellon($data);
        $pabellon->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

