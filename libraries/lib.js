    
//Changes the highlighted option depending which one is last clicked
function change_class(id){

    document.getElementById('addQuestion5').className = "btn btn-primary";
    document.getElementById('addQuestion10').className = "btn btn-primary";
    document.getElementById('addQuestion15').className = "btn btn-primary";
    document.getElementById('addQuestion20').className = "btn btn-primary";

    document.getElementById(id).className = "btn btn-outline-primary";
}

//changes how many questions are displayed on quiz creation page depending on selected option
function add_question(loop_num){
    
    
    var mySpan = document.getElementById('mySpan');
    mySpan.innerHTML = "";

    count = 1;
    for (let i = 0; i < loop_num; i++) {

        var question = '<input type="hidden" name="qAmount'+loop_num+'"/><label for="q'+count+'">Q'+count+': Title</label><input type="text" placeholder="What is cat in spanish?" id="q'+count+'" name="q'+count+'" class="form-control" required/><br/><p>Please select the option with the correct answer</p><input type="radio" name="radioq'+count+'" id="radioq'+count+'option1" style="float:left; margin-right: 1vw; margin-left:1vw;" class="form-check-input" required/><input style="width:30%" type="text" placeholder="Option 1" id="q'+count+'option1" name="q'+count+'option1" class="form-control" required/><input type="radio" name="radioq'+count+'"  id="radioq'+count+'option2" style="float:left; margin-right: 1vw; margin-left:1vw;" class="form-check-input"/><input style="width:30%" type="text" placeholder="Option 2" id="q'+count+'option2" name="q'+count+'option2" class="form-control" required/><input type="radio" name="radioq'+count+'"  id="radioq'+count+'option3" style="float:left; margin-right: 1vw; margin-left:1vw;" class="form-check-input"/><input style="width:30%" type="text" placeholder="Option 3" id="q'+count+'option3" name="q'+count+'option3" class="form-control" required/><br/>';
        mySpan.innerHTML += question;
        count += 1;
    }
}

//checks which is selected and loops through every option, submits form
function add_values(){

    if( document.getElementById("addQuestion5")){
        if (document.getElementById("addQuestion5").class == "btn btn-outline-primary"){
            count = 5;
        } 
    }
    if( document.getElementById("addQuestion10")){
        if (document.getElementById("addQuestion10").class == "btn btn-outline-primary"){
            count = 10;
        } 
    }
    if( document.getElementById("addQuestion15")){
        if (document.getElementById("addQuestion15").class == "btn btn-outline-primary"){
            count =15;
        } 
    }
    if( document.getElementById("addQuestion20")){
        if (document.getElementById("addQuestion20").class == "btn btn-outline-primary"){
            count = 20;
        } 
    }

    for (let i = 1; i < count; i++) {
        for (let x= 1; x < 4; x++){
            if (document.getElementById('q'+i+'option'+x).value){
            
                document.getElementById('radioq'+i+'option'+x).value = document.getElementById('q'+i+'option'+x).value;
                
                var quizForm =  document.getElementById("quizForm");
                quizForm.action = 'create_quiz_action.php';
                quizForm.submit();
            }
            else{
                break;
            }
            
        }

    }
    
}