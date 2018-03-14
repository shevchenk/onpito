<?php
class config{
    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;
    
    public function __construct(){
	 	$this->host='localhost';
        $this->user='cpdteles';
        $this->pass='btexqbw8hchk';
        $this->database='cpdteles_onpito';
        $this->port='3306';
    }
    public function setPort($port){
        $this->port=$port;
    }
    public function getPort(){
        return $this->port;
    }
    public function setHost($host){
        $this->host=$host;
    }
    public function getHost(){
        return $this->host;
    }
    public function setUser($user){
        $this->user=$user;
    }
    public function getUser(){
        return $this->user;
    }
    public function setPass($pass){
        $this->pass=$pass;
    }
    public function getPass(){
        return $this->pass;
    }
    public function setDataBase($database){
        $this->database=$database;
    }
    public function getDataBase(){
        return $this->database;
    }
}
?>
