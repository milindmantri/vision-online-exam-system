<?php 
include_once './config/dbconnection.php';
include_once './res/php/navigation.php';
$ans =$_POST['answer'];

//Change the string into array
$answer = preg_split ("/\,/", $ans);  

session_start();

//Get info about user
$user = $_SESSION['user'];


//Getting the subject name and test name
$subject_name = $_SESSION['subject-name'];
$test_name = $_SESSION['test-name'];


//Forming the name of the database using the subject name and the test name
$database_name = $subject_name . "_" . $test_name;
$database_name = preg_replace('/\s+/', '', $database_name);

$sqlQuery = "SELECT * FROM `$database_name`" ;

//SQL Query to load the question paper
$paper = $conn->query($sqlQuery);

//Start Checking the answers
$i=0;
$questions_attempted=0;
$answers_correct=0;
$answers_wrong=0;
while($question = $paper->fetch_row())
{
    $i++;

    if($answer[$i]!=0){
        $questions_attempted++;
    }
    if($question[6]==$answer[$i]){
        $answers_correct++;
    }
    else{
        $answers_wrong++;
    }
}
$total_question = $i;
$total_marks = $i*5;
$marks_obtained = $answers_correct * 5;
$percentage = $marks_obtained/$total_marks*100;


//Save the result in database
$sqlQuery = "INSERT INTO results VALUES ('$user[2]','$subject_name','$test_name','$total_question','$questions_attempted','$answers_correct','$total_marks ','$marks_obtained','$percentage')";
$conn->query($sqlQuery);

$paper->close();
$conn -> close();

$_SESSION['exam-over']="Exam Over";

echo 'true';

?>