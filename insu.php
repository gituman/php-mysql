<?php
include "newcon.php";
$errors = [];
$username;
$game;
$amount;
if (isset($_GET["accept"])){
    $id=$_GET["accept"];
    
    $amount=$_GET["accept"];
    
    $conn = new mysqli('localhost','root','','user-verification');

    $sql = "SELECT * FROM wagers where id=$id";
    $result = $conn-> query($sql);
    if($result){
        foreach($result as $row){
            $amount=$row['amount'];
            $game=$row['game'];
            $username=$row['username'];
         }
        }
    
    
    
        }
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
             
            
        if ($cash_table < $amount) {
            echo "you have insufficient funds";
        }
        
           else{
               echo"sufficient";
           }
             $conn->close();
            }
        
      
      
    

         
    
     
     


 
 ?>  