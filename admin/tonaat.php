<?php
if (isset($_POST["submit"])){
    $torn=$_POST['torn'];
    $game=$_POST['game'];
    $pat=$_POST['pat'];
    $prize=$_POST['prize'];
    $date=$_POST['date'];
    $conn = new mysqli('localhost','root','','user-verification');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    
    }else{
   $stmt = $conn->prepare("INSERT into tournaments(name,game,participants,prize,date)values(?,?,?,?,?)");
   $stmt->bind_param("ssiis",$torn,$game,$pat,$prize,$date);
    $stmt->execute(); 
    if($stmt->error){
        echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";}
    echo "record inserted succesfully";
    }
    header("location: refhome.php?tournamentcreation=sucess");
    $stmt->close();
     $conn->close();  
}
  ?>