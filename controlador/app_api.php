<?php

include '../modelo/tools.php';
include '../modelo/cnnt.php';
include '../modelo/apiModel.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $result = array();
    $accion = "lectura";
    $ApiAplicacion =  new ApiAplicacion($bd); 
    /*
    if($_GET["accion"] === "lectura"){

        $result['VacunaAplicacion'] = $ApiAplicacion->getVacunaAplicacion();
        $ApiAplicacion->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();

    }*/

	if($_GET["accion"] === "login"){
		
		$data['dni'] = test_input($_GET["dni"]);
		$data['password'] = test_input($_GET["password"]);
		$result['response'] = $ApiAplicacion->Validacion($data);
        //$result['response'] = "ok";
		//$data['Turno'] = test_input($_GET["descripcion"]);
        //$result['turnof'] = $pabellon->getFilterTurno($data);
        $ApiAplicacion->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "paciente"){
		
		$data['paciente_id'] = test_input($_GET["paciente_id"]);
		$result['response'] = $ApiAplicacion->getPaciente($data);
        //$result['response'] = "ok";
		//$data['Turno'] = test_input($_GET["descripcion"]);
        //$result['turnof'] = $pabellon->getFilterTurno($data);
        $ApiAplicacion->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

    if($_GET["accion"] === "cita"){
		
		$data['paciente_id'] = test_input($_GET["paciente_id"]);
		$result['response'] = $ApiAplicacion->getCita($data);
        //$result['response'] = "ok";
		//$data['Turno'] = test_input($_GET["descripcion"]);
        //$result['turnof'] = $pabellon->getFilterTurno($data);
        $ApiAplicacion->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }
	
    if($_GET["accion"] === "vacuna"){
		
		$data['paciente_id'] = test_input($_GET["paciente_id"]);
		$result['response'] = $ApiAplicacion->getVacuna($data);
        //$result['response'] = "ok";
		//$data['Turno'] = test_input($_GET["descripcion"]);
        //$result['turnof'] = $pabellon->getFilterTurno($data);
        $ApiAplicacion->disconnectBD();   
        header('Content-type: application/json; charset=utf-8');       
        echo json_encode($result);  
        exit();
    }

}

?>

