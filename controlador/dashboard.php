<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/dashboardModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $dashboard =  new dashboard($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['dashboard'] = $dashboard->getDashboard();
        $dashboard->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "lectura2"){

        $result['dashboard'] = $dashboard->getDashboard2();
        $dashboard->disconnectBD();   
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

