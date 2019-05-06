<?php
$link=$_GET['link'];
if ($link == '1'){
    header("Location: ./select-exam.php");
}
if ($link == '2'){
    header("Location: ./sample-tests.php");
}
if ($link == '3'){
    session_destroy();
    header("Location: ./index.php");
}
?>