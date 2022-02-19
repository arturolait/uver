<?php

require_once '../../model/ExperienciaProfesional.php';
require_once '../../core/constants.php';


if(isset($_POST["puesto"]) && isset($_POST["empresa"]) && isset($_POST["fechaFinal"]) && isset($_POST["fechaInicio"]) 
&& isset($_POST["identificador"]) && isset($_POST["keyProfesor"])) {
    
    $puesto = $_POST["puesto"];
    $empresa = $_POST["empresa"];
    $fechfin = $_POST["fechaFinal"];
    $fechini = $_POST["fechaInicio"];
    $identificador = $_POST["identificador"];
    $keyProfesor = $_POST["keyProfesor"];

    $arrayResponse = array("msj" => "", "status" => "error", "data" => null);

    $experiencia = new ExperienciaProfesional();
    $experiencia->setExperienciaKey($identificador);

    $experiencia->setPuesto($puesto);
    $experiencia->setEmpresa($empresa);
    $experiencia->setFechaInicio($fechini);
    $experiencia->setFechaFin($fechfin);
    $experiencia->setProfesionalKey($keyProfesor);

    // Agregamos condicion sobre el id del profesor
    $gestion->setCondicion("persona_fkey", $gestion->getProfesionalKey(), IGUAL, NUMERO);
    $gestion->setCondicion("experiencia_key", $gestion->getGestionKey(), IGUAL, NUMERO);
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