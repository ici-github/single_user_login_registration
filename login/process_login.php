<?php

    session_start();

    include("database.php");

    $username = $_POST['input_username'];
    $password = $_POST['input_password'];

    $sql = "SELECT * FROM accounts WHERE username = '$username'";
    $account = mysqli_fetch_array(mysqli_query($connection, $sql));

    if(password_verify($password, $account['password'])) {
        $_SESSION['username'] = $account['username'];
        $_SESSION['firstname'] = $account['firstname'];
        $_SESSION['lastname'] = $account['lastname'];
        echo "<script>window.location='homepage.php'; </script>";
    } else {
        echo "<script>alert('Invalid username/password combination'); window.location='login.php'";
    }
?>