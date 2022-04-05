<?php
require 'db2.php';
$message = '';
if (isset ($_POST['semester'])  && isset($_POST['modeofstudy']) && isset($_POST['course']) && isset($_POST['amount']) ) {
  $semester = $_POST['semester'];
  $modeofstudy = $_POST['modeofstudy'];
  $course = $_POST['course'];
  $amount = $_POST['amount'];
  $sql = 'INSERT INTO fee_structure(semester, modeofstudy, course, amount) VALUES(:semester, :modeofstudy, :course, :amount)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':semester' => $semester, ':modeofstudy' => $modeofstudy, ':course' => $course, ':amount' => $amount])) {
    $message = 'data inserted successfully';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add Fee Stucture Data</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="semester">Semester</label>
          <input type="text" name="semester" fee_structure_id="semester" class="form-control">
        </div>
        <div class="form-group">
          <label for="modeofstudy">Mode of Study</label>
          <input type="text" name="modeofstudy" fee_structure_id="modeofstudy" class="form-control">
        </div>
        <div class="form-group">
          <label for="course">Course</label>
          <input type="text" name="course" fee_structure_id="course" class="form-control">
        </div>
        <div class="form-group">
          <label for="amount">Amount</label>
          <input type="text" name="amount" fee_structure_id="amount" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Add Fee Structure Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
