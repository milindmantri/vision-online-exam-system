<?php
if(isset($_POST['start-test']))
{
    session_start();
    $_SESSION['subject-name'] = $_POST['subject-name'];
    $_SESSION['test-name'] = $_POST['test-name'];
    header("Location: ./exam.php");
}
?>