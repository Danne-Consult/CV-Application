<?php

    class signUpController extends Signup{
        public $fname;
        public $lname;
        public $gender;
        public $email;
        public $password;
        public $passrepeat;

        public function __construct($fname, $lname, $gender, $email, $password, $passrepeat){
            $this->fname = $fname;
            $this->lname = $lname;
            $this->gender = $gender;
            $this->email = $email;
            $this->password = $password;
            $this->passrepeat = $passrepeat;

        }

        public function signupUser(){
           if($this->emptyCheck() == false){
            header("location:signup.php?error=emptyinput");
            exit();
           }

           if($this->checkEmail() == false){
            header("location:signup.php?error=notemail");
            exit();
           }

           if($this->passMatch() == false){
            header("location:signup.php?error=passwordmismatch");
            exit();
           }

           if($this->userExists() == false){
            header("location:signup.php?error=emailexists");
            exit();
           }

           $this->setUser($this->fname, $this->lname, $this->gender, $this->email, $this->password);
        }

        public function emptyCheck(){
            $result;
            if(empty($this->fname) || empty($this->lname) || empty($this->gender)|| empty($this->email) || empty($this->password) || empty($this->passrepeat) ){
                $result = false;
            }else{
                $result = true;
            }

            return $result;
        }

        public function checkEmail(){
            $result;
            if(filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $result = true;
            }else{
                $result = false;
            }

            return $result;
        }

        public function passMatch(){
            $result;
            if($this->password == $this->passrepeat){
                $result = true;
            }else{
                $result = false;
            }

            return $result;
        }

        public function userExists(){
            $result;
            if($this->checkUser($this->email) == true){
                $result = false;
            }else{
                $result = true;
            }

            return $result;
        }


    }  