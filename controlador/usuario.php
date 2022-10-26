<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/usuarioModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $usuario =  new usuario($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['usuario'] = $usuario->getUsuario();
        $usuario->disconnectBD();   
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

