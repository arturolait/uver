<?php

require_once '../../core/DBConnection.php';
class LogroProfesional{
    private $_tablaName;
    private $conexion;
    private $logro_key;
    private $descripcion;
    private $profesionalKey;
    private $_condiciones;
    private $responseResult;

    function __construct() {
        $this->_tablaName = 'logrosProfesionales';
        $this->conexion = new DBConnection();
        $this->_condiciones = array();
        $this->responseResult = array("msj" => "", "status" => "error", "data" => null);
    }

    public function setLogroKey($logro_key){
        $this->logro_key = $logro_key;
    }
    public function getLogroKey(){
        return $this->logro_key;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setProfesionalKey($profesionalKey){
        $this->profesionalKey = $profesionalKey;
    }
    public function getProfesionalKey(){
        return $this->profesionalKey;
    }

    public function registraLogro(){
        $this->conexion->beginTransactionPDO();
        try{

            $SQL = "INSERT INTO ".DB_NAME.".".$this->_tablaName." (descripcion, persona_fkey)
                VALUES(:descripcion, :persona_fkey);";

            $result = $this->conexion->dbc->prepare($SQL);
            $result->bindParam(':descripcion', $this->descripcion);
            $result->bindParam(':persona_fkey', $this->profesionalKey);
            $result->execute();

            $this->conexion->commitPDO();
            $this->responseResult["msj"] = "el registro fue exitoso.";
            $this->responseResult["status"] = "success";

        }catch(PDOException $e){
            $this->conexion->rollBackPDO();
            $this->responseResult["msj"] = "Error en SQL [".$e->getMessage()."]";
            $this->responseResult["status"] = "error";

        }

        return $this->responseResult;
    }

    public function actualizaLogro(){
        $this->conexion->beginTransactionPDO();
        try{
            $where = $this->getCondicion();
            $SQL = "UPDATE ".DB_NAME.".".$this->_tablaName." SET descripcion = :descripcion ".$where;

            $result = $this->conexion->dbc->prepare($SQL);            
            $result->bindParam(':descripcion', $this->descripcion);
            $result->execute();

            $this->conexion->commitPDO();
            $this->responseResult["msj"] = "La actualizacion fue exitoso.";
            $this->responseResult["status"] = "success";

        }catch(PDOException $e){
            $this->conexion->rollBackPDO();
            $this->responseResult["msj"] = "Error en SQL [".$e->getMessage()."]";
            $this->responseResult["status"] = "error";

        }

        return $this->responseResult;
    }

    public function deleteLogro(){
        $where = $this->getCondicion();
        $SQL = "DELETE FROM ".DB_NAME.".".$this->_tablaName.$where;
        $result = $this->conexion->dbc->prepare($SQL);
        $result->execute();
    }

    public function consultaByIdProfesor(){
        $where = $this->getCondicion();
        $SQL = "SELECT logro_key, descripcion, persona_fkey
            FROM ".DB_NAME.".".$this->_tablaName.$where;
        $result = $this->conexion->dbc->prepare($SQL);
        $result->execute();
        $arrayFormacion = $result->fetchAll(PDO::FETCH_ASSOC);
        
        return $arrayFormacion;
    }

    /**
     * se borran los filtros de condicion
     * la sentencia where
     */
    public function clearCondicion(){
        $this->_condiciones = array();
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