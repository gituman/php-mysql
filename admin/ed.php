  
<?php require 'header.php'; ?>
<ul>
    <li><a href="add.php">home</a></li>
    </ul>
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
     <?php
     $connection= mysqli_connect("localhost","root","","user-verification");
        if(isset($_POST['edit'])){
          $id=$_POST['id'];
          echo "$id";
          $query="SELECT * FROM game WHERE id='$id'";
          $query_run= mysqli_query($connection, $query);

          foreach($query_run as $row)
          {
            
            ?>

          
      
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
        <?php
          }
        }
     ?>
        
        
        <div class="form-group">
          <button type="submit" name="update" class="btn btn-info">Update points</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
