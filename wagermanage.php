<?php
include "newcon.php";
if (isset($_POST["submit"])){
   
    $game=$_POST['game'];
    $amount=$_POST['amount'];
    $conn = new mysqli('localhost','root','','user-verification');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    
    }
   
   $vs=$_SESSION['username'];
   $sql = "SELECT cash FROM users WHERE username='$vs'";
   $result = mysqli_query($conn, $sql);
   $cash_table;
   if($result){
       foreach($result as $row){
           $cash_table=$row['cash'];
           
        }
    }
       
   if ($cash_table < $amount) {
       echo "you have insufficient funds";
   }

     
   else{
   $stmt = $conn->prepare("INSERT into wagers(username,game,amount)values(?,?,?)");
   $username=$_SESSION['username'];
   $stmt->bind_param("ssi",$username,$game,$amount);
   $total=$cash_table-$amount;
   $stm=$conn->prepare("UPDATE users SET cash='$total' WHERE username='$username'");
   $stmt->execute(); 
   $stm->execute();
    if($stmt->error){
        echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";}
    echo "record inserted succesfully";
    
    header("location: wage.php?wagercreation=sucess");
    $stmt->close();
     $conn->close();  
}

}


?>  