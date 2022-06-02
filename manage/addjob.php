<?php include "controller/session-check.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home:CV App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
            tinymce.init({
            selector: "textarea",
            plugins: [
            "insertdatetime"
            ],
            width: 700,
            height: 400
        });
    </script>
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
                <h3>Add Job</h3>
                
                <form action="#" method="post" class="contactForm">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="jobtitle">Job Title</label><br />
                            <input type="text" name="jobtitle" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="jobdesc">Job Description</label><br />
                            <textarea name="jobdesk" id="" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="jobcity">City</label><br />
                            <input type="text" name="jobcity" />
                        </div>
                   
                        <div class="col-lg-3">
                            <label for="jobcountry">Country</label><br />
                            <input type="text" name="jobcountry" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="duedate">Submission Due Date:</label><br />
                            <input type="date" name="duedate" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="tags">Short tags</label><br />
                            <input type="input" name="tags" />
                        </div>
                    </div>

                    <br>
                    <input type="submit" class="submit" name="jobsubmit" value="Save Job">
                </form>
                
            </article>
        </div>
    </div>
    <footer>
        <article>
            <div class="copy">&copy;2022. Open Talent Africa</div>
        </article>
    </footer>
</body>
</html>