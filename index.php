<?php

include 'newcon.php';

// verify email when user has clicked on the verification link


// redirect user to login page if they're not logged in
if (empty($_SESSION['email'])) {
    header('location: newlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>online gaming tournaments</title>
  <link rel="stylesheet" href="style.css">
</head>

  
<body>


  <div class="container">
    <nav>
           <img src="vg.png" class = "logo">    
     <ul>
            
      <li><a href="index.php">home</a></li>
      <li><a href="#">leaderboards</a>
         <ul>
            <li><a href="fifa.php">fifa</a></li>
             <li><a href="cod.php">cod</a></li>
             <li><a href="mk.php">mk</a></li>
           </ul>
              </li>
            <li><a href="tournament.php">tournaments</a></li>
            <li><a href="wage.php">wagers</a></li>
            <li><a href="wallet.php">wallet</a></li>
            <a href="index.php?logout=1" style="color: red">Logout</a>
    </ul>
</nav>

<div class ="text-box">
    <p>SHOW YOUR THE BEST<p>
     <hi>IN THE WORLD</p>


 <div class ="row">
     <a href="wage.php">Start battling</a>
     <a href="tournament.php">tournament time</a>
     <a href="games.php">pick your games here</a>
</div>
   
</div>  


 


  
</body>

</html>