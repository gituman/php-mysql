<?php include('control/adminauthController.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
  <title>online gaming tournaments admin</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 form-wrapper">
        <h3 class="text-center form-title">Register</h3>
        <p style="color: red">(*) required field</p>

        <?php if (count($errors) > 0): ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
            <li>
              <?php echo $error; ?>
            </li>
            <?php endforeach;?>
          </div>
        <?php endif;?>

        <form action="admsign.php" method="post">
          <div class="form-group">
            <label>Username</label> <label style="color: red">*</label>
            <input type="text" name="admin_username" class="form-control form-control-lg" value="<?php echo $admin_username; ?>">
          </div>
          <div class="form-group">
            <label>Email</label> <label style="color: red">*</label>
            <input type="text" name="admin_email" class="form-control form-control-lg" value="<?php echo $admin_email; ?>">
          </div>
          <div class="form-group">
            <label>Password</label> <label style="color: red">*</label>
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <label>Password Confirm</label> <label style="color: red">*</label>
            <input type="password" name="passwordConf" class="form-control form-control-lg">
          </div>
          <div class="form-group">
            <button type="submit" name="adminsignup-btn" class="btn btn-lg btn-block">add referee</button>
          </div>
        </form>
      
        <p><a href="refhome.php" class="btn btn-primary">Back Home</a></p>
      </div>
    </div>
  </div>
</body>

</html>
