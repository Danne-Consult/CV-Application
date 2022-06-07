 <header>
    <article>
        <div class="topnav">
            <div class="leftfloater">
                <div class="logo">
                    <img src="assets/images/logo.svg" alt="Open Talent Africa">
                </div>
            </div>
            <div class="rightfloater">
                <ul class="topdropdown">
                    <li>Hi <b><?php echo $_SESSION['username']; ?></b></li>
                    <li><a href="#"><i class="fa-solid fa-gear"></i> My Account</a>
                        <ul>
                            <li><a href="usermanager.php">Password management</a></li>
                            <li><a href="controller/logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </article>
</header>