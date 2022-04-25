<?php
    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";

    //function to course content into the course view page.
    function insert_content(){
       
        $result =mysqli_query(get_conn(), "SELECT courseContent FROM courses WHERE courseId='".$_POST['hiddenId']."'");
        
        while ($row = mysqli_fetch_assoc($result))
        {
        echo $row['courseContent'];
        }
    }
    $courseId = $_POST['hiddenId'];
    enrol(get_id(), $courseId);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!--NAVBAR -->
    <nav class="sticky-top navbar">  
        <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
        <a style="float:right; margin-right: 10px;" href="student_dashboard.php" class="btn btn-danger">Back</a>
    </nav>
    <!--Content Container -->
    <div class="quiz_content min_height">
        <br/>
        <form action="#" method="post">
            <?php insert_content(); ?>
            <br/>
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