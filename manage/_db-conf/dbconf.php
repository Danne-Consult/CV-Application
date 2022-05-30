<?php

class DBconnect{

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = 'root';
    private $db_name = 'cvapp';
    public $prefix = 'qwe_';

    protected $connection;

    public function connect(){

        // Establish a new connection using PDO
        /*
        try{
            $connection = new PDO("mysqli:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOException $e){
            print "Error!:". $e->getMessage() ."<br />";
            $connection = null;
            die();
        }   
        */
        
        //connect using mysql
        $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        
        if ($this->connection->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            exit;
        }
        return $this->connection;
    }
}