<?php
  
if (isset($_POST["submit"])){
    $username=$_POST['username'];
    $amount=$_POST['number'];
    
    $conn = new mysqli('localhost','root','','user-verification');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
   
   $stmt = $conn->prepare("INSERT into wallet(username,cash)values(?,?)");
   $stmt->bind_param("si",$username,$amount);
    $stmt->execute(); 
    $_SESSION['number'] = $number;
    if($stmt->error){
        echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";}
    echo "record inserted succesfully";
    }
    header("location: wallet.php?walletupdate=sucess");
    $stmt->close();
     $conn->close();  
}

?>  