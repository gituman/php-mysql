<?php
$conn = mysqli_connect("localhost","root","","user-verification");
$query = 'SELECT * FROM game';
$query_run = mysqli_query($conn,$query);

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>gamer points</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>username</th>
          <th>fifa</th>
          <th>mortalkombat</th>
          <th>callofduty</th>
          <th>fifa points</th>
          <th>callofduty points</th>
          <th>mortal kombat points</th>
          <th>Action</th>
        </tr>
        <tbody>
        <?php 
         if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run))
            {
              ?>


        
           <tr>
             <td><?php  echo $row ['id'];?></td>
             <td><?php  echo $row ['username'];?></td>
             <td><?php  echo $row ['fifa'];?></td>
             <td><?php  echo $row ['mortalkombat'];?></td>
             <td><?php  echo $row ['callofduty'];?></td>
             <td><?php  echo $row ['fpoints'];?></td>
             <td><?php  echo $row ['cpoints'];?></td>
             <td><?php  echo $row ['mpoints'];?></td>
             <td>
             <a onclick="return confirm('Are you sure you want to edit?')" href="test.php?accept= <?php echo$row['id'];?>" class='swagbutton'>edit</a>
            </td>
            <td>
               <button type="submit" class="btn btn-danger"> DELETE </button>
            </td>
            </tr>
            <?php
            } 
          } else{
            echo "no record found";
          }
           ?>
           </tbody>
        </table>
