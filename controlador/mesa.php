<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/mesaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $mesa =  new mesa($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['mesa'] = $mesa->getMesa();
        $mesa->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "modificar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['nombre'] = test_input($_GET["nombre"]);
        $data['capacidad'] = intval(test_input($_GET["capacidad"]));
        $data['detalle'] = test_input($_GET["detalle"]);
        $data['estado'] = intval(test_input($_GET["estado"]));
        $data['pabellon'] = intval(test_input($_GET["pabellon"]));
    
        $result['mensaje'] = $mesa->updateMesa($data);
        $mesa->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "eliminar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['nombre'] = test_input($_GET["nombre"]);

        $result['mensaje'] = $mesa->deleteMesa($data);
        $mesa->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "agregar"){

        $data['nombre'] = test_input($_GET["nombre"]);
        $data['capacidad'] = test_input($_GET["capacidad"]);
        $data['detalle'] = test_input($_GET["detalle"]);
        $data['estado'] = test_input($_GET["estado"]);
        $data['pabellon'] = test_input($_GET["pabellon"]);
        
        $result['mensaje'] = $mesa->insertMesa($data);
        $mesa->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "filter"){

        $data['nombre'] = test_input($_GET["nombre"]);
        $data['capacidad'] = test_input($_GET["capacidad"]);
        $data['detalle'] = test_input($_GET["detalle"]);
        $data['estado'] = test_input($_GET["estado"]);
        $data['pabellon'] = test_input($_GET["pabellon"]);

        $result['mesaf'] = $mesa->getFilterMesa($data);
        $puesto->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

