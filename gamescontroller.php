<?php
include "newcon.php";
   $conn = new mysqli('localhost','root','','user-verification');
if (isset($_POST["submit"])){
    $username=$_SESSION['username'];
    $fifa20=$_POST['fifa'];
    $mortalkombat=$_POST['mortalkombat'];
    $callofduty=$_POST['callofduty'];

    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
    $stmt = $conn->prepare("insert into game(username,fifa,mortalkombat,callofduty)
    values (?,?,?,?)");
    $stmt->bind_param("ssss",$username, $fifa20, $mortalkombat, $callofduty);
    $stmt->execute();
    if($stmt->error){
        echo "\r\nMYSQL Error:  ", $stmt->error, "\r\n";
    }
    header("location: index.php?gameselection=sucess");
        $stmt->close();
    $conn->close();
}
}else{
    echo "Not submited";
}
?>  

