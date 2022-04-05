<?php


if (isset($_GET["accept"])){
    $id=$_GET["accept"];
  
    $conn = new mysqli('localhost','root','','user-verification');

    $sql = "SELECT * FROM game where id=$id";
    $result = $conn-> query($sql);

    $username;
    $fifa;
    $mortalkombat;
    $callofduty;
    $fpoints;
    $cpoints;
    $mpoints;
    
    if($result){
        foreach($result as $row){
            $username=$row['username'];
            $fifa=$row['fifa'];
            $mortalkombat=$row['mortalkombat'];
            $callofduty=$row['callofduty'];
            $fpoints=$row['fpoints'];
            $cpoints=$row['cpoints'];
            $mpoints=$row['mpoints'];
         }
         ?>
         <div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update points</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
         
         <form id="form-group" method="POST" action="edupd.php">
         <div class="form-group">
         <label>id</label>
         <input value="<?php echo $row['id'] ?>" type="number" name="id"  class="form-control">
       </div>
       
       <div class="form-group">
         <label>fifa points</label>
         <input value="<?php echo $row['fpoints'] ?>" type="number" name="fpoints"  class="form-control">
       </div>
       <div class="form-group">
         <label>call of duty points</label>
         <input value="<?php echo $row['cpoints'] ?>" type="number" name="cpoints"  class="form-control">
       </div>
       <div class="form-group">
         <label> mortal kombat points</label>
         <input value="<?php echo $row['mpoints']?>" type="number" name="mpoints" class="form-control">
       </div>
       <div class="form-group">
          <button type="submit" name="update" class="btn btn-info">Update points</button>
        </div>
      </form>
    </div>
  </div>
</div>
       <?php  
        }

  }