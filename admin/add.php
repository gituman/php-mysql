<?php
  
if (isset($_POST["submit"])){
    $id=$_POST['id'];
    $username=$_POST['text'];
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
        }
        $v='complete';
        $won=$amount*0.9;
   $total=$won+$cash_table;
         $sql = "SELECT * FROM awarded WHERE wagerid='$id' LIMIT 1";
         $result = mysqli_query($conn, $sql);
     
         if (mysqli_num_rows($result) > 0) {
           echo "transaction is already complete";
         }
         else{
          $stm=$conn->prepare("UPDATE users SET cash='$total' WHERE username='$username'");
          $stmt = $conn->prepare("INSERT into awarded(wagerid,username,won)values(?,?,?)") or die($conn->error);
          $stmt->bind_param("isi",$id,$username,$won);
          $st=$conn->prepare("UPDATE results SET transaction='$v' WHERE wager_id='$id'");
          $stm->execute();
          $stmt->execute();
          $st->execute();
         }
        
         if($stmt->error){
          echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";}
      
          header("location: results.php?wagerselection=sucess");
      $stmt->close();
      
      $conn->close();
          
        }