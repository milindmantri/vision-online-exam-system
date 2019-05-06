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
if (isset($_POST['register-submit'])) {

  /*Getting the values of the input fields*/
  $fullname = $_POST['name'];
  $email = $_POST['email'];
  $password = hash('sha512', $_POST['password']);
  $phone = $_POST['phone'];
  $account_type = $_POST['accountType'];
  /*Check Password */
  $confirm_password = hash('sha512', $_POST['confirmPassword']);


  if ($password === $confirm_password) {
    /*Check if user already exists */
    /* -------------------------------------- */
    $sqlQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sqlQuery);
    $row = $result->fetch_row();
    if ($row != NULL) {
      echo "<script> callSnackBar('Email Already Exists'); </script>";
      $result->close();
    } else {
      $result->close();
      /* ---------------------------------------- */


      /*SQL Query to insert data*/
      $sqlQuery = "INSERT INTO users (fullname,email,password,phoneno,account_type)
    VALUES ('$fullname' ,'$email', '$password', '$phone','$account_type')";

      /*Save the values in database*/
      if ($conn->query($sqlQuery) === TRUE) {
        echo "<script> callSnackBar('Registration Successful'); </script>";
      }

      /*Error when unable to save the data*/ else {
        echo "<script> callSnackBar(' Registration Failed'); </script>";

        "Error: " . $sqlQuery . "<br>" . $conn->error;
      }
    }
  } else {
    echo "<script> callSnackBar('Passwords do not match'); </script>";
    echo "<script> registerActive(); </script>";
  }
}

/*Action after clicking the Login Button*/
if (isset($_POST['login-submit'])) {
  $email = $_POST['email'];
  $password = hash('sha512', $_POST['password']);
  $sqlQuery = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($sqlQuery);
  $row = $result->fetch_row();
  if ($row == NULL) {
    echo "<script> callSnackBar('Account doesn\'t exist'); </script>";
  } else {
    if ($row[3] == $password) {
      echo "<script> callSnackBar('Login Successful'); </script>";
      session_start();
      $_SESSION['user'] = $row;
      if($row[5]=="Student")
        header("Location: ./select-exam.php");
      else
        header("Location: ./upload-questions.php");
      //exit;
    } else
      echo "<script> callSnackBar('Password Incorrect'); </script>";
  }
  $result->close();
}

$conn->close();
?>