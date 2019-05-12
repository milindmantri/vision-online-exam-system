<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="./res/css/result.css" />
</head>

<body>
    <?php
    include_once './res/html/header-result.html';
    ?>
    <div style="text-align:center; margin:1px; padding:1px; ">
    <div class="main-container" style="display:inline-block; text-align:left; ">

        <div id="result">
        <div id="result-text">Result</div>
            <div class="display-info">
                <div class="display-title">
                    <div class="padding-10"> Name: </div>
                    <div class="padding-10"> Total Questions: </div>
                    <div class="padding-10">Questions Attempted: </div>
                    <div class="padding-10">Answers Correct: </div>
                    <div class="padding-10">Total Marks: </div>
                    <div class="padding-10">Marks Obtained: </div>
                    <div class="padding-10">Percentage: </div>
                </div>

                <div class="display-value">
                    <div id="display-name" class="padding-10"></div>
                    <div id="display-total-questions" class="padding-10"></div>
                    <div id="display-questions-attempted" class="padding-10"></div>
                    <div id="display-answers-correct" class="padding-10"></div>
                    <div id="display-total-marks" class="padding-10"></div>
                    <div id="display-marks-obtained" class="padding-10"></div>
                    <div id="display-percentage" class="padding-10"></div>
                </div>

            </div>
            <div id="print-button"> <button onclick="window.print();return false;">Print</button>  </div>
        </div>
    </div>
    </div>

<script src="./res/js/result.js"></script>
</body>

</html>

<?php
include_once './config/dbconnection.php';
include_once './res/php/navigation.php';
$ans =$_GET['answer'];

//Change the string into array
$answer = preg_split ("/\,/", $ans);  


session_start();

//Get info about user
$user = $_SESSION['user'];

//Printing the candidate name
echo "<script>printName('$user[1]')</script>";

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

    if($answer[$i]==0){
        $questions_attempted++;
    }
    else if($question[6]==$answer[$i]){
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

echo "<script>fillDetails('$total_question','$questions_attempted','$answers_correct','$total_marks ','$marks_obtained','$percentage')</script>";

//Save the result in database
$sqlQuery = "INSERT INTO results VALUES ('$user[2]','$subject_name','$test_name','$total_question','$questions_attempted','$answers_correct','$total_marks ','$marks_obtained','$percentage')";
$conn->query($sqlQuery);



$paper->close();
$conn -> close();

?>