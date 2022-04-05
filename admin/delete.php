<?php
require 'db2.php';
$game_id = $_GET['game_id'];
$sql = 'DELETE FROM game WHERE game_id=:game_id';
$statement = $connection->prepare($sql);
if ($statement->execute([':game_id' => $game_id])) {
  header("Location: feestructure.php");
}