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
             $pot=$amount*2;
            
        if ($cash_table < $amount) {
            echo "you have insufficient funds  ";
        }
        if($username==$vs){
            echo "you cant select your own wager";
        }
        else{
            $stmt = $conn->prepare("INSERT into accepted(postid,creator,game,amount,opponent,pot)values(?,?,?,?,?,?)") or die($conn->error);
            $vs=$_SESSION['username'];
            $stmt->bind_param("issisi",$id,$username,$game,$amount,$vs,$pot);
            $total=$cash_table-$amount;
            $stm=$conn->prepare("UPDATE users SET cash='$total' WHERE username='$vs'");
            $st=$conn->prepare("DELETE from wagers WHERE id='$id'");
             $stmt->execute();
             $stm->execute();
             $st->execute();
             if($stmt->error){
                 echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";}
          
                 header("location: mywager.php?wagerselection=sucess");
             $stmt->close();
            
             $conn->close();
            }
        }
        
      
      
    

         
    
     
     


 
 ?>  