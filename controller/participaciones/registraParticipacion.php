<?php

require_once '../../model/Participacion.php';
require_once '../../core/constants.php';


if(isset($_POST["organismo"]) && isset($_POST["periodo"]) && isset($_POST["nivel"]) && isset($_POST["keyProfesor"])) {
    
    $organismo = $_POST["organismo"];
    $periodo = $_POST["periodo"];
    $nivel = $_POST["nivel"];
    $keyProfesor = $_POST["keyProfesor"];

    $arrayResponse = array("msj" => "", "status" => "error", "data" => null);

    $participacion = new Participacion();
    $participacion->setOrganismo($organismo);
    $participacion->setPeriodo($periodo);
    $participacion->setNivel($nivel);
    $participacion->setProfesionalKey($keyProfesor);

    // Agregamos condicion sobre el id del profesor
    $participacion->setCondicion("persona_fkey", $participacion->getProfesionalKey(), IGUAL, NUMERO);

    $participacion->registraParticipacion();
    $aParticipacion = $participacion->consultaByIdProfesor();

    $arrayResponse["msj"] = "Se registraron correctamente los datos.";
    $arrayResponse["status"] = "success";
    $arrayResponse["data"] = $aParticipacion;


    header('Content-type: application/json');
    echo json_encode($arrayResponse);
}