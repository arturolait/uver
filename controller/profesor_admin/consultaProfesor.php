<?php

session_start();
require_once '../../model/Profesor.php';
require_once '../../core/constants.php';

$arrayResponse = array("msj" => "La sesion ah caducado.", "status" => "error", "data" => null);
if(isset($_SESSION["profesor"])){
    $dataProfesor = $_SESSION["profesor"];
    $profesorKey = $dataProfesor["profesor_key"];

    $profesores = new Profesor();
    $profesores->consultaProfesores
    //$productoAcademico->setProfesionalKey($profesorKey);

    //$productoAcademico->setCondicion("persona_fkey", $productoAcademico->getProfesionalKey(), IGUAL, NUMERO);
    //$aproductoAcademico= $productoAcademico->consultaByIdProfesor();

    if(!empty($aproductoAcademico)){
        if(count($aproductoAcademico) > 0){
            $arrayResponse["msj"] = "Datos del profesor encontrados.";
            $arrayResponse["status"] = "success";
            $arrayResponse["data"] = $aproductoAcademico;
        }
    }else{
        $arrayResponse["msj"] = "No existe informacion que coincida con el ID proporcionado.";
        $arrayResponse["status"] = "error";
        $arrayResponse["data"] = [];
    }

    
}
header('Content-type: application/json');
echo json_encode($arrayResponse);