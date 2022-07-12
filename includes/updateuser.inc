<form class="contactForm" method="post">
    <div class="row">
        <div class="col-lg-4">
            <label for="password">Current Password</label><br />
            <input type="password" name="oldpass" id="password" required /><i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-4">
            <label for="password">New Password</label><br />
            <input type="password" name="password" id="password1" required /><i class="fa-solid fa-eye" id="togglePassword1"></i>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label for="repass">Rewrite Password</label><br />
            <input type="password" name="repass" id="password2" required /><i class="fa-solid fa-eye" id="togglePassword2"></i>
        </div>
    </div>
    <br />
    <input type="submit" class="submit" name="submit" value="Update Password" />
</form>