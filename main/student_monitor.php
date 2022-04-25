<?php 
    
    if(!isset($_SESSION)) { 
        session_start(); 
    } 

    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";
    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/course_listings.php";

    /*storing the selected option in session so that
    courses table doesnt refresh when you change quiz table and vice versa */
    if (isset($_POST['selectcourse'])){
        $courseId = $_POST['selectcourse'];
        $_SESSION['selectcourse'] = $_POST['selectcourse'];
    }
    elseif (isset($_SESSION['selectcourse'])){
        $courseId = $_SESSION['selectcourse'];
    } 
   
    else{
        $courseId = '';
    }
    
    
    if (isset($_POST['selectquiz'])){
        $quizId = $_POST['selectquiz'];
        $_SESSION['selectquiz'] = $_POST['selectquiz'];
    }
    elseif (isset($_SESSION['selectquiz'])){
        $quizId = $_SESSION['selectquiz'];
    }
    else{
        $quizId = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Monitor</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
      
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48.25%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <a style="float:right; margin-right: 10px;" href="teacher_dashboard.php" class="btn btn-danger">Back</a>
    </nav>

    
    <div class="contain_me min_height">
    <!--LEFT SIDE-->
    <div class="left-side">
    <h4>My courses</h4>
    <form method="post" action="#">
    <select name="selectcourse" onchange="this.form.submit()" class="form-select" id="myselect" style="width:25vw;" >
    <option  name='courseOption' value='none' >None</option>";
    <?php teacher_course_options(); ?>
    </select>
    </form>

    <?php echo selected_name($courseId, 'course'). 
    '<table class="table" style="width:80%;" >
            <tr>
                <th>Name</th>
                <th>Progress</th>
                <th>Enrolment Date</th>
            </tr>';
            
            $result = mysqli_query(get_conn(), "SELECT concat(fname, ' ', sname) as Name, currentProgress, dateOfEnrol FROM enrols INNER JOIN students ON enrols.studentId = students.studentId WHERE courseId = '".$courseId."'");
            
            while ($row = mysqli_fetch_array($result)) {
                    echo '
                    <tr>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['currentProgress'].'</td>
                    <td>'.$row['dateOfEnrol'].'</td>
                    </tr>';
      
            }
            echo '</table>'; ?>
    
    </div>
    
    
    <!--RIGHT SIDE-->
    <div class="right-side">
    <h4>Quiz Results</h4>
    <form method="post" action="#">
    <select name="selectquiz" onchange='this.form.submit()' class="form-select"  style="width:25vw;" >
    <option  name='quizOption' value='none' >None</option>";
    <?php teacher_quiz_options(); ?>
    </select>
    </form>
    <?php echo selected_name($quizId, 'quiz'). 
    '<table class="table" style="width:80%;" >
            <tr>
               
                <th>Student Name</th>
                <th>Result</th>
            </tr>';
            
            $result = mysqli_query(get_conn(), "SELECT quizName, quizResult FROM quizResults INNER JOIN quizzes ON quizResults.quizId = quizzes.quizId WHERE quizzes.quizId = '".$quizId."'");
            $result2 = mysqli_query(get_conn(), "SELECT concat(fname, ' ', sname) as Name FROM students INNER JOIN quizResults ON students.studentId = quizResults.studentId WHERE quizResults.quizId = '".$quizId."'");

            while ($row = mysqli_fetch_array($result)) {
                while ($rows = mysqli_fetch_array($result2)){
                    echo '
                    <tr>
                    <td>'.$rows['Name'].'</td>
                    <td>'.$row['quizResult'].'</td>
                    </tr>';
      
                }
                    
            }
            echo '</table>'; ?>
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