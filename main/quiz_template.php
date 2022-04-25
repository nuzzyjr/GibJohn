<?php
    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";
    function insert_content(){
        $quizId = $_POST['hiddenId'];
        $result =mysqli_query(get_conn(), "SELECT quizName, quizContent FROM quizzes WHERE quizId='".$quizId."'");
        
        while ($row = mysqli_fetch_assoc($result))
        {

            echo '<h3>'.$row['quizName'].'</h3>';
            echo $row['quizContent'];
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!-- NAVBAR-->
    <nav class="sticky-top navbar">
        <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
        <a style="float:right; margin-right: 10px;" href="student_dashboard.php" class="btn btn-danger">Back</a>
    </nav>
    
    <!--Quiz Content -->
    <div class="quiz_content min_height">
        <br/>
        <form action="quiz_submit.php" method="POST">
            <?php echo '<input type="hidden" name="hiddenId" value="'.$_POST['hiddenId'].'" />';  ?>
            <?php insert_content(); ?>
            <br/>
            <p><button type="submit" class="btn btn-primary">Submit</button></p>
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