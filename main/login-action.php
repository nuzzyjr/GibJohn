<?php

include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/login.php";

//setting variables

$email = $_POST["email"];
$password = $_POST["password"];
$account_type = check_login($email, $password);

$details = array(
    $email,
    $password,
    $account_type
);

$logged_in = check_login($email, $password);


//check if user wants to be remembered


//if login successful as student
if ($logged_in == "student")
{
    if (isset($_POST["remember_me"]) && $_POST["remember_me"] == "Yes")
    {
    setcookie("remember_me", serialize($details), time() + 60*60*24*7*4*2 ); //two months cookie
    
    }
    session_start();
    $_SESSION['user'] = serialize($details);
    header("Location: student_dashboard.php");
    
}

//if login successful as teacher
else if ($logged_in == "teacher")
{
    if (isset($_POST["remember_me"]) && $_POST["remember_me"] == "Yes")
    {
    setcookie("remember_me", serialize($details), time() + 60*60*24*7*4*2 ); //two months cookie
    }
    session_start();
    $_SESSION['user'] = serialize($details);
    header("Location: teacher_dashboard.php");
    
}

//if can't log in
else
{
    session_start();
    $err = $logged_in;  
    $_SESSION['login_err'] = $err;
    header("Location: login.php");

}

?>