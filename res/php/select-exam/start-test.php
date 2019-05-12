<?php
if(isset($_POST['start-test']))
{
    session_start();
    $subject_name = $_SESSION['subject-name'] = $_POST['subject-name'];
    $test_name = $_SESSION['test-name'] = $_POST['test-name'];

    $user = $_SESSION['user'];
    $email = $user[2];

    //Check if the user has already appeared for the test
    include_once './config/dbconnection.php';
    
    $sqlQuery = "SELECT * FROM results WHERE email = '$email' AND subject_name='$subject_name' AND test_name='$test_name'" ;
    
    //SQL Query to load the question paper
    $result_database = $conn->query($sqlQuery);
    $result = $result_database -> fetch_row();
    if($result){
        echo "<script> callSnackBar('You have already appeared for the test'); </script>";
    }
    else{
        header("Location: ./exam.php");
    }

    
}
?>