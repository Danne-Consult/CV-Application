<?php
	session_start();

	if(isset($_SESSION['adminname']) ){
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
                <h2>Admin Login</h2>
                    <?php
                        if(isset($_SESSION['message'])){
                            ?>
                                <div class="alert alert-info text-center">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php
        
                            unset($_SESSION['message']);
                        }
                    ?>
                <form action="controller/login.php" method="POST" class="contactForm">
                    <label>Username</label><br />
                    <input type="text" name="username" id="username"><br />
                    <label>Password</label><br />
                    <input type="password" name="password" id="password"><br />
                    <button type="submit" name="login" class="submit">Login</button>
                    
                </form>
            </div>
            <div class="logcopy">&copy;2022. Open Talent Africa | Designed By <a href="mailto:design@danneconsult.com">Danne Consult</a></div>
        </div>
    </div>
</body>
</html>