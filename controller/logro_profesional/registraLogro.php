<?php
session_start();
require_once '../../model/LogroProfesional.php';
require_once '../../core/constants.php';

$arrayResponse = array("msj" => "La sesion ah caducado.", "status" => "error", "data" => null);
if(isset($_SESSION["profesor"])){
    $dataProfesor = $_SESSION["profesor"];
    $profesorKey = $dataProfesor["profesor_key"];
    $descripcion= $_POST["descripcion"];

    $logro = new LogroProfesional();
    $logro->setProfesionalKey($profesorKey);
    $logro->setDescripcion($descripcion);

    //egregamos condicion sobre el id del profesor
    $logro->setCondicion("persona_fkey", $logro->getProfesionalKey(), IGUAL, NUMERO);

    $logro->registraLogro();
    $aLogro = $logro->consultaByIdProfesor();

    $arrayResponse["msj"] = "se registro correctamente los datos.";
    $arrayResponse["status"] = "success";
    $arrayResponse["data"] = $aLogro;


}
header('Content-type: application/json');
echo json_encode($arrayResponse);