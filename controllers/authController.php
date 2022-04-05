<?php
require_once 'config/db.php';
require_once 'emailController.php';

$username = "";
$email = "";
$platform = "";
$region = "";
$errors = [];

// SIGN UP USER
if (isset($_POST['signu-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'username required';
    } if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email address";
    }
    if (empty($_POST['platform'])) {
        $errors['platform'] = 'platform required';
    }
    if (empty($_POST['region'])) {
        $errors['region'] = 'Region required';
    } 
     
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    if (isset($_POST['password']) && $_POST['password'] !== $_POST['passwordConf']) {
        $errors['passwordConf'] = 'The two passwords do not match';
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $platform = $_POST['platform'];
    $region = $_POST['region'];
      
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET username=?, email=?, platform=?, region=?,  token=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssss', $username, $email, $platform, $region, $token, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            sendVerificationEmail($email, $token);

            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['platform'] = $platform;
            $_SESSION['region'] = $region;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: index.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}

// LOGIN
if (isset($_POST['login-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
    
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
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
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verify']);
    header("location: login.php");
    exit(0);
}
