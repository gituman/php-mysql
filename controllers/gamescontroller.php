<?php
   $conn = new mysqli('localhost','root','','user-verification');
if (isset($_POST["submit"])){
    $username=$_POST['username'];
    $game=$_POST['game'];
    $b=implode($game);
    echo $b;
    echo "success";
}


?>  

