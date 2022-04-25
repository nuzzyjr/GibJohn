
<?php
    include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/db.php";

    //function that creates a student dashboard card given the appropriate arguments
    function create_card($name, $description, $id, $type){


        if ($type ==  'Quiz'){
            $button_name = 'Take quiz';
        }
        else{
            $button_name = 'Join Course';
        }

        echo'  
        <div class="card" style="display:inline-block; width:20vw; height:30vh; margin:10px;">
        <h5 class="card-header">'.$type.'</h5>
        <div class="card-body">
            <h5 class="card-title">'.$name.'</h5>
            <p class="card-text" style="height:10vh;">'.$description.'</p>
            <form method="POST" action="'.$type.'_template.php">
            <input type="hidden" name="hiddenId" value="'.$id.'"/>
            <button class="btn btn-primary" type="submit">'.$button_name.'</button>
            </form>
        </div>
        </div>';
    }

    //function that populates student dashbaord with courses. Calls above create_card function
    function populate_courses()
    {
        
        $conn = get_conn();
        $result = mysqli_query($conn, "
        
        SELECT courseName, courseDescription, courseId FROM courses

        ");
        while ($row = $result->fetch_assoc()) {
            
            create_card($row['courseName'], $row['courseDescription'], $row['courseId'], 'Course');
        }
    
    }
    //function that populates student dashbaord with quizzes. Calls above create_card function
    function populate_quizzes()
    {
        
        $conn = get_conn();
        $result = mysqli_query($conn, "
        
        SELECT quizName, quizDescription, quizId FROM quizzes

        ");

        while ($row = $result->fetch_assoc()) {
            
            create_card($row['quizName'], $row['quizDescription'], $row['quizId'], 'Quiz');  
        }
    
    }

    //function to populate teacher monitor page courses dropdown
    function teacher_course_options(){

        $conn = get_conn();
        $result = mysqli_query($conn, "SELECT courseName, courses.courseId
        FROM enrols
        INNER JOIN courses
        ON enrols.courseId = courses.courseId WHERE enrols.teacherId = '".get_id_teacher()."'");

        if($result->num_rows === 0){
        echo "<option value='none'>None</option>";
        }
        
        else{
            while ($row = $result->fetch_assoc()) {
            
                echo "<option name='courseOption' value='".$row['courseId']."' id='courseName' >".$row['courseName']."</option>";
                
            }
        }
        
    }
    //function to populate teacher monitor page quizzes dropdown
    function teacher_quiz_options(){

        $conn = get_conn();
        $result = mysqli_query($conn, "SELECT quizName, quizId FROM quizzes");

        if($result->num_rows === 0){
        echo "<option value='none'>None</option>";
            
        }
        else{
            while ($row = $result->fetch_assoc()) {
            
                echo "<option  name='quizOption' value='".$row['quizId']."' id='quizName'>".$row['quizName']."</option>";
            }
        }
    }
    /*this function takes data from the courses search bar and uses 
    it to repopulate the dashbaord with search results */
    function searchbar($search_criteria){

        $conn = get_conn();
        $resultcourses = mysqli_query($conn, "SELECT courseName, courseDescription, courseId FROM courses WHERE courseName LIKE '%".$search_criteria."%'");
        $resultquizzes = mysqli_query($conn, "SELECT quizName, quizDescription, quizId FROM quizzes WHERE quizName LIKE '%".$search_criteria."%'");

        while ($row = $resultcourses->fetch_assoc()) {
            
            create_card($row['courseName'], $row['courseDescription'], $row['courseId'], 'Course');
            
        }
        while ($row = $resultquizzes->fetch_assoc()) {
            
            create_card($row['quizName'], $row['quizDescription'], $row['quizId'], 'Quiz');   
        }
    }

    //Finds quiz or course name of selected dropdown and sets a heading beneath
    function selected_name($Id, $type){

        if ($type == 'course'){
            $result = mysqli_query(get_conn(), "SELECT courseName FROM courses WHERE courseId = '".$Id."'");
            while ($row = $result->fetch_assoc()){
                echo '<h2>'.$row['courseName'].'</h2>';
            }
        }
        else{
            $result = mysqli_query(get_conn(), "SELECT quizName FROM quizzes WHERE quizId = '".$Id."'");
            while ($row = $result->fetch_assoc()){
                echo '<h2>'.$row['quizName'].'</h2>';
            }
        }
    }
?>