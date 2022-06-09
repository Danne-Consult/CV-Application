
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Open Talent Africa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>
    <div class="bgimg">
        <div class="signform">
            <div class="logform">
                <div class="logo"><a href="Home.php"><img src="assets/images/logo.svg" alt="Open talent Africa" class="logoimg"></a></div>
                <h2>Signup</h2>
                <form action="controller/register.php" method="POST" class="contactForm">
                    <div class="row">
                        <div class="col-lg-6"> 
                            <label>First Name</label><br />
                            <input type="text" name="fname" id="fname" required>
                        </div>
                        <div class="col-lg-6">
                            <label>Last name</label><br />
                            <input type="text" name="lname" id="lname" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6"> 
                            <label>Gender</label><br />
                            <select name="gender" required>
                                <option value="">...</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="Other">other</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Email</label><br />
                            <input type="email" name="emailaddress" id="email" required>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-lg-6"> 
                            <label>Password</label><br />
                            <input type="password" name="passwd" id="password" required><i class="fa-solid fa-eye" id="togglePassword"></i>
                        </div>
                        <div class="col-lg-6">
                            <label>Repeat password</label><br />
                            <input type="password" name="repasswd" id="password1" required><i class="fa-solid fa-eye" id="togglePassword1"></i>
                        </div>
                    </div>
                    <br />
                    <button type="submit" name="submit" class="submit">Register</button>
                    <br />
                </form>
            </div>
            <div class="logcopy">&copy;2022 Danne Consult Ltd</div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#password1");

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
      
    </script>
</body>
</html>