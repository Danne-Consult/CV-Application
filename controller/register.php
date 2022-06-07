<?php
    include "../manage/_db-conf/dbconf.php";
   $db = new DBconnect;

    if(isset($_POST["submit"])){

        //grabbing data
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $email = $_POST["emailaddress"];
        $password = $_POST["passwd"];
        $passrepeat = $_POST["repasswd"];
        $randomid= "";

        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        function checkUser($emailadd){
            $db = new DBconnect;
            $prefix = $db->prefix;

            $sql1 = "SELECT * FROM ".$prefix."cvappusers WHERE email='$emailadd'";
            $result = $db->conn->query($sql1);

            if(!$result){
                header("location:../signup.php?error=userexists");
            }
            return $result;
        }
        function resister($fname,$lname,$gender,$email,$password,$randomid){

            $db = new DBconnect;
            $prefix = $db->prefix;
            date_default_timezone_set("Africa/Nairobi");
			$currdatetime= date("y-m-d h:i:s");

            $hashedpw = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO ".$prefix."cvappusers (firstname, lastname, gender, email, passwd, usercode, createdon) VALUES ('$fname','$lname','$gender','$email','$hashedpw','$randomid','$currdatetime')";

            $result = $db->conn->query($sql);
            if(!$result){
                header("location:../signup.php?error=cannot register");
            }else{
                $sql2="SELECT * FROM ".$prefix."cvappusers WHERE email='$email'";
				$result =  $db->conn->query($sql2);
				$trws = mysqli_num_rows($result);
				if($trws==1){
                    session_start();
                    session_regenerate_id();
	                $new_sessionid = session_id();
					$rws =  $result->fetch_array();
					$_SESSION['userid']=$rws['usercode'];
					$_SESSION['username'] = $rws['firstname'];
					$_SESSION['lastlogintime'] = time();

                    if(!$_SESSION['userid'] == ""){
                        $sqlx= "UPDATE ".$prefix."cvappusers SET lastlogintime='$currdatetime' WHERE email='$email'";
                        $db->conn->query($sqlx);
                        header("location:../home.php?status=Registration successful");  	  
                    }else{
                        header("location: ../signup.php?error=unable to register user. Contact the administrator");
                    }
                }else{
                    header("location: ../signup.php?error=unable to register user. Contact the administrator");
                    exit();
                }
            }
            return $result;
        }

        $randomid = generateRandomString();
        checkUser($email);
        resister($fname,$lname,$gender,$email,$password,$randomid);
  


        //header("location:home.php?error=none");
    }
?>