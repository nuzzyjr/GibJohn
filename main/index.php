<?php

session_start();

//assume not logged in
$logged_in = false;

//check for log in cookie
if (isset($_COOKIE["remember_me"]))
{
 
    $_SESSION["user"] = $_COOKIE["remember_me"];
    //check if stored user is student or teacher
    if (unserialize($_SESSION["user"])[2] == "student")
    {
        
       header("Location: student_dashboard.php");
    }
    else
    {
       
        header("Location: teacher_dashboard.php");
    }
}
//if no cookie check for session user
elseif  (isset($_SESSION["user"]))
{  
    if (unserialize($_SESSION["user"])[2] == "student")
    {
        
        header("Location: student_dashboard.php");
    }
    else
    {
       
       header("Location: teacher_dashboard.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:10px; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <button class="btn btn-info" onclick="location = href='sign-up.php'" style="float:right;margin-right:10px; box-shadow:none; color:black; max-height: 4vw;" >Log in/Sign up</button>
    </nav>

    
    <div class="container-fluid min-height" style="margin:0px;">
        <div class="row" style="margin-top:10px;">
        <!--ROW 1!!-->
            <div class="col-md-6"><img src="images/elearningimg.jpg" style="height: 30vw;"/></div>
            <div class="col-md-6">

                <div class="help" style="max-height: 30vw; margin:0;overflow: visible;">

                    <h5 class="card-title">What do we do?</h5>
                    <p class="card-text">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis diam eu enim fermentum rhoncus. Morbi euismod nulla commodo, consequat ligula ut, hendrerit dui. Nam sapien nunc, scelerisque quis mi a, tempor porta enim. Integer molestie ac nibh condimentum cursus. Etiam faucibus euismod tincidunt. Cras sagittis lacus eget condimentum fringilla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam suscipit nulla non tellus eleifend interdum. Phasellus bibendum metus ut arcu sodales, a gravida magna scelerisque. Vivamus et ultrices justo. Etiam ac metus nec diam ullamcorper bibendum nec nec tortor. Sed consectetur interdum quam ac accumsan. Proin quis efficitur risus.

Maecenas euismod arcu sollicitudin erat venenatis pretium. Suspendisse sit amet lobortis dui. Sed hendrerit luctus lorem, et porttitor nisi consequat eget. Ut vestibulum puruserdum.</p>
                    <a href="sign-up.php" class="btn btn-outline-primary">Get Started</a>
                </div>
            </div>
        </div>
    
    <!--ROW 2!!-->
    </br>
    <div class="row section ">
        <div class="col-md-12" style="height:10vw; opacity: 0.85; background-color: black;"></div>
    </div>
    <!--ROW 3!!-->
    <div class="row" style="margin-top:10px;">
        
        <div class="col-md-6">
            <div class="help" style="max-height: 30vw; margin:0;overflow: visible;">
    
                <h5 class="card-title" >Start your future now</h5>
                <p class="card-text">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculisnsequat ligula ut, hendrerit dui. Nam sapien nunc, scelerisque quis mi a, tempor porta enim. Integer molestie ac nibh condimentum cursus. Etiam faucibus euismod tincidunt. Cras sagittis lacus eget condimentum fringilla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam suscipit nulla non tellus eleifend interdum. Phasellus bibendum metus ut arcu sodales, a gravida magna scelerisque. Vivamus et ultrices justo. Etiam ac metus nec diam ullamcorper bibendum nec nec tortor. Sed consectetur interdum quam ac accumsan. Proin quis efficitur risus.

Maecenas euismod arcu sollicitudin erat venenatis pretium. Suspendisse sit amet lobortis dui. Sed hendrerit luctus lorem, et porttitor nisi consequat eget. Ut vestibulum purus id justo varit luctus lorem, et porttitor nisi consequat eget. Ut vestibulum purus id justo varit luctus lorem, et porttitor nisi consequat eget. Ut vestibulum purus id justo varius sagittis. Vivamus vulputate laoreet dictum. Maecenas in vestibulum nulla, id imperdiet erat. Nullam in ipsum egestas, porta diam a, scelerisque felis. Fusce eu pretium odio, quis facilisis felis. Aenean eleifend lobortis libero, ut pharetra massa volutpat sit amet. Sed luctus vitae lectus et interdum.</p>
                <a href="sign-up.php" class="btn btn-outline-primary ">Get Started</a>
            </div>
        </div>
        <div class="col-md-6"><img src="images/elearningimg.jpg" style="height: 30vw;"/></div>
    </div>
    
   <!--FOOTER-->
    <footer>
        <div class="row section " style="margin:0px;">
            <div class="col-md-12 footer" style="margin:0;" >
            <p style="color:white;"></br>Find us at:</br>
            Instagram: @GibJohn</br>
            Facebook: @GibJohn</br>
            Email: gibjohn@gmail.com</br>
            Phone: 07473820938
            </p>
            </div>
        </div>
    </footer>

</body>
</html>
