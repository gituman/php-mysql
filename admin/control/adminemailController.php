<?php
require_once 'vendor/autoload.php';
require_once 'config/constants.php';
require_once 'config/db.php';

session_start();

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $admin_token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: #592f80;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up as an administrator on our site. Please click on the link below to verify your account:.</p>
        <a href="http://localhost/kuonlinefeesys/adminhome.php?admin_token=' . $admin_token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

function verifyEmail($admin_token)
{
    global $conn;
    $sql = "SELECT * FROM administrator WHERE admin_token='$admin_token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE administrator SET admin_verified=1 WHERE admin_token='$admin_token'";

        if (mysqli_query($conn, $query)) {
            $_SESSION['admin_username'] = $user['admin_username'];
            $_SESSION['admin_email'] = $user['admin_email'];
            $_SESSION['admin_verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header('location: refhome.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
}
