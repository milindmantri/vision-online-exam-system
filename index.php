<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    Login and Registration Page
  </title>
  <link rel="stylesheet" href="./res/css/style.css" />
  <script src="./res/js/login-register.js"></script>

  <!-- Snackbar Style Sheet and JavaScript File -->
  <link rel="stylesheet" href="./res/css/snackbar.css" />
  <script src="./res/js/snackbar.js"></script>
</head>

<body>
  <?php
  include "./res/html/header-index.html";
  echo "<br>";
  include "./res/html/login.html";
  ?>

</body>

</html>


<?php
include_once './config/dbconnection.php';

/*Action after clicking the Register Button*/
include_once "./res/php/login-register/register.php";

/*Action after clicking the Login Button*/
include_once "./res/php/login-register/login.php";

$conn->close();
?>