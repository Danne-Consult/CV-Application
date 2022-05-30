<?php

class Signup extends DBconnect{

    protected function setUser($fname, $lname, $gender, $email, $password){
        $stmt = $this->connect()->prepare("INSERT INTO qwe_cvappusers(firstname, lastname, gender, email, passwd) VALUES(?,?,?,?,?);");

        $hashedpw = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->excecute(array($fname, $lname, $gender, $email, $hashedpw))){
            $stmt= null;
            header("location:signup.php?error=stmtfailed");
            exit();
        }

        $smtp = null;
    }

    protected function checkUser($email){
        $stmt = $this->connect()->prepare("SELECT email FROM qwe_cvappusers WHERE email=?;");
        if(!$stmt->excecute(array($email))){
            $stmt= null;
            header("location:signup.php?error=stmtfailed");
            exit();
        }

        $resultcheck;

        if ($smtp->rowCount() > 0){
            $resultcheck = false;
        }else{
            $resultcheck = true;
        }
        return $resultcheck;
    }

}