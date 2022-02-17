<?php
class GestionAcademica{

    private $puesto;
    private $empresa;
    private $fechaInicio;
    private $fechaFin;

    public function setPuesto($puesto){
        $this->puesto = $puesto;
    }

    public function getPuesto(){
        return $this->puesto;
    }

    public function setEmpresa($empresa){
        $this->empresa = $empresa;
    }

    public function getEmpresa(){
        return $this->empresa;
    }

    public function setFechaInicio($fechaInicio){
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaInicio(){
        return $this->fechaInicio;
    }

    public function setFechaFin($fechaFin){
        $this->fechaFin = $fechaFin;
    }

    public function getFechaFin(){
        return $this->fechaFin;
    }

}