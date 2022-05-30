<?php

class DBconnect{

    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_base;
    protected $conn;

    public function __construct(){

        $this->db_host = "localhost";
        $this->db_user = "root";
        $this->db_pass = "root";
        $this->db_base = "cvapp";      
        $this->connect();

    }

    public function connect(){
        //$this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_base);

        $this->conn = new mysqli("localhost","root","root","cvapp");
        if ($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->connect_errno);
        }
    }


    public function getData($table, $where){
            $this->connect();
            $sql = "SELECT * FROM ".$table." WHERE ".$where;          
            $sql = $this->conn->query($sql);
            $sql = $sql->fetch_assoc();
            return $sql;
        }
    public function updateData($table, $update_value, $where){
            $this->connect();
            $sql = "UPDATE ".$table." SET ".$update_value." WHERE ".$where;        
            $sql = $this->conn->query($sql);
            if($sql == true){
                return true;
            }else{
                return false;
            }
        }
    public function createData($table, $columns, $values){

            $this->connect();
            $sql = "INSERT INTO ".$table." ".$columns." VALUES ".$values;        
            $results = $this->conn->query($sql);

            if($results == true){
                return $results;
            }else{
                return false;
                echo "Error: ".$conn->error;
            }
        }
    public function deleteData($table, $filter){
        
            $this->connect();
            $sql =  "DELETE FROM ".$table." ".$filter;  
            $sql = $this->conn->query($sql);
            if($sql == true){
                return true;
            }else{
                return false;
            }
        }
    public function countData($email){
        
            $this->connect();
            $sql = "SELECT * FROM qwe_cvappusers WHERE email ='". $email."'"; 

            $result = $this->conn->query($sql);         
            if($result->num_rows > 0){
                return true;
            }
        }

    public function query(){
            return $this->conn->query();
        }
    
    public function escape_string($value){
        return $this->conn->real_escape_string($value);
        }
}
