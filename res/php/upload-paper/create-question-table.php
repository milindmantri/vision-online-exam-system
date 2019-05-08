<?php

/*Getting the selected subject name and the provided test name*/
$subject_name = $_POST['subject-name'];
$test_name = $_POST['test-name'];

//Flag variable to check of the test name already exists
$test_flag = 0;

/*Save the new tests names in the subjects index*/
include_once './res/php/upload-paper/update-test-list.php';

if($test_flag == 0)
{
    /*Creating a name for the database using the subject name and the test name*/
    $database_name = $subject_name."_".$test_name;
    $database_name=preg_replace('/\s+/', '', $database_name);

    /*SQL Query to create a new table for the new question paper*/
    $sqlQuery = "CREATE TABLE IF NOT EXISTS `$database_name` (
        id      INT AUTO_INCREMENT PRIMARY KEY,
        ques    VARCHAR (500),
        op1     VARCHAR(100),             
        op2     VARCHAR(100),    
        op3     VARCHAR(100),        
        op4     VARCHAR(100),
        ans     VARCHAR(10)   
    );";

    /*Database is successfully created*/
    if ($conn->query($sqlQuery) === TRUE) {
        $database_flag=1;
    }

    /*Database couldn't be created*/ 
    else {
        $database_flag=0;
    }
}

//When the file name already exist, display an error message
else{
    echo "<script> callSnackBar('Test Name Already Exist. <br>Please Choose a different name.'); </script>";
}

?>