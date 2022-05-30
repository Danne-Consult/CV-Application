<?php

class Signup extends DBconnect{

    public function setUser($fname, $lname, $gender, $email, $password){
        $this->connect();
        $hashedpw = password_hash($password, PASSWORD_DEFAULT);
        $result=$this->conn->createData("qwe_cvappusers","(firstname, lastname, gender, email, passwd)","('".$fname."','".$lname."','". $gender."','".$email."','".$hashedpw."')" );
        
        if(!$result){
           
            header("location:signup.php?error=addfailed");
            exit();
        }
        $result = null;
    }

    public function checkUser($email){
        $this->connect();

       
        $result = $this->conn->countData($email);
        
        if($result){
           
        }
        return $result;
    }

}