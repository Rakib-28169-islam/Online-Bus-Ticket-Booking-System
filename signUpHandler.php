<?php
session_start();
include 'connection.php';
//signUp Functionality

function display($test)
{
    echo $test . "<br>";
}
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $user_name = $_POST['user_name'];
    //make this variable session
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['phone'] = $phone;
    $_SESSION['user_name'] = $user_name;


    if ($password == $confirm_password) {

        $sql = "INSERT INTO user (first_name, last_name, email, password, phone, user_name, date_of_signup, last_login) 
        VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$user_name', CURDATE(), NOW())";
        if ($conn->query($sql) === true) {
            header('Location: loginForm.php');

        }
    }
}
?>