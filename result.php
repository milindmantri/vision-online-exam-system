<?php
include_once './config/dbconnection.php';
include_once './res/php/navigation.php';
// $ans =$_GET['answer'];

//Change the string into array
$answer = preg_split ("/\,/", $ans);  


session_start();

//Get info about user
$user = $_SESSION['user'];
$email = $user[2];

//Getting the subject name and test name
$subject_name = $_SESSION['subject-name'];
$test_name = $_SESSION['test-name'];

$sqlQuery = "SELECT * FROM results WHERE email = '$email' AND subject_name='$subject_name' AND test_name='$test_name'" ;

$result_database = $conn->query($sqlQuery);
$result = $result_database -> fetch_row();
if($result) { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="./res/css/result.css" />

<script type="text/javascript" >
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
    window.onhashchange=function(){window.location.hash="";}
</script>

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

//Printing the candidate name
echo "<script>printName('$user[1]')</script>";
$total_question = $result[3];
$questions_attempted = $result[4];
$answers_correct = $result[5];
$total_marks = $result[6];
$marks_obtained = $result[7];
$percentage = $result[8];

echo "<script>fillDetails('$total_question','$questions_attempted','$answers_correct','$total_marks ','$marks_obtained','$percentage')</script>";

}

else {
    echo 'Please finish your exam to check results';
}

?>