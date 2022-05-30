<?php

    if(isset($_POST["submit"])){
        //grabbing data
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $email = $_POST["emailaddress"];
        $password = $_POST["passwd"];
        $passrepeat = $_POST["repasswd"];

        //bring in classes
        include "manage/_db-conf/dbconf.php";
        include "manage/controller/signup_control.php";
        include "manage/controller/usersignup.php";

        $user = new signUpController($fname,$lname,$gender,$email,$password,$passrepeat);

        //error handlers
        $user->signupUser($fname,$lname,$gender,$email,$password);

        //back to front page
        header("location:home.php?error=none");
    }
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Open Talent Africa</title>
</head>
<body>
    <div class="bgimg">
        <div class="logbx">
            <div class="logform">
                <div class="logo"><a href="#"><img src="assets/images/logo.svg" alt="Open talent Africa" class="logoimg"></a></div>
                <h2>Signup</h2>
                <form action="#" method="POST">
                    <label>First Name</label><br />
                    <input type="text" name="fname" id="fname" required><br />
                    <label>Last name</label><br />
                    <input type="text" name="lname" id="lname" required><br />
                    <label>Gender</label><br />
                    <select name="gender" required>
                        <option value="">...</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">other</option>
                    </select><br />
                    <label>Email</label><br />
                    <input type="email" name="emailaddress" id="email" required><br />
                    <label>Password</label><br />
                    <input type="password" name="passwd" id="password" required><br />
                    <label>Repeat password</label><br />
                    <input type="password" name="repasswd" id="password" required><br /><br />
                    <button type="submit" name="submit" class="submit">Register</button>
                    <br />
                </form>
            </div>
            <div class="logcopy">&copy;2022 Open Talent CV App</div>
        </div>
    </div>
</body>
</html>