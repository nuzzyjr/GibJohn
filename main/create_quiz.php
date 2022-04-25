<?php 
    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="\projects\gibjohn\libraries\lib.js"></script>
</head>
<body id="main_body">
      
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <a style="float:right; margin-right: 10px;" href="teacher_dashboard.php" class="btn btn-danger">Back</a>
    </nav>

    <!-- Main Body-->
    <div class="container min_height">
        <!--Quiz Creation Form -->
        <form id="quizForm" method="POST" style="margin:auto; width:60%; padding-top: 3vh;" >

            <h3>Create Quiz</h3>  
            <p>Number of questions</p>
            <!-- Change number of questions-->
            <div id="buttons">
                <button class="btn btn-outline-primary" onclick="add_question(5); change_class(this.id);" id="addQuestion5" >5</button>
                <button class="btn btn-primary" onclick="add_question(10); change_class(this.id);" id="addQuestion10" >10</button>
                <button class="btn btn-primary" onclick="add_question(15); change_class(this.id);" id="addQuestion15" >15</button>
                <button class="btn btn-primary"  onclick="add_question(20); change_class(this.id);" id="addQuestion20" >20</button><br/><br/>
            </div>
            <label for="quizName">Quiz Name</label>
            <input type="text" placeholder="e.g. Maths and stats" id="quizName" name="quizName" class="form-control" required/>
            <br/>
            <label for="quizDescription">Quiz Description</label>
            <input type="text" placeholder="This quiz will test your skills on..." id="quizDescription" name="quizDescription" class="form-control" required/><br/>
            <!--Span containing variable number of question inputs -->
            <span id="mySpan">
           
            </span>
            <button type="button" id="submitform"  onclick="add_values()" class="btn btn-primary">Create Quiz</button>
        </form>
        <br/>
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

    <script lang="javascript">add_question(5);</script>
</body>
</html>