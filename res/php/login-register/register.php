<?php
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

?>