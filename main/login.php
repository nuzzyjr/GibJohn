
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <a style="float:right; margin-right: 10px;" href="index.php" class="btn btn-danger">Back</a>
    </nav>
    <!--Log in form-->
    <div style="width:33%; margin:auto;" class="min_height">
    <h1 style="padding-top:20px;">Please log in</h1>
    <form style="padding-top:10px;" action="login-action.php" method="post">
        <!--EMAIL-->
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" required/> <br/>
        <!--Password-->
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required/> <br/>
        <!--Remember me-->
        <div style="height:30px; line-height: 30px;">
        <label for="remember_me" class="form-label" style="padding-right: 10px;" >Stay logged in?</label>
        <input  type="checkbox" name="remember_me" value="Yes" />
        </div>
        <!--Forgot Password-->
        <a style="font-size:14px; padding-right:15px;" href="">Forgot your password?</a>
        <!--Don't have an account-->
        <a style="font-size:14px;" href="sign-up.php">Don't have an account?</a>
        <!--Error message-->
        <p style="margin:0px;padding:0px;padding-bottom:10px;color:red" ><?php if (isset($_SESSION['login_err'])){ echo $_SESSION['login_err']; unset($_SESSION['login_err']); }?></p>
        <button type="submit" class="btn btn-primary">Login</button>
        
    </form>
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