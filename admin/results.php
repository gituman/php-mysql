<?php
$conn = mysqli_connect("localhost","root","","user-verification");

$query = 'SELECT accepted.postid, accepted.creator, accepted.game,accepted.amount, accepted.opponent, accepted.pot, results.wager_id,results.winner,results.loser,results.complaint,results.transaction
FROM accepted,results
WHERE accepted.postid=results.wager_id ';
$query_run = mysqli_query($conn,$query);

 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>results</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>wager id</th>
          <th>creator</th>
          <th>game</th>
          <th>amount</th>
          <th>opponent</th>
          <th>winner</th>
          <th>loser</th>
          <th>pot</th>
          <th>complaint</th>
          <th>transaction</th>
        </tr>
        <tbody>
        <?php 
        
         if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run))
            {
              ?>

          
        
           <tr>
             <td><?php  echo $row ['postid'];?></td>
             <td><?php  echo $row ['creator'];?></td>
             <td><?php  echo $row ['game'];?></td>
             <td><?php  echo $row ['amount'];?></td>
             <td><?php  echo $row ['opponent'];?></td>
             <td><?php  echo $row ['winner'];?></td>
             <td><?php  echo $row ['loser'];?></td>
             <td><?php  echo $row ['pot'];?></td>
             <td><?php  echo $row ['complaint'];?></td>
             <td><?php  echo $row ['transaction'];?></td>
             <td>
           
            <?php
            } 
          } else{
            echo "no record found";
          }
           ?>
           </tbody>
        </table>
