<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                $vote_status=$fetch['vote_status'];
                if($status == 'verified' && $vote_status=='notvoted'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $errors['email'] = "You have been already voted";
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: shahiprem7890@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }

    if(isset($_POST['vote'])){
        header('Location: voting.php');
    }

     //if user click check reset otp button
     if(isset($_POST['A'])){
        $email = $_SESSION['email'];
        $A = "A";
        $swal='swal';
        $who="Barack Obama";

        $insert_data = "INSERT INTO vote (email, vote,name)
        values('$email', '$A','$who')";
         
$data_check = mysqli_query($con, $insert_data);
if($data_check){
    $update_pass = "UPDATE users SET vote_status = 'voted' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_pass);
    if($run_query){
        echo "
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>


        <script>
    setTimeout(function() {
        swal({
           

            title: 'Thanks for voting',
            text: 'Your vote has been recorded.',
            type: 'success',
            confirmButtonColor: '#DC3545',

        }, function() {
            window.location = 'voting.php';
        });
    }, 1000);
</script>
        ";
        

    }
}else{
echo "ayyooo";
}

      
    }

    if(isset($_POST['B'])){
        $email = $_SESSION['email'];
        $B = "B";
        $code="voted";
        $who="Joe Biden";

        $insert_data = "INSERT INTO vote (email, vote,name)
        values('$email', '$B','$who')";
$data_check = mysqli_query($con, $insert_data);
if($data_check){
    $update_pass = "UPDATE users SET vote_status = 'voted' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_pass);
    if($run_query){
        echo "
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>


        <script>
    setTimeout(function() {
        swal({
           

            title: 'Thanks for voting',
            text: 'Your vote has been recorded.',
            type: 'success',
            confirmButtonColor: '#DC3545',

        }, function() {
            window.location = 'voting.php';
        });
    }, 1000);
</script>
        ";
    }
}else{
echo "ayyooo";
}

      
    }

    if(isset($_POST['C'])){
        $email = $_SESSION['email'];
        $A = "C";
        $code="voted";
        $who="Narendra Modi";

        $insert_data = "INSERT INTO vote (email, vote,name)
        values('$email', '$A','$who')";
$data_check = mysqli_query($con, $insert_data);
if($data_check){
    $update_pass = "UPDATE users SET vote_status = 'voted' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_pass);
    if($run_query){
        echo "
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>


        <script>
    setTimeout(function() {
        swal({
           

            title: 'Thanks for voting',
            text: 'Your vote has been recorded.',
            type: 'success',
            confirmButtonColor: '#DC3545',

        }, function() {
            window.location = 'voting.php';
        });
    }, 1000);
</script>
        ";
    }
}else{
echo "ayyooo";
}

      
    }

    if(isset($_POST['D'])){
        $email = $_SESSION['email'];
        $A = "D";
        $code="voted";
        $who="Donald Trump";

        $insert_data = "INSERT INTO vote (email, vote,name)
        values('$email', '$A','$who')";
$data_check = mysqli_query($con, $insert_data);
if($data_check){
    $update_pass = "UPDATE users SET vote_status = 'voted' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_pass);
    if($run_query){
        echo "
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
        <script>
    setTimeout(function() {
        swal({
           

            title: 'Thanks for voting',
            text: 'Your vote has been recorded.',
            type: 'success',
            confirmButtonColor: '#DC3545',

        }, function() {
            window.location = 'voting.php';
        });
    }, 1000);
</script>
        ";
    }
}else{
echo "ayyooo";
}

      
    }

    if(isset($_POST['E'])){
        $email = $_SESSION['email'];
        $A = "E";
        $code="voted";
        $who="Vladimir Putin";

        $insert_data = "INSERT INTO vote (email, vote,name)
        values('$email', '$A','$who')";
$data_check = mysqli_query($con, $insert_data);
if($data_check){
    $update_pass = "UPDATE users SET vote_status = 'voted' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_pass);
    if($run_query){
        echo "
        <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
        <script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>


        <script>
    setTimeout(function() {
        swal({
           

            title: 'Thanks for voting',
            text: 'Your vote has been recorded.',
            type: 'success',
            confirmButtonColor: '#DC3545',

        }, function() {
            window.location = 'voting.php';
        });
    }, 1000);
</script>
        ";
    }
}else{
echo "ayyooo";
}

      
    }


 //add votors
 if(isset($_POST['submit'])){    
    
    
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $district = $_POST['district'];
    $password = "123456789";
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $status = "verified";
    $vote_status = "notvoted";


    if(!empty($name) || !empty($nic) || !empty($address) || !empty($email) ||
    !empty($district) || !empty($encpass) || !empty($status) || !empty($vote_status)){

    

    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }
    else {
      
        
        $insert_data = "INSERT INTO users (name,nic,address,email,district,password,status,vote_status) values ('$name','$nic','$address','$email','$district','$encpass','$status','$vote_status')";
        $insert_votors = mysqli_query($con, $insert_data);
if($insert_votors){
    
    header('Location: sucess.php');
}else{
    $errors['db-error'] = "Failed!";
}

       
    }
}
else {
    echo "All field are required.";
    die();
} 
}
?>