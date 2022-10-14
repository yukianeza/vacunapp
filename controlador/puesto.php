<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/puestoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $puesto =  new puesto($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['puesto'] = $puesto->getPuesto();
        $puesto->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "modificar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['area'] = test_input($_GET["area"]);
        $data['descripcion'] = test_input($_GET["descripcion"]);
    
        $result['mensaje'] = $puesto->updatePuesto($data);
        $puesto->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "eliminar"){

        $data['codigo'] = intval(test_input($_GET["codigo"]));
        $data['descripcion'] = test_input($_GET["descripcion"]);

        $result['mensaje'] = $puesto->deletePuesto($data);
        $puesto->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "agregar"){

        $data['area'] = test_input($_GET["area"]);
        $data['descripcion'] = test_input($_GET["descripcion"]);
        
        $result['mensaje'] = $puesto->insertPuesto($data);
        $puesto->disconnectBD();   
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

}

?>

