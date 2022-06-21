<?php include 'newcon.php'?>
<?php require 'head.php'; ?>
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
<title>wagers</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<ul>
<li><a href="mywager.php" id="button" class="button">my wagers</a></li>
  <li><a href="newwager.php" id="button" class="button">new wager</a></li>
  <li><a href="wageresult.php" id="button" class="button">post result</a></li>
  <li><a href="index.php" id="button" class="button">home</a></li>
</ul>
    <div class="container">
    <?php if (count($errors) > 0): ?>
        <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
          <li>
            <?php echo $error; ?>
          </li>
          <?php endforeach;?>
        </div>
        <?php endif;?>
        <div class="jumbotron"></div>
        <div class="card">
  <h5 class="card-header">available wagers</h5>
  <div class="card-body">
    
    <?php
 $conn = new mysqli('localhost','root','','user-verification');
 if($conn-> connect_error){
     die("connection failed:". $conn-> connect_error);
 }
 $sql = "SELECT * FROM wagers";
 $result = $conn-> query($sql);?>
    <table class="table table-dark table-hover table-bordered">
    
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">game</th>
      <th scope="col">amount</th>
      <th scope="col">accept</th>
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
         <td><?php echo $row['username'];?> </td>
         <td><?php echo $row['game'];?> </td>
         <td><?php echo $row['amount'];?> </td>
         <td>
         <a onclick="return confirm('Are you sure you want to accept this wager?')" href="signaut.php?accept= <?php echo$row['id'];?>" class='swagbutton'>accept</a>
         
           
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
    <!-- Modal -->
<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">accept wager</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="server.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="update_id">
        <h4> do you want to aceept wager</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
        <button type="button" class="btn btn-primary">accept</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $('.accept').on('click',function(){
    $('#acceptmodal').modal('show');
  });
};
</script
</body>
</html>