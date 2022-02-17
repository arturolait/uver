<?php
class GestionAcademica{

    private $puesto;
    private $instituto;
    private $fechaInicio;
    private $fechaFin;
    private $actual;

    public function setPuesto($puesto){
        $this->puesto = $puesto;
    }

    public function getPuesto(){
        return $this->puesto;
    }

    public function setInstituto($instituto){
        $this->instituto = $instituto;
    }

    public function getInstituto(){
        return $this->instituto;
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

    public function setActual($actual){
        $this->actual = $actual;
    }

    public function getActual(){
        return $this->actual;
    }


}