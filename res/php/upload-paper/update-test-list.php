<?php
//Decode JSON file
$json_object = file_get_contents('./res/data/subjects.json');
$subject = json_decode($json_object, true);

//Counting the number of tests in the subject
$test_count = count($subject['subjects'][$subject_name]);

//Checking whether the test name already exist??
for($i=0; $i<$test_count; $i++)
{
    if($subject['subjects'][$subject_name][$i]==$test_name)
        $test_flag = 1;
}

//If the test name doesn't exists, add the test name to the subject test index
if($test_flag == 0)
{
    //Adding the new test
    $subject['subjects'][$subject_name][$test_count]= utf8_encode($test_name);

    //Rewrite back on the file
    $json_object = json_encode($subject);
    file_put_contents('./res/data/subjects.json', $json_object);
}
?>
