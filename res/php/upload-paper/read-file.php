<?php

/*On clicking the upload paper button*/
if(isset($_POST['upload-paper']))
{
    $database_flag=0;

    /* php file to create new table for the question paper*/
    include_once "./res/php/upload-paper/create-question-table.php";

    /*Flag variable to make sure that all the questions are uploaded*/
    $flag=1;

    /*Starting upload of the csv file to the database*/
    if($_FILES['fileToUpload']['name'] && $database_flag==1)
    {

        // Open the file for reading
        if (($h = fopen($_FILES['fileToUpload']['tmp_name'], "r")) !== FALSE) 
        {
        /*Removing the top row because it contains column names*/
        $data = fgetcsv($h, 1000, ",");
        
        // Convert each line into the local $data variable
        while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
        {		
            /*SQL Query to insert data*/
            $sqlQuery = "INSERT INTO `$database_name` (id,ques,op1,op2,op3,op4,ans) VALUES 
            ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
            
            /*Running the query to save the questions and options along with answers in database*/
            if ($conn->query($sqlQuery) === TRUE) {
                //echo "Done";
            }
        
            /*Error when unable to save the data*/ 
            else {
                $flag=0;
            }

            /* Display status of question paper upload */
            if($flag==1)
                echo "<script> callSnackBar('Question Paper uploaded Successfully'); </script>";
            else
                echo "<script> callSnackBar('Error in uploading questions paper'); </script>";
        }

        // Close the file
        fclose($h);
        }
    }
    else if($test_flag==0){
        /*Display this message if there is a database error*/
            echo "<script> callSnackBar('Error in uploading questions paper'); </script>";
    }
}
?>