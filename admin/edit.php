<?php
require 'db2.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM game WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$game = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['fpoints'])  && isset($_POST['cpoints']) && isset($_POST['mpoints']) ) {
    $fpoints = $_POST['fpoints'];
    $cpoints = $_POST['cpoints'];
    $mpoints = $_POST['mpoints'];
    
  $sql = 'UPDATE game SET fpoints=:fpoints, cpoints=:cpoints, mpoints=:mpoints,  WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fpoints' => $fpoints, ':cpoints' => $cpoints, ':mpoints' => $mpoints,  ':id' => $id])) {
    header("Location: feestructure.php");
  }



}


 ?>
<?php require 'header.php'; ?>
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
      <form method="post" id="edit">
        <div class="form-group">
          <label for="fpoints">fpoints</label>
          <input value="<?= $game->$fpoints; ?>" type="number" name="fpoints" $id="fpoints" class="form-control">
        </div>
        <div class="form-group">
          <label for="cpoints">cpoints</label>
          <input value="<?= $game->$cpoints; ?>" type="number" name="cpoints" $id="cpoints" class="form-control">
        </div>
        <div class="form-group">
          <label for="mpoints">mpoints</label>
          <input value="<?= $game->$mpoints; ?>" type="number" name="mpoints" $id="mpoints" class="form-control">
        </div>
        
        
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update points</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
