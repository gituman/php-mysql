<?php
  include "newcon.php";
if (isset($_POST["submit"])){
    $username=$_SESSION['username'];
    $amount=$_POST['number'];
    
    $conn = new mysqli('localhost','root','','user-verification');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
    $sql = "SELECT cash FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $cash_table;
    if($result){
        foreach($result as $row){
            $cash_table=$row['cash'];
            
         }
         $total=$amount + $cash_table;
    $sql="UPDATE users SET cash='$total' WHERE username='$username'";
   $query=mysqli_query($conn,$sql);
   if($query){
    header("location: wallet.php?resultsaved=sucess");
}
   else{
       echo "$username";
   }
   
     $conn->close();  

}
}
?>  