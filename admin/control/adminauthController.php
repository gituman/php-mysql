<?php
require('config/db.php');
session_start();

$admin_username = "";
$admin_email = "";
$errors = [];

// SIGN UP USER
if (isset($_POST['adminsignup-btn'])) {
    if (empty($_POST['admin_username'])) {
        $errors['admin_username'] = 'Username required';
    }
    if (empty($_POST['admin_email'])) {
        $errors['admin_email'] = 'Email required';
    }
    if (!empty($_POST['admin_email']) && !filter_var($_POST['admin_email'], FILTER_VALIDATE_EMAIL)) {
      $errors['admin_email'] = "Invalid email address";
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM administrator WHERE admin_email='$admin_email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $errors['admin_email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO administrator SET admin_username=?, admin_email=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $admin_username, $admin_email,  $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            

            $_SESSION['admin_username'] = $admin_username;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: refhome.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register administrator";
        }
    }
}

// LOGIN
if (isset($_POST['adminlogin-btn'])) {
    if (empty($_POST['admin_username'])) {
        $errors['admin_username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $admin_username = $_POST['admin_username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM administrator WHERE admin_username=? OR admin_email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $admin_username, $admin_username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['admin_username'] = $user['admin_username'];
                $_SESSION['admin_email'] = $user['admin_email'];
                $_SESSION['admin_verified'] = $user['admin_verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: refhome.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }

}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_username']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['verify']);
    header("location: admlog.php");
    exit(0);
}
