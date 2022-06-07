<?php
    class DBconnect{

    public $hostname;
    public $user;
    public $password;
    public $database;
    public $prefix;
    public $conn;

    public function __construct(){
        $this->hostname = "localhost";
        $this->user = "root";
        $this->password = "root";
        $this->database = "cvapp";
        $this->prefix = "qwe_";
        $this->conn();
    }
    public function conn(){
        $this->conn = new mysqli($this->hostname,$this->user,$this->password,$this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }
    public function escape_string($value){
        return $this->conn->real_escape_string($value);
    }
}