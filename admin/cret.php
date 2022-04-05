<?php
if (isset($_POST["submit"])){
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "user-verification";

    $conn = new mysqli('localhost','root','','user-verification');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
 $sql="CREATE TABLE tona (
    ID int(6),
    tona varchar(255),
    game varchar(255),
    participants int(40),
    prize int(40),
    ) ";
 if($conn->query($sql) ===TRUE){
 echo "table creation success";
 }else{
     echo"shit";
 }
}
}
?>