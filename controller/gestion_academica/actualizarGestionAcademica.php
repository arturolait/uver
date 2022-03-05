<?php

require_once '../../model/GestionAcademica.php';
require_once '../../core/constants.php';


if(isset($_POST["puesto"]) && isset($_POST["institucion"]) && isset($_POST["fechaFinal"]) && isset($_POST["fechaInicio"]) 
&& isset($_POST["identificador"]) && isset($_POST["keyProfesor"])) {
    
    $puesto = $_POST["puesto"];
    $institucion = $_POST["institucion"];
    $fechini = $_POST["fechaInicio"];
    if(empty($_POST["actual"])){
        if (isset($_POST["fechaFinal"])) {
            $fechfin = $_POST["fechaFinal"];
            $actual = 2;
        } else {
            $arrayResponse["msj"] = "No se recibio informacion de Fecha final.";
            $arrayResponse["status"] = "error";
            header('Content-type: application/json');
            echo json_encode($arrayResponse);
        }
    } else {
        $actual = 1;
    }
    $actual = (empty($_POST["actual"]))? 2:1;
    $identificador = $_POST["identificador"];
    $keyProfesor = $_POST["keyProfesor"];

    $arrayResponse = array("msj" => "", "status" => "error", "data" => null);

    $gestion = new GestionAcademica();
    $gestion->setGestionKey($identificador);

    $gestion->setPuesto($puesto);
    $gestion->setInstituto($institucion);
    $gestion->setFechaInicio($fechini);
    if (isset($fechfin)) {
        $gestion->setFechaFin($fechfin);
    }
    $gestion->setActual($actual);
    $gestion->setProfesionalKey($keyProfesor);

    // Agregamos condicion sobre el id del profesor
    $gestion->setCondicion("persona_fkey", $gestion->getProfesionalKey(), IGUAL, NUMERO);
    $gestion->setCondicion("gestion_key", $gestion->getGestionKey(), IGUAL, NUMERO);
    $gestion->actualizaGestion();
    
    $gestion->clearCondicion();
    $gestion->setCondicion("persona_fkey", $gestion->getProfesionalKey(), IGUAL, NUMERO);
    $agestion = $gestion->consultaByIdProfesor();

    $arrayResponse["msj"] = "Se actualizaron correctamente los datos.";
    $arrayResponse["status"] = "success";
    $arrayResponse["data"] = $agestion;


    header('Content-type: application/json');
    echo json_encode($arrayResponse);
}