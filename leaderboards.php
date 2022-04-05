<!DOCTYPE html>
<html>
<head>
<title>leaderboards</title>
</head>
<body>
<table>
<tr>
<th>rank</th>
<th>username</th>
<th>platform</th>
<th>region</th>
</tr>
<?php
 $conn = new mysqli('localhost','root','','user-verification');
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $sql = "SELECT id, username, platform, region from users";
 $result = $conn-> query($sql);

 if($result-> num_rows> 0){
     while($row = $result-> fetch_assoc()){
         echo "<tr><td>". $row["id"]."</td><td>".$row["username"]."</td><td>"
         .$row["platform"]."</td><td>".$row["region"]."</td><td>";
     }
     echo "</table>";
 }
 else{
     echo "0 result";
 }
 $conn-> close();
?>
</table>
</body>
</html>