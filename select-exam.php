<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Exam</title>
    <link rel="stylesheet" href="./res/css/select-exam.css" />
</head>

<body>
    <?php
    include "./res/html/header.html";
    ?>
        <div class="subject-container">
            <div class="main-container">
            <?php
            include "./res/html/profile.html";
            ?>
            <p id="choose-subject-text">Choose Subject</p>
            <div id="subject" class="padding-top">
                <select id="select-subject" class="color-button" onchange="updateTest()">
                </select>
                <select id="select-test" class="color-button">
                </select>
                <br>
                <button id="start-test" class="color-button" onclick="location.href = './exam.php';">Start Test </button>
            </div>
        </div>
    </div>

    <script src="./res/js/select-exam.js" type="text/javascript"></script>


    
</body>

</html>
<?php
session_start();
$row = $_SESSION['user'];
echo "<script> displayProfile('$row[1]','$row[2]','$row[4]','$row[5]'); </script>";
?>