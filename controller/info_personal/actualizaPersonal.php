<?php

require_once '../../model/Persona.php';
require_once '../../core/constants.php';

if(isset($_POST["apPaterno"]) && isset($_POST["apMaterno"]) && isset($_POST["nombre"]) && isset($_POST["noProfesor"]) 
    && isset($_POST["dateOfBirth"]) && isset($_POST["nombramiento"]) && isset($_POST["antiguedad"]) && isset($_POST["feContratacion"])) {

    $apPaterno = $_POST["apPaterno"];
    $apMaterno = $_POST["apMaterno"];
    $nombre = $_POST["nombre"];
    $noProfesor = $_POST["noProfesor"];
    $dateOfBirth = date("Y-m-d", strtotime($_POST["dateOfBirth"]));
    $nombramiento = $_POST["nombramiento"];
    $antiguedad = $_POST["antiguedad"];
    $feContratacion = date("Y-m-d", strtotime($_POST["feContratacion"]));

    $arrayResponse = array("msj" => "", "status" => "error", "data" => null);

    $persona = new Persona();
    $persona->setApPaterno($apPaterno);
    $persona->setApMaterno($apMaterno);
    $persona->setNombre($nombre);
    $persona->setNoProfesor($noProfesor);
    $persona->setFechaNacimiento($dateOfBirth);
    $persona->setNombramiento($nombramiento);
    $persona->setAntiguedad($antiguedad);
    $persona->setFechaContratacion($feContratacion);

    $persona->setCondicion("noProfesor", $persona->getNoProfesor(), IGUAL, NUMERO);
    $aPersona = $persona->consultaByNoProfesor();

    if(count($aPersona) > 0){
        $persona->actualizaPersona();
        $aPersona = $persona->consultaByNoProfesor();

        $arrayResponse["msj"] = "se registro correctamente los datos.";
        $arrayResponse["status"] = "success";  
    }
    $arrayResponse["data"] = $aPersona;
        
    header('Content-type: application/json');
    echo json_encode($arrayResponse);
}