<?php

use LDAP\Result;

//checks if session has already started before trying to start one
if(!isset($_SESSION)) { 
    session_start(); 
} 

//handy function to return the connection to my database easily.
function get_conn(){
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "GibJohn";   

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ("Could not connect to database.");
    return $conn;
}
//handy function to return the student id of the current user
function get_id(){

    $email = unserialize($_SESSION["user"])[0];    
    $user_id = current(get_conn()->query("SELECT studentId FROM students WHERE email = '".$email."'")->fetch_assoc());
    return $user_id;
}
//handy function to return the teacher id of the current user
function get_id_teacher(){

    $email = unserialize($_SESSION["user"])[0];    
    $user_id = current(get_conn()->query("SELECT teacherId FROM teachers WHERE email = '".$email."'")->fetch_assoc());
    return $user_id;
}

//returns the number of reward points that the current user has
function get_reward_points(){

    $email = unserialize($_SESSION["user"])[0];
    $reward_points = mysqli_query(get_conn(), "SELECT rewardPoints FROM students WHERE email = '".$email."'");

    while ($row = $reward_points->fetch_assoc()) {
        echo $reward_points_new = $row['rewardPoints'];
    }
  
    return $reward_points_new;
}

//function to echo personal details onto the the screen. Used for account page
function my_details(){

    $conn = get_conn();
    $user_id = get_id();
    
    $query = "SELECT * FROM students WHERE studentId = '".$user_id."'";

    $result = mysqli_query($conn, $query);

    while ($row = $result->fetch_assoc()) {
        echo 'Email: '.$row['email'].'</br>';
        echo 'First Name: '.$row['fname'].'</br>';
        echo 'Second Name: '.$row['sname'].'</br>';
    }
    
}

//Echos all of the courses that the current user is enroled on. Used for account page.
function get_courses(){
    
    $query = " SELECT courseName FROM enrols INNER JOIN courses ON enrols.courseId = courses.courseId WHERE studentId = '".get_id()."'";

    $result = mysqli_query(get_conn(), $query);

    while ($row = $result->fetch_assoc()){
        echo $row['courseName'];
        echo '<br/>';
    }
}

//Echos all of the quizzes and results that the current user has. Used for account page.
function get_quizzes(){

    $query = "SELECT quizName, quizResult, dateOfCompletion FROM quizResults INNER JOIN quizzes ON quizResults.quizId = quizzes.quizId WHERE studentId = '".get_id()."'";

    $result = mysqli_query(get_conn(), $query);

    while ($row = $result->fetch_assoc()){
        echo $row['quizName']. ' : '. $row['quizResult'] ;
        echo '<br/>';
    }
}

/* Calculates how many reward points to give based off of quiz score
then adds the reward points to user */
function add_reward_points($score){

    if ($score >= 90 ){
        $reward_points = 10;
    }
    elseif($score >=75){
        $reward_points = 7;
    }
    elseif($score >=50){
        $reward_points = 5;
    }
    elseif($score >=30){
        $reward_points = 2;
    }

    else{
        $reward_points = 0;
    }

    if ($reward_points != 0){

        $result = mysqli_query(get_conn(), "SELECT rewardPoints FROM students WHERE studentId ='".get_id()."'");
        
        while ($row = $result->fetch_assoc()) {
            $current_points = $row['rewardPoints'];
        }

        $new_points = intval($current_points) + $reward_points;

        strval($new_points);
 
        mysqli_query(get_conn(), "UPDATE students SET rewardPoints='".$new_points."' WHERE studentId='".get_id()."'");
    }
}

/*Ran after a user has tried to create a course.
This function inserts all of the new course details into the database. */
function create_course($courseName, $courseDescription, $subtitle, $paragraph){

    $courseContent = "<h2>".$courseName."</h2><p>".$subtitle."</p><p>".$paragraph."</p>";

    $sql = "INSERT INTO courses (courseName, courseDescription, teacherId, CourseSectorId, courseContent) VALUES ('".$courseName."', '".$courseDescription."', '".get_id_teacher()."', '1', '".$courseContent."')";

    mysqli_query(get_conn(), $sql);
}

/*
Enrols the student onto a course by inserting their details into enrols table
*/
function enrol($studentId, $courseId){

    $taken = mysqli_query(get_conn(), "SELECT enrolId FROM enrols WHERE courseId = '".$courseId."' AND studentId = '".$studentId."'");
  
    if (mysqli_num_rows($taken) != 0)
    {
    //results found
    } else {
    // results not found
        $result = mysqli_query(get_conn(), 'SELECT teacherId FROM courses WHERE courseId = "'.$courseId.'"');
        $date = date("Y-m-d");
        
        while ($row = $result->fetch_assoc()){
            $teacherId = $row['teacherId'];
        }
        
        mysqli_query(get_conn(), "INSERT INTO enrols (studentId, teacherId, courseId, currentProgress, dateOfEnrol)
            VALUES ('".$studentId."', '".$teacherId."', '".$courseId."', '0', '".$date."')");
        
    }
}

?>