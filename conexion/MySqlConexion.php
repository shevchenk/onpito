<?php
class MySqlConexion {

    private $conexion;
    private $resource;
    private $sql;
    public $queries;
    private static $_singleton;

    public static function getInstance(){
        if (is_null (self::$_singleton)) {
                self::$_singleton = new MySqlConexion();
        }
        return self::$_singleton;
    }

    private function __construct(){
        $config=new config();
        $this->conexion = mysqli_connect($config->getHost(),$config->getUser(),$config->getPass(),$config->getDataBase());
        $this->queries = 0;
        $this->resource = null;
    }

    public function iniciaTransaccion(){
        if(!(mysqli_query($this->conexion,'begin'))){
                return false;
        }
        return true;
    }
    
    public function commitTransaccion(){
        return $this->conexion->commit();
    }
    
    public function rollbackTransaccion(){
        return $this->conexion->rollback();
    }

    public function last_insert_id(){
        return $this->conexion->insert_id;
    }

    public function execute(){
        if(!($this->resource = mysqli_query($this->conexion, $this->sql))){
                return null;
        }
        $this->queries++;
        return $this->resource;
    }

    public function getError(){
        return mysqli_error($this->conexion);
    }

    public function executeQuery(){
        if(!($this->resource = mysqli_query($this->conexion,$this->sql))){
            return false;
        }
        return true;
    }
    
    public function loadObjectList(){
            if (!($cur = $this->execute())){
                    return null;
            }
            $array = array();
            while ($row = mysqli_fetch_assoc($cur)){
                    $array[] = $row;
            }
            return $array;
    }

    public function setQuery($sql){
            if(empty($sql)){
                    return false;
            }
            $this->sql = $sql;
            return true;
    }

    public function freeResults(){
            @mysqli_free_result($this->resource);
            return true;
    }

    public function loadObject(){
        if ($cur = $this->execute()){
            if ($object = mysqli_fetch_object($cur)){
                @mysqli_free_result($cur);
                return $object;
            }
            else {
                return null;
            }
        }
        else {
            return false;
        }
    }	
    
    public function limpiaString($txt){
        return $this->conexion->real_escape_string($txt);
    }

    function __destruct(){
        @mysqli_free_result($this->resource);
        @mysqli_close($this->conexion);
    }
}
?>