<!DOCTYPE html>
<html>
<head>
<title> cod leaderboard</title>
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
</style>
</head>
<body>
<ul>
  <li><a href="index.php">home</a></li>
  <li><a href="fifa.php">fifa</a>
  <li><a href="mk.php">mortalkombat</a>
</ul>
<table>
<h2>call of duty leaderboard</h2>
<tr>

<th>username</th>
<th>points</th>


</tr>
<?php
 $conn = new mysqli('localhost','root','','user-verification');
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $sql =  "SELECT users.username,game.callofduty,game.cpoints
 from users,game
where users.username=game.username and game.callofduty='yes' and users.region='kenya'
order by cpoints DESC";
 
 $result = $conn-> query($sql);

 if($result-> num_rows> 0){
     while($row = $result-> fetch_assoc()){
         echo"<tr>
        
         <td>". $row["username"]."</td>
         <td>". $row["cpoints"]."</td>
         </tr>";
     }
     echo "</table>";
 }
 else{
     echo "0 result";
 }
 
 $conn-> close();
?>

</body>
</html>