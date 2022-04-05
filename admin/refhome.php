<?php

include 'control/adminauthController.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
<title> online gaming admin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 

<link rel="stylesheet" href="../page.css">
<title> online gaming admin</title>

    
  </head> 
<body>

<div class="navbar">
<ul>
 <li> <a class="active" href="refhome.php">Home Page</a></li>
 
 <li> <a href="tona.php">add tournaments</a></li>
 <li> <a href="results.php"> results</a></li>
 <li> <a href="ref.php"> add referee </a></li>
</div>

  
      <div class="container">

        <?php if (isset($_SESSION['message'])): ?>
        <div class="alert container <?php echo $_SESSION['type'] ?>">
          <?php
echo $_SESSION['message'];
unset($_SESSION['message']);
unset($_SESSION['type']);
?>
        </div>
          <?php endif;?>
          
              <h4>Welcome,
                <?php echo $_SESSION['admin_username']; ?>
              </h4>
          <a href="refhome.php?logout=1" style="color: red">Logout</a>
      
      </div>
    </div>
  </div>



</body>

</html>

