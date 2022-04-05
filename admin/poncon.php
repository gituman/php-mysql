<?php
  
if (isset($_POST["submit"])){
    
    $username=$_POST['username'];
    $fifa=$_POST['fifa'];
    $cod=$_POST['cod'];
    $mk=$_POST['mk'];
    
    $conn = new mysqli('localhost','root','','user-verification');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
    $sql = "SELECT fpoints,cpoints,mpoints FROM game WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $cash_table;
    if($result){
        foreach($result as $row){
            $fp=$row['fpoints'];
            $cp=$row['cpoints'];
            $mp=$row['mpoints'];
         }
      $fpo=$fp+$fifa;
      $cpo=$cp+$cod;
      $mpo=$mp+$mk;
    $sql="UPDATE game SET fpoints='$fpo',cpoints='$cpo',mpoints='$mpo' WHERE username='$username'";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("location: point.php?resultsaved=sucess");
    }
       else{
           echo "$fpo,$cpo,$mpo";
       }
       
         $conn->close();  
    
    }
    }
    ?>  
    