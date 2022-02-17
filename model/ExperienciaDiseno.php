<?php
class ProductosAcademicos{
    private $idProducto;
    private $organismo;
    private $periodo;
    private $nivel;


    public function setOrganismo($organismo){
        $this->organismo = $organismo;
    }

    public function getOrganismo(){
        return $this->organismo;
    }

    public function setPeriodo($periodo){
        $this->periodo = $periodo;
    }

    public function getPeriodo(){
        return $this->periodo;
    }

    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    public function getNivel(){
        return $this->nivel;
    }


}