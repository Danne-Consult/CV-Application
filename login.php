<?php
	session_start();

	if(isset($_SESSION['user'])){
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers App login - Open Talent Africa</title>
</head>
<body class="loging">
    <div class="bgimg">
        <div class="logbx">
            <div class="logform">
                <div class="logo"><a href="#"><img src="assets/images/logo.svg" alt="Open talent Africa" class="logoimg"></a></div>
                <h2>Login</h2>
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
                <form action="#">
                    <label>Email</label><br />
                    <input type="email" name="emailaddress" id="emailadd"><br />
                    <label>Password</label><br />
                    <input type="password" name="password" id="password"><br /><br />
                    <button type="submit" class="submit">Login</button>
                    <br />
                    <a href="#"><i>Forgot password?</i></a>
                </form>
            </div>
            <div class="logcopy">&copy;2022 Open Talent CV App</div>
        </div>
    </div>
</body>
</html>