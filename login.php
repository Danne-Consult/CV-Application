<?php 
session_start();
if(isset($_SESSION['username'])){
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers App login - Open Talent Africa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body class="loging">
    <div class="bgimg">
        <div class="logbx">
            <div class="logform">
                <div class="logo"><a href="#"><img src="assets/images/logo.svg" alt="Open talent Africa" class="logoimg"></a></div>
                <h2>Login</h2>
                    <?php
                        if(isset($_GET['error'])){
                            echo "<div class='error-red'>". $_GET['error'] ."</div>";
                        }
                    ?>
                <form action="controller/login.php" method="POST" class="contactForm">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <label>Email</label><br />
                            <input type="email" name="emailaddress" id="emailadd" required>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <label>Password</label><br />
                            <input type="password" name="password" id="password" required><i class="fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                        <button type="submit" name="login" class="submit">Login</button> &nbsp;&nbsp;<a style="font-size:13px;" href="#"><i class="italic">Forgot password?</i></a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-11 aligncenter">
                            <br /><br />
                            <p><a href="signup.php"><i class="italic">Signup</i></a></p><br />
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="logcopy">&copy;2022 Danne Consult Ltd</div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");


        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("fa-eye-slash");
        });
    </script>
</body>
</html>