<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Submitted</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!--NAVBAR-->
    <nav class="sticky-top navbar">
        <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    </nav>
    
    <!--Main body-->
    <div class="quiz_content min_height">
    <?php 
        include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";
        include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/quiz_results.php";

        $quizId = $_POST['hiddenId'];
        
        //get answers list
        
        $answers = mysqli_query(get_conn(), "SELECT quizAnswers FROM quizzes WHERE quizId ='".$quizId."'");

        while ($row = $answers->fetch_assoc()) {
            $answers_str = $row['quizAnswers'];
        }

        $answers_arr = explode(",", $answers_str);
        $total = count($answers_arr) - 1;

        $score = calculate_score($answers_arr);
        echo '<h1>You scored: '.$score.'/'.$total.'</h1>';
        echo '<form action="student_dashboard.php"><button type="submit" class="btn btn-primary" >Back to dashboard</button></form>';

        store_score($score,$total,$quizId);
    ?>
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