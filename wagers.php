<!DOCTYPE html>
<html>
<head>
<title> wagers</title>
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
    background-color: blue;
}
ul li a{
     text-decoration: none;
     color: black;
     display: block;
}
.h2{
        position: center;
    }
</style>
</head>
<body>
<ul>
  <li><a href="newwager.php">new wager</a></li>
</ul>
<table>
<h2>available wagers</h2>
<tr>
<th>wager_id</th>
<th>username</th>
<th>game</th>
<th>amount</th>
</tr>
<?php
 $conn = new mysqli('localhost','root','','user-verification');
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $sql = "SELECT * FROM wagers";
 $result = $conn-> query($sql);

 if($result-> num_rows> 0){
     while($row = $result-> fetch_assoc()){
         echo"<tr>
         <td>". $row["id"]."</td>
         <td>". $row["username"]."</td>
         <td>". $row["game"]."</td>
         <td>". $row["amount"]."</td>
         
         </tr>";
     }
     echo "</table>";
 }
 else{
     echo "0 result";
 }
 
 $conn-> close();
?>



