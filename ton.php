<?php
include "newcon.php";

if (isset($_GET["accept"])){
    $id=$_GET["accept"];
   
    $conn = new mysqli('localhost','root','','user-verification');   
    $ps=$_SESSION['username'];
    $sql = "SELECT * FROM legends WHERE player='$ps' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo "you are already registered";
    }
   
       
   else{
    $stmt = $conn->prepare("INSERT into legends(player)values(?)") or die($conn->error);
    $ps=$_SESSION['username'];
    $stmt->bind_param("s",$ps);
     $stmt->execute();
     if($stmt->error){
         echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";}
  
         header("location: index.php?tournamentregistration=sucess");
     $stmt->close();
     $conn->close();  
    }
    
}    
    
     
     


 
 ?>  