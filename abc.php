<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//if user click login button
if(isset($_POST['signup'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $code = rand(999999, 111111);
    $insert_code = "UPDATE users SET otp = $code WHERE email = '$email'";
    $run_query =  mysqli_query($con, $insert_code);

    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $receiver = "seqazu@norwegischlernen.info";
        $subject = "Email Test via PHP using Localhost";
        $body = "Hi, there...This is a test email send from Localhost.";
        $sender = "ravidesh99@gmail.com";
        if(mail($receiver, $subject, $body, $sender)){
            echo "Email sent successfully to $receiver";
        }else{
            echo "Sorry, failed while sending mail!";
        }
                header('location: user-otp.php');
           
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}
    
    ?>