<?php
session_start();
?>
<?php
include "sidebar.php";
?>

<script src="../js/addbuilding.js"></script>

<div class="content">
  <div class="container my-5 ">
    <h1 class="mb-4 ">Fill up The Form Details</h1>
    <form method="POST">
      <div class="form-group">
        <label>WING Name :</label>
        <input name="bid" type="text" class="form-control col-7" placeholder="Enter Wing Name" required>
      </div><br>
      <div class="form-group">
        <label>No.of floors :</label>
        <input type="number" name="floors" class="form-control" id="floor" placeholder="Enter No.of floors" onchange="caltotal()" required>
      </div><br>
      <div class="form-group">
        <label>Flats per floor</label>
        <input type="number" name="flats" class="form-control" id="flat" placeholder="Enter flats per floor" onchange="caltotal()" required>
      </div><br>
      <div class="form-group">
        <label>Total Flats :</label>
        <input type="number" name="total" id="total" class="form-control" readonly>
      </div><br>
      <div class="form-group">
        <label>Maintainance :</label>
        <input type="number" name="maintainance" class="form-control" id="mnt" placeholder="Enter Maintainance amount" required>
      </div><br>
      <button name="add" type="submit" class="btn btn-primary" ">ADD Building</button>
      <a name="cancel" href="./managebuilding.php" class="btn btn-danger my-3 ">CANCEL</a>
    </form>
  </div>
</div>

<!-- for adding a building -->
<?php
if (isset($_POST['add'])) {
  $bid = $_POST['bid'];
  $floors = $_POST['floors'];
  $flats = $_POST['flats'];
  $total = $_POST['total'];
  $maintainance = $_POST['maintainance'];

  include "connection.php";
  $sql = "INSERT INTO `buildingtb`(`b_id`, `no_of_floors`, `flats_per_floor`, `total_flats`, `maintainance`) VALUES ('$bid','$floors','$flats','$total','$maintainance')";
  if (mysqli_query($con, $sql)) {
?>
    <script>
      alert("Building Added Successfully !!");
      setTimeout(window.location.href = "./managebuilding.php", 10);
    </script>
<?php
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>