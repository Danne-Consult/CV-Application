<?php
    class User extends DBconnect{  
     
        public function login($email, $pass) {  
    
            $sql = "SELECT * FROM users WHERE email='".$email."' and password='".$pass."'";  
      
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                $_SESSION['login'] = true;  
                $_SESSION['id'] = $data['id'];  
                return true;  
            }
        }  
      
        public function fullname($id) {  
            $result = mysql_query("Select * from users where id='$id'");  
            $row = mysql_fetch_array($result);  
            echo $row['name'];  
        }  
      
        public function session() {  
            if (isset($_SESSION['login'])) {  
                return $_SESSION['login'];  
            }  
        }  
      
        public function logout() {  
            $_SESSION['login'] = false;  
            session_destroy();  
        }  
    }  
