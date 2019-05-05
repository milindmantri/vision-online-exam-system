<?php
   $dbhost = '192.168.33.10';
   $dbuser = 'rocky';
   $dbpass = 'singh';
   $dbname = 'vision_exam';
   
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

   /*Connection to database */
   if ($conn->connect_error) {
      echo "<script> callSnackBar('Unable to connect to database'); </script>";
      die("Connection failed: " . $conn->connect_error);
  }
  ?>
