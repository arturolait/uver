<?php

require_once '../../model/Participacion.php';
require_once '../../core/constants.php';


if(isset($_POST["organismo"]) && isset($_POST["periodo"]) && isset($_POST["nivel"]) && isset($_POST["identificador"]) && isset($_POST["keyProfesor"])) {
    
    $organismo = $_POST["organismo"];
    $periodo = $_POST["periodo"];
    $nivel = $_POST["nivel"];
    $identificador = $_POST["identificador"];
    $keyProfesor = $_POST["keyProfesor"];

    $arrayResponse = array("msj" => "", "status" => "error", "data" => null);

    $experiencia = new Participacion();
    $experiencia->setParticipacionKey($identificador);

    $experiencia->setOrganismo($organismo);
    $experiencia->setPeriodo($periodo);
    $experiencia->setNivel($nivel);
    $experiencia->setProfesionalKey($keyProfesor);

    // Agregamos condicion sobre el id del profesor
    $experiencia->setCondicion("persona_fkey", $experiencia->getProfesionalKey(), IGUAL, NUMERO);
    $experiencia->setCondicion("participacion_key", $experiencia->getParticipacionKey(), IGUAL, NUMERO);
    $experiencia->actualizaParticipacion();
    
    $experiencia->clearCondicion();
    $experiencia->setCondicion("persona_fkey", $experiencia->getProfesionalKey(), IGUAL, NUMERO);
    $aexperiencia = $experiencia->consultaByIdProfesor();

    $arrayResponse["msj"] = "Se actualizaron correctamente los datos.";
    $arrayResponse["status"] = "success";
    $arrayResponse["data"] = $aexperiencia;


    header('Content-type: application/json');
    echo json_encode($arrayResponse);
}