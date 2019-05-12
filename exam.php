<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam</title>
    <link rel="stylesheet" href="./res/css/exam.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
</head>

<body>
    <?php
    include_once './res/html/header-exam.html'
    ?>
    <div id="container">
        <form id="exam" class="flex-container flex-direction-row" method="post">
            <div id="question-answer" name="question-answer" class="flex-container flex-direction-column margin-10 box box-shadow">
                <div id="questions">
                    <span> Q- </span> <span id="ques-no"> </span> <br> <span id="mcq-question"></span>
                </div>
                <div id="answers" style=" display: flex; flex-direction:column; ">
                    <div> <span> A. &nbsp; </span> <span> <input type="radio" id="option1" name="option" value="A" onclick= "markOption()"> &nbsp; </span> <span id="option1-text" > </span> </div>
                    <div> <span> B. &nbsp; </span> <span> <input type="radio" id="option2" name="option" value="B" onclick= "markOption()"> &nbsp; </span> <span id="option2-text"> </span> </div>
                    <div> <span> C. &nbsp; </span> <span> <input type="radio" id="option3" name="option" value="C" onclick= "markOption()"> &nbsp; </span> <span id="option3-text"> </span> </div>
                    <div> <span> D. &nbsp; </span> <span> <input type="radio" id="option4" name="option" value="D" onclick= "markOption()"> &nbsp; </span> <span id="option4-text"> </span> </div>
                    <div>
                        <input id="prev" type="button" name="prev" class="all-button all-button-hover" value="Prev" onclick="changeQuestion(0)">
                        <input id="next" type="button" name="next" class="all-button all-button-hover" value="Next" onclick="changeQuestion(1)">
                    </div>
                    <div> <input type="button" name='review' class="all-button all-button-hover" value="Mark for Review"></div>
                </div>
            </div>

            <div id="question-attempt" class="flex-container flex-direction-column margin-10 box box-shadow">
                <div id="symbols" class="box">
                    <div class="sample-div"> <span>Visited:</span> <button id="visited" class='sample-mark'>0</button> </div>
                    <div class="sample-div"> <span>Attempted: </span> <button id="attempted" class='sample-mark'>0</button> </div>
                    <div class="sample-div"> <span>Not Visited:</span> <button id="not-attempted" class='sample-mark'>0</button></div>
                    <div class="sample-div"> <span>Mark for Review:</span> <button id="mark-review" class='sample-mark'>0</button></div>

                </div>
                <div id="mark-question" class="box"></div>
            </div>
        </form>
    </div>

    <script src="./res/js/exam.js"></script>
    <script src="./res/js/show-questions.js"></script>
</body>

</html>

<?php

include_once "./config/dbconnection.php";
session_start();

$subject_name = $_SESSION['subject-name'];
$test_name = $_SESSION['test-name'];


//Forming the name of the database using the subject name and the test name
$database_name = $subject_name . "_" . $test_name;
$database_name = preg_replace('/\s+/', '', $database_name);


$sqlQuery = "SELECT * FROM `$database_name`" ;

//SQL Query to load the question paper
$paper = $conn->query($sqlQuery);


//Find total number of questions
$total_questions = $paper->num_rows;
echo "<script> setTotalQuestions($total_questions); </script>";
echo "<script> questionNumbers($total_questions); </script>";

$paper->close();
$conn -> close();


?>