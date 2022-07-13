<?php
	session_start();

    include("../_db-conf/dbconf.php");

    function login($user,$pass){
        
        $db = new DBconnect;
        $prefix = $db->prefix;

        $sql = "SELECT * FROM ".$prefix."manageusers WHERE username='$user'";
        $result = $db->conn->query($sql);
        $trws = mysqli_num_rows($result);
        $rws = $result->fetch_array();
        $passhash = $rws['password'];


        if($trws==1){
            if(password_verify($pass,$passhash)){
                $_SESSION['user']= $rws['id'];
                $_SESSION['userid']= $rws['userid'];
                $_SESSION['adminname'] = 'Administrator';
                $_SESSION['usertype'] = $rws['type'];
                $_SESSION['lastlogintime'] = time();
                date_default_timezone_set("Africa/Nairobi");
			    $currdatetime= date("y-m-d h:i:s");

                
                if(!$_SESSION['userid'] == ""){
                    $sqlx= "UPDATE ".$prefix."manageusers SET lastlogin='$currdatetime' WHERE username='$user'";
                    $db->conn->query($sqlx);
                    header("location:../home.php");  	  
                }else{
                   header("location: ../login.php?error=unable to login");
                   exit();
                }
            }else{
                header('location:../login.php?error=Invalid password');
                exit();
            }
        }else{
            header("location: ../login.php?error=No record found");
            exit();
        }
        
    }

    if(isset($_SESSION['adminname'])){
		header('location:../home.php');
	}else{
 
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            login($username,$password);

        }else{
            header('location:../login.php?error=Login first');
        }
    }
	
?>
