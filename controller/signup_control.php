<?php
include "manage/_db-conf/dbconf.php";
$db = new DBconnect();

class Signup{

    public function setUser($fname, $lname, $gender, $email, $password){
        
        $hashedpw = password_hash($password, PASSWORD_DEFAULT);
        //$sql = "INSERT INTO qwe_cvappusers (firstname, lastname, gender, email, passwd) VALUES ('$fname','$lname','$gender','$email','$hashedpw')";
        
        $result=$db->createData("qwe_cvappusers","(firstname, lastname, gender, email, passwd)","('$fname','$lname','$gender','$email','$hashedpw')" );
        
        if(!$result){
           
            header("location:signup.php?error=Connot Add User");
            exit();
        }
        $result = null;
    }

    public function checkUser($email){

        $result = $db->countData("email",$email);
        
        if($result){
            header("location:signup.php?error=User already Exists");
        }
        return $result;
    }

}