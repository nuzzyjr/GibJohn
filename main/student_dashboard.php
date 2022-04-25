
<!DOCTYPE html>
<html lang="en">
<head>
    <script lang="javascript">
        
        //stops unwanted refresh
        if ( window.history.replaceState ) {
         window.history.replaceState( null, null, window.location.href );
    }

    //simply submits form
    function formsubmit(){
        document.getElementById("myform").submit();
    }

    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="stylesheet.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>
    
    <!--NAV BAR-->
    <nav class="sticky-top navbar">
    <img src="images/book.png" style="margin-left:48%; max-width:55px; border-radius:55px; border: 3.5px solid white; box-shadow:none; max-height: 4vw; " onclick="Location: href='index.php'" />
    <button class="btn btn-primary" onclick="location = href='account.php'" style="float:right;margin-right:10px; box-shadow:none; color:black; max-height: 4vw;" >Account</button>
    </nav>

    <!--CONTAINER-->
    <div class="container">
        <!--SEARCH BAR-->
        <div class="row" style="margin-top:7vw;">
            <div style="margin:0; padding:0;" class="col-md-2">
            <form id="myform" method="POST" action="#">
                <!--FILTER OPTIONS-->
                <center>See:</center>
                <label for="filter">All</label>
                <input class="form-check-input" type="radio" name="filter" value="1" onclick="formsubmit()" <?php if(!isset($_POST['filter']))  echo "checked='checked'"; ?> />
                <label for="filter">Courses</label>
                <input class="form-check-input" type="radio" name="filter" value="2" onclick="formsubmit()" <?php if(isset($_POST['filter'])) { if ($_POST['filter'] == '2') echo "checked='checked'"; }?> />
                <label for="filter">Quizzes</label>
                <input class="form-check-input" type="radio" name="filter" value="3" onclick="formsubmit()" <?php if(isset($_POST['filter'])) { if ($_POST['filter'] == '3') echo "checked='checked'"; }?> />
            </form>
            </div>
            <!--Searchbar -->
            <div class="col-md-8">
            <form action="#" method="post" class="d-flex">
            <input class="form-control me-sm-2" type="text" name="criteria" placeholder="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="col-md-2"></div>
        </div> 
        </div>
    </div>

    <!--COURSE LISTINGS-->
        
    <div style="margin-left: 7vw; width: 90vw;" class="min_height">
    
    <?php
        
        if (isset($_POST['filter'])){
            $choice = $_POST['filter'];
        }
        else{
            $choice = '1';
        }

        if (isset($_POST['criteria'])){
            $choice = "search";
        }

        include_once "C:/xampp/htdocs/Projects/GibJohn/libraries/course_listings.php";
        if ($choice == '1')
        {
            populate_courses();
            populate_quizzes();
        }
        elseif ($choice == '2')
        {   
            populate_courses();
        }
        elseif ($choice == '3')
        {
            populate_quizzes();
        }

        else{
            searchbar($_POST['criteria']);
        }
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