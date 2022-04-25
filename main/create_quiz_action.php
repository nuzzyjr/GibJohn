<?php
include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";

$quizName = $_POST['quizName'];
$quizDescription = $_POST['quizDescription'];

if (isset($_POST['qAmount5'])){
    $loop_num = 5;
}
elseif (isset($_POST['qAmount10'])){
    $loop_num = 10;
}
elseif (isset($_POST['qAmount15'])){
    $loop_num = 15;
}
else{
    $loop_num = 20;
}



$quizContent = "";

for ($i = 1; $i <= $loop_num; $i++){

    $qname = $_POST['q'.strval($i)];

    $qname = '<p>'.'Q'.strval($i).': '.$qname.'</p>';

    $option1 = $_POST['q'.strval($i).'option1'];
    $option2 = $_POST['q'.strval($i).'option2'];
    $option3 = $_POST['q'.strval($i).'option3'];

    $quizContent = $quizContent.
    
    $qname.
    '
    <p>
    <input type="radio" class="form-check-input" name="radioq'.strval($i).'" id="q'.strval($i).'option1" value="'.$option1.'" required /> '.$option1.'

    <input type="radio" class="form-check-input" name="radioq'.strval($i).'" id="q'.strval($i).'option2" value="'.$option2.'" /> '.$option2.'

    <input type="radio" class="form-check-input" name="radioq'.strval($i).'" id="q'.strval($i).'option3" value="'.$option3.'" /> '.$option3.'

    </p>';
}

$answers = "";
$loop = true;
$x = 1;
while ($loop){
    
    if (isset($_POST['radioq'.$x])){
    
        $answers = $answers.$_POST['radioq'.$x].',';
    }

    else{
        $loop = false;
    }

    $x+=1;
   
}

$teacherId = get_id_teacher();

$sql = "INSERT INTO quizzes (quizName, quizDescription, quizContent, quizAnswers, teacherId) VALUES ('".$quizName."','".$quizDescription."','".$quizContent."','".$answers."','".$teacherId."')";
$conn = get_conn();

mysqli_query($conn, $sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Created</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
      
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    </nav>

    <!--Main div -->
    <div class="min_height" style="text-align:center">
    <h1>Quiz Created!</h1>
    <form action="teacher_dashboard.php"><button type="submit" class="btn btn-primary" >Back to dashboard</button></form>
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