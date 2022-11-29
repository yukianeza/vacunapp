<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/citaModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $cita =  new cita($bd); 
    
    if($_GET["accion"] === "lectura"){

        $result['cita'] = $cita->getCita();
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "getlista"){

        $result['cita'] = $cita->getLista();
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "detalle"){

        $data['id'] = test_input($_GET["cita"]);
        $result['cita'] = $cita->getDetalle($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "vacuna"){

        $data['id'] = test_input($_GET["cita"]);
        $result['cita'] = $cita->getVacuna($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "vacunacita"){

        $data['id'] = test_input($_GET["cita"]);
        $result['cita'] = $cita->getVacunaCita($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "postergar"){

        $data['codigo'] = test_input($_GET["codigo"]);
        $data['fecha'] = test_input($_GET["fecha"]);

        $result['mensaje'] = $cita->getPostergar($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "atender"){

        $data['cita'] = test_input($_GET["cita"]);

        $result['cita'] = $cita->getAtenderCita($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }
  
    if($_GET["accion"] === "cancelar"){

        $data['codigo'] = test_input($_GET["codigo"]);

        $result['mensaje'] = $cita->getCancelarCita($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }

    if($_GET["accion"] === "concluir"){

        $data['codigo'] = test_input($_GET["codigo"]);

        $result['mensaje'] = $cita->getConcluirCita($data);
        $cita->disconnectBD();   
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

        $data['dni'] = test_input($_GET["dni"]);
        $data['estado'] = test_input($_GET["estado"]);
        $data['fechai'] = test_input($_GET["fechai"]);
        $data['fechae'] = test_input($_GET["fechae"]);

        $result['cita'] = $cita->getFilterCita($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "actualizarCrud"){

        $data['id'] = test_input($_GET["cita"]);
        $data['talla'] = test_input($_GET["talla"]);
        $data['peso'] = test_input($_GET["peso"]);
        $data['pe'] = test_input($_GET["pe"]);
        $data['te'] = test_input($_GET["te"]);
        $data['pt'] = test_input($_GET["pt"]);
        $data['desarrollo'] = test_input($_GET["desarrollo"]);
        $data['reshab'] = test_input($_GET["reshab"]);
        $data['seguro'] = test_input($_GET["seguro"]);
        $data['anemia'] = test_input($_GET["anemia"]);
        $data['profilax'] = test_input($_GET["profilax"]);
        $data['paciente_id'] = test_input($_GET["paciente_id"]);

        $result['mensaje'] = $cita->actualizarCrud($data);
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "actualizarVacunas"){

        //$data['id'] = test_input($_GET["cita"]);
        $json = json_decode($_GET["json"]);

        $result['mensaje'] = $cita->actualizarVacunas($json);
        //$result['mensaje'] = $data['json'];
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "finalizarCita"){

        $data['id'] = test_input($_GET["cita"]);

        $result['mensaje'] = $cita->finalizarCita($data);
        //$result['mensaje'] = $data['json'];
        $cita->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

