<?php
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
          header("Location: ./upload-paper.php");
        //exit;
      } else
        echo "<script> callSnackBar('Password Incorrect'); </script>";
    }
    $result->close();
  }
?>