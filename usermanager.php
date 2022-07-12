<?php
   include "controller/sessioncheck.php";
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management:CV App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
   <?php
        include "includes/navigation.inc";
   ?>
    <div class="container12 bodybox">
        <?php
            include "includes/sidenav.inc";
        ?>
        <div class="mainbar">
            <article>
                <div class="row">
                    <div class="col-lg-12">
                        <h3>User Management</h3>
                        <?php
                        if(isset($_POST['submit'])){

                            include("manage/_db-conf/dbconf.php");
                            $db = new DBconnect();
                                                        
                            $oldpass = $db->escape_string($_POST["oldpass"]);
                            $password = $db->escape_string($_POST["password"]);
                            $repass = $db->escape_string($_POST["repass"]);
                            
                            

                            function checkpass($oldpass, $newpass, $newpassrepeat){
                                $db = new DBconnect();
                                $prefix = $db->prefix;
                                $userid = $_SESSION["user"];
                                date_default_timezone_set('Africa/Nairobi');

                                $sql="SELECT passwd FROM ".$prefix."cvappusers WHERE id = '$userid'";
                                $result = $db->conn->query($sql);
                                $rws = $result->fetch_array();
                                $passhash = $rws['passwd'];

                                if(password_verify($oldpass,$passhash)){
                                    if($newpass!==$newpassrepeat){
                                        echo "<div class='error-red'>New password mismatch</div>";
                                    }else{
                                        $hashedpw = password_hash($newpass, PASSWORD_DEFAULT);
                                        $sql1 = "UPDATE ".$prefix."cvappusers SET passwd ='$hashedpw', passwordlastchange ='$currdatetime'  WHERE id = '$userid'";

                                        $result1 = $db->conn->query($sql1);

                                        if($result1){
                                            echo "<div class='success-green'>Password changed</div>";
                                        }else{
                                            echo "<div class='error-red'>Error changing password!</div>";
                                        }
                                    }
                                }else{
                                    echo "<div class='error-red'>Wrong current password</div>";
                                }
                            }
                            checkpass($oldpass, $password, $repass);
                        } 
                         include "includes/updateuser.inc";
                        ?>
                    </div> 
                </div>
            </article>
        </div>
    </div>
    <footer>
        <article>
            <div class="copy">&copy;2022. Open Talent Africa</div>
        </article>
    </footer>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#password1");

        const togglePassword2 = document.querySelector("#togglePassword2");
        const password2 = document.querySelector("#password2");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });

        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });

        togglePassword2.addEventListener("click", function () {
            // toggle the type attribute
            const type = password2.getAttribute("type") === "password" ? "text" : "password";
            password2.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });
      
    </script>
</body>
</html>