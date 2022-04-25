<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    
   <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <a style="float:right; margin-right: 10px;" href="log-out.php" class="btn btn-danger">Log out</a>
    </nav>

    <!--MAIN PAGE-->
    <div class="container min_height" style="width:44vw;">
        <div class="row" style="padding-top: 15vh;">
            <div class="col-md-12">
            <button class="btn btn-primary tall" onclick="location = href='student_monitor.php'" style="margin:15px; width:40vw;" >Monitor Students</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <button class="btn btn-danger tall" onclick="location = href='create_quiz.php'" style="margin:15px;width:40vw;" >Create Quiz</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <button class="btn btn-primary tall" onclick="location = href='create_course.php'" style="margin:15px;width:40vw;" >Create Course</button>
            </div>
        </div>
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