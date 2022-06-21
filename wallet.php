 <?php include 'newcon.php'?>
 <?php require 'head.php'; ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
border: 1px solid black;
width: 20%;
color: red;
font-family: monospace;
font-size: 30px;
text-align: center;
}
th {
background-color: red;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
ul{
   margin: 0px;
   padding: 0px;
   list-style: none;
}
ul li{
    float: right;
    width: 200px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    font-size: 20px;
}
ul li a{
     text-decoration: none;
     color: black;
     display: block;
    }
    .h2{
        position: absolute;
    }
</style>
<title> wallet </title>
</head>
<body>
<ul>
  <li><a href="mywallet.php">add money</a>
  <li><a href="index.php">home</a>
  </ul>
<table>
<h2>MY WALLET</h2>
<tr>
<th>BALANCE</th>
<?php
 $conn = new mysqli('localhost','root','','user-verification');
 
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $username=$_SESSION['username'];
 $sql = "SELECT cash FROM users
 WHERE username='$username'";

 $result = $conn-> query($sql) or die($conn->error);

 if($result-> num_rows> 0){
     while($row = $result-> fetch_assoc()){
         echo"<tr>
         <td>". $row["cash"]."</td>
         
        
         </tr>";
     }
     echo "</table>";
 }
 else{
     echo "0 result";
 }
 
 $conn-> close();
?>
</table>