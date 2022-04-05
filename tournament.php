
<!DOCTYPE html>
<html lang="en">
<head>
<style>
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
    border: solid black;
}
ul li a{
     text-decoration: none;
     color: black;
     display: block;
    }
    .swagbutton{
      font-family: "proxima nova";
      color: red;
    }
</style>
<title>tournaments</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<ul>
  
  <li><a href="index.php" id="button" class="button">home</a></li>
</ul>
    <div class="container">
        <div class="jumbotron"></div>
        <div class="card">
  <h5 class="card-header">available tournaments</h5>
  <div class="card-body">
    
    <?php
 $conn = new mysqli('localhost','root','','user-verification');
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $sql = "SELECT * FROM tournaments";
 $result = $conn-> query($sql);?>
    <table class="table table-dark table-hover table-bordered">
    
    <tr>
      <th scope="col">id</th>
      <th scope="col">tournament</th>
      <th scope="col">game</th>
      <th scope="col">participants</th>
      <th scope="col">prize</th>
      <th scope="col">accept</th>
      <th scope="col">start date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
  
 
 <?php
    if($result){
        foreach($result as $row){
    ?>
    
        <tbody>
         <tr>
         <td><?php echo $row['id'];?> </td>
         <td><?php echo $row['name'];?> </td>
         <td><?php echo $row['game'];?> </td>
         <td><?php echo $row['participants'];?> </td>
         <td><?php echo $row['prize'];?> </td>
         <td><?php echo $row['date'];?> </td>
         <td>
         <a href="test.php?accept=<?php echo$row['id'];?>"class="swagbutton" >register</a>
           
         </td>
         </tr>
         </tbody>
     <?php
        }
 }
 else{
     echo "0 result"; 
 }
 

?>
    
</table>

  </div>
</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>
</html>