<?php

require_once '../../model/GestionAcademica.php';
require_once '../../core/constants.php';


if(isset($_POST["puesto"]) && isset($_POST["institucion"]) && isset($_POST["fechaFinal"]) && isset($_POST["fechaInicio"]) 
    && isset($_POST["actual"]) && isset($_POST["keyProfesor"])) {
    
    $puesto = $_POST["puesto"];
    $institucion = $_POST["institucion"];
    $fechfin = $_POST["fechaFinal"];
    $fechini = $_POST["fechaInicio"];
    $actual = $_POST["actual"];
    $keyProfesor = $_POST["keyProfesor"];

    $arrayResponse = array("msj" => "", "status" => "error", "data" => null);

    $gestion = new GestionAcademica();
    $gestion->setPuesto($puesto);
    $gestion->setInstituto($institucion);
    $gestion->setFechaInicio($fechini);
    $gestion->setFechaFin($fechfin);
    $gestion->setActual($actual);
    $gestion->setProfesionalKey($keyProfesor);

    // Agregamos condicion sobre el id del profesor
    $gestion->setCondicion("persona_fkey", $gestion->getProfesionalKey(), IGUAL, NUMERO);

    $gestion->registraGestion();
    $aGestion = $gestion->consultaByIdProfesor();

    $arrayResponse["msj"] = "se registro correctamente los datos.";
    $arrayResponse["status"] = "success";
    $arrayResponse["data"] = $aGestion;


    header('Content-type: application/json');
    echo json_encode($arrayResponse);
}