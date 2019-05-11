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
    include "./res/html/header-logout.html";
    ?>
        <div class="subject-container">
            <div class="main-container">
            <?php
            include "./res/html/profile.html";
            ?>
            <div style="text-align: center;">
            <p id="choose-subject-text">Choose Subject</p>
            </div>
            <form id="subject" class="padding-top" method="post" style="text-align: center;">
                <select  id="select-subject" name="subject-name" class="color-button remove-default-appearance" onchange="updateTest()">
                </select>
                <select  id="select-test" name="test-name" class="color-button remove-default-appearance">
                </select>
                <br>
                <input type="submit" id="start-test" name="start-test"  class="color-button" value="Start Test">
            </form>
        </div>
    </div>

    <script src="./res/js/select-exam.js" type="text/javascript"></script>    
</body>
</html>


<?php
session_start();
$row = $_SESSION['user'];
echo "<script> displayProfile('$row[1]','$row[2]','$row[4]','$row[5]'); </script>";
include_once './res/php/navigation.php';

include_once './res/php/select-exam/start-test.php';
?>