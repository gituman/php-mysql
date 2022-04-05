<?php
require 'db2.php';
$sql = 'SELECT * FROM game';
$stmt = $connection->prepare($sql);
$stmt->execute();
$game = $stmt->fetchAll(PDO::FETCH_OBJ);
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
        <?php foreach($game as $game): ?>
          <tr>
            <td><?= $game->id; ?></td>
            <td><?= $game->username; ?></td>
            <td><?= $game->fifa; ?></td>
            <td><?= $game->mortalkombat; ?></td>
            <td><?= $game->callofduty; ?></td>
            <td><?= $game->fpoints; ?></td>
            <td><?= $game->cpoints; ?></td>
            <td><?= $game->mpoints; ?></td>
            <td>
              <a href="edit.php?id=<?= $game->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $game->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
