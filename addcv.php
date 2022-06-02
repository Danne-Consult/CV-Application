<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add CV:CV App</title>

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
                        <h3>Add CV</h3>
                        <?php 
                            include "includes/addcv.inc";
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
        $(document).ready(function() {
            			
			$(".delete").click(function(){
				return confirm("Are you sure you want to delete this record?");	
			});
			
			$(document).on('click', '.moreschool' ,function(){
				$('.com-edu').append('<div class="educont" ><hr /><div class="row"><div class="col-lg-6"><label for="work">School/institution</label><br /><input type="text" name="institution[]" /></div><div class="col-lg-4"><label for="comyear">Year of completion</label><br /><input type="text" name="comyear[]" /></div></div><div class="row"><div class="col-lg-6">  <label for="schoolcomment">Achievements/Comments</label><br /><textarea rowspan="3"  name="schoolcomment[]" ></textarea></div><div class="col-lg-6">       <div class="addbtnbx moreschool"><i class="fa-solid fa-circle-plus"></i></div><div class="delbtnbx deleteedu"><i class="fa-solid fa-circle-minus"></i></div>      </div>    </div></div>');
			});
			$(document).on('click','.deleteedu', function(){
				$(this).closest(".educont").remove();
			});

            $(document).on('click', '.morework' ,function(){
				$('.com-work').append('<div class="workcont" ><hr /><div class="row">   <div class="col-lg-6"> <label for="work">Job/Occupation</label><br />   <input type="text" name="work[]" /> </div> <div class="col-lg-4"> <label for="workyear">Year of completion</label><br />  <input type="text" name="workyear[]" /> </div>  </div> <div class="row"> <div class="col-lg-6">  <label for="workcomment">Achievements/Comments</label><br /> <textarea rowspan="3"  name="workcomment[]" ></textarea>  </div> <div class="col-lg-6">  <div class="addbtnbx morework"><i class="fa-solid fa-circle-plus" id="addbtn"></i></div> <div class="delbtnbx deletework"><i class="fa-solid fa-circle-minus"></i></div> </div> </div></div>');
			});
			$(document).on('click','.deletework', function(){
				$(this).closest(".workcont").remove();
			});
        });
    </script> 
</body>
</html>