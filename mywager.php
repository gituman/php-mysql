<?php include 'controllers/authController.php'?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
border: 1px solid black;
width: 80%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
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
<title> wagers </title>
</head>
<body>
<ul>
<li><a href="index.php">home</a></li>
<li><a href="wageresult.php">submit result</a></li>
<li><a href="win.php">winnings</a></li>
</ul>
<table>
<h2>my wagers</h2>
<tr>
<th>id</th>
<th> post id</th>
<th>creator</th>
<th>game</th>
<th>amount</th>
<th>opponent</th>
<th>pot</th>
<?php
 $conn = new mysqli('localhost','root','','user-verification');
 
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $username=$_SESSION['username'];
 $sql = "SELECT*FROM accepted
 WHERE creator='$username' OR opponent='$username'";

 $result = $conn-> query($sql) or die($conn->error);

 if($result-> num_rows> 0){
     while($row = $result-> fetch_assoc()){
         echo"<tr>
         <td>". $row["id"]."</td>
         <td>". $row["postid"]."</td>
         <td>". $row["creator"]."</td>
         <td>". $row["game"]."</td>
         <td>". $row["amount"]."</td>
         <td>". $row["opponent"]."</td>
         <td>". $row["pot"]."</td>
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