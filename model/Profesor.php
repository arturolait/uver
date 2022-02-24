<?php

require_once '../../core/DBConnection.php';
class Profesor{
    private $_tablaName;
    private $conexion;
    public $id_profesor;
    public $password;
    public $status;
    private $_condiciones;
    private $responseResult;

    function __construct() {
        $this->_tablaName = 'profesor';
        $this->conexion = new DBConnection();
        $this->_condiciones = array();
        $this->responseResult = array("msj" => "", "status" => "error", "data" => null);
    }

    public function setIdProfesor($id_profesor){
        $this->id_profesor = $id_profesor;
    }
    public function getIdProfesor(){
        return $this->id_profesor;
    }

    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function consultaCredenciales(){
        $where = $this->getCondicion();
        $SQL = "SELECT profesor_key, identificador, contrasena, estatus
            FROM ".DB_NAME.".".$this->_tablaName.$where;
        $result = $this->conexion->dbc->prepare($SQL);
        $result->execute();
        $arrayProfesor = $result->fetch(PDO::FETCH_ASSOC);
        
        return $arrayProfesor;
    }

    /**
     * genera un arreglo con las condiciones que tendra
     * la sentencia where
     */
    public function setCondicion($campo, $valor, $filtro, $tipoDato){
        $valor = ($tipoDato == STR)? "'".$valor."'": $valor;
        $addCondicion = array($campo => array("valor" => $valor, "operador" => $filtro));
        array_push($this->_condiciones, $addCondicion);
    }

    /**
     * devuelve una cadena con una sentencia where
     * conforme a los atributos que se hallan seteando
     * atraves del los seters de cada atributo de la clase
     */
    public function getCondicion(){
        $where = '';
        if(!empty($this->_condiciones)){
            $where = ' where ';
            $campos = 1;
            foreach($this->_condiciones as $condicion){
                foreach($condicion as $columna => $sentencia){
                    $and = ($campos > 1)? " AND ": "";
                    $where .= $and.$columna." ".$sentencia["operador"]." ".$sentencia["valor"];
                    $campos++;
                }
            }
        }

        return $where;
    }

}