<?php
include_once './config/dbconnection.php';

$q = intval($_GET['q']);
//Getting the session variables from previous page
session_start();
$subject_name = $_SESSION['subject-name'];
$test_name = $_SESSION['test-name'];


//Forming the name of the database using the subject name and the test name
$database_name = $subject_name."_".$test_name;
$database_name=preg_replace('/\s+/', '', $database_name);


$sqlQuery = "SELECT * FROM `$database_name` WHERE id = '".$q."'";

//SQL Query to load the question paper
$paper = $conn->query($sqlQuery);

$question = $paper->fetch_row( );

echo 
'<div id= "questions" >
    <span> Q- </span> <span id="ques-no">'.$question[0].'</span> <br> <span id="mcq-question">'.$question[1].'</span>
</div>

<div id="answers" style=" display: flex; flex-direction:column; " >
    <div> <span> A. &nbsp; </span>  <span>  <input type="radio" id="option1" name="option" value="A" onclick= "markOption(1)"> &nbsp; </span> <span id="option1-text">'.$question[2].'</span> </div>
    <div> <span> B. &nbsp; </span> <span>  <input type="radio" id="option2" name="option" value="B" onclick= "markOption(2)"> &nbsp; </span>   <span id="option2-text"> '.$question[3].' </span> </div>
    <div> <span> C. &nbsp; </span>  <span> <input type="radio" id="option3" name="option" value="C" onclick= "markOption(3)"> &nbsp; </span>  <span id="option3-text">  '.$question[4].' </span>  </div>
    <div> <span> D. &nbsp; </span>  <span> <input type="radio" id="option4" name="option" value="D" onclick= "markOption(4)"> &nbsp; </span>   <span id="option4-text"> '.$question[5].' </span> </div> 

    <div>     
    <input id="prev" type="button" name="prev" class="all-button all-button-hover" value="Prev" onclick="changeQuestion(0)"> 
    <input id="next" type="button" name="next" class="all-button all-button-hover" value="Next" onclick="changeQuestion(1)"> 
    </div>

    <div> <input type="button" name="review" class="all-button all-button-hover" value="Mark for Review" onclick="markReview()"></div>
    <div> <input type="button" name="response" class="all-button all-button-hover" value="Clear Response" onclick="clearResponse()"></div>
</div>';

$paper->close();
$conn -> close();

?>