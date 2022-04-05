<?php
  include "newcon.php";?>
<!DOCTYPE html>
<html>
<head>
<title> winningd</title>
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
  <li><a href="mywager.php">my wagers</a></li>
</ul>
<table>
<h2>wagers won</h2>
<tr>
<th>id</th>
<th>wager_id</th>
<th>username</th>

<th>amount won</th>
</tr>
<?php
 $conn = new mysqli('localhost','root','','user-verification');
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $username=$_SESSION['username'];
 $sql = "SELECT * FROM awarded WHERE username='$username'";
 $result = $conn-> query($sql);

 if($result-> num_rows> 0){
     while($row = $result-> fetch_assoc()){
         echo"<tr>
         <td>". $row["id"]."</td>
         <td>". $row["wagerid"]."</td>
         <td>". $row["username"]."</td>
         <td>". $row["won"]."</td>
        
         
         </tr>";
     }
     echo "</table>";
 }
 else{
     echo "0 result";
 }
 
 $conn-> close();
?>



