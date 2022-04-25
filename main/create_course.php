<?php 
    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  
</head>
<body id="main_body">
      
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <a style="float:right; margin-right: 10px;" href="teacher_dashboard.php" class="btn btn-danger">Back</a>
    </nav>
    <!--Main body -->
    <div class="container min_height">
        <!-- Course creation form-->
        <form id="courseForm" method="POST" action="create_course_action.php" style="margin:auto; width:60%; padding-top: 3vh;" >

            <h3>Create Course</h3>  
        
            <label for="courseName">Course Name</label>
            <input type="text" placeholder="e.g Science 101" id="courseName" name="courseName" class="form-control" required/>
            <br/>
            <label for="courseDescription">Course Description</label>
            <input type="text" placeholder="e.g This course teaches..." id="courseDescription" name="courseDescription" class="form-control" required/><br/>
            
            <label for="subtitle1">Subtitle</label>
            <input type="text" id="subtitle1" name="subtitle1" class="form-control" required/><br/>
            <label for="paragraph1">Paragraph 1:</label>
            <textarea id="paragraph1" name="paragraph1" class="form-control"></textarea><br/>
    
            <button type="submit" id="submitform"  class="btn btn-primary">Create Course</button>
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

</body>
</html>