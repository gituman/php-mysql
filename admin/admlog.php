<?php include 'control/adminauthController.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <title>online gaming tournaments - Administrator Login</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper login">
        <h3 class="text-center form-title">Login</h3>
        <?php if (count($errors) > 0): ?>
        <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <li>
            <?php echo $error; ?>
          </li>
          <?php endforeach;?>
        </div>
        <?php endif;?>

        <form action="admlog.php" method="post">
          <div class="form-group">
            <label>Username or Email</label>
            <input type="text" name="admin_username" class="form-control form-control-lg" value="<?php echo $admin_username; ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="adminlogin-btn" class="btn btn-lg btn-block">Login</button>
          </div>
        </form>
       
       
      </div>
    </div>
  </div>
</body>
</html>
