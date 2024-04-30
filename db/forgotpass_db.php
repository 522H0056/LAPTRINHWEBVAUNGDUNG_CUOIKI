<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
include('db/db.php');


require 'vendor/autoload.php';

function sendemail($email,$token) {
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'trungductwice@gmail.com';                     //SMTP username
    $mail->Password   = 'kgnjllieikmcuxrr';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('trungductwice@gmail.com', $email);
    $mail->addAddress($email);     //Add a recipient          //Name is optional


    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email for reset password';
    $mail->Body    = "<a href ='http://localhost/BAITAPCUOITHANG4/activatePass.php?token=$token'>Click here to reset your password</a>";

    $mail->AltBody = "";




    $mail->send();
    echo 'Message has been sent';
}

if (isset($_POST['forgot_btn'])) {
    $email = $_POST['email'];
    $token = md5(rand());

    $check_email_query = "SELECT email FROM students WHERE email ='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) == 1) {
        $query = "UPDATE students SET token = '$token' WHERE email = '$email'";
        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            sendemail($email, $token);
            $_SESSION['token'] = $token;
            echo '<script>';
            echo 'alert("Verification link has been sent to your email. Please check your inbox or spam folder.");';
            echo 'window.location.href = "login.php";'; // Redirect the user to login.php
            echo '</script>';
            exit();
        } else {
            $_SESSION['status'] = "Failed";
            header("Location: forgotpass.php");
            exit(); // It's good practice to exit after a header redirect
        }
    } else {
        $_SESSION['status'] = "Email does not exist";
        header("Location: forgotpass.php"); // Assuming there is a page for forgot password
        exit(); // Exit after redirection
    }
}

    
?>