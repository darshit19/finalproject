<?php
session_start();
?>
<?php
include "./sidebar.php";
?>
<?php
$dataaarr = unserialize(urldecode($_GET['response']));
?>
<div class="content">
  <div class="container my-5 ">
    <h1 class="mb-4 ">Fill up The Form Details</h1>
    <form method="POST">
      <div class="form-group">
        <label>WING Name :</label>
        <input name="bid" type="text" class="form-control col-7" value="<?php echo $dataaarr['b_id'] ?>" placeholder="Enter Wing Name" readonly>
      </div><br>
      <div class="form-group">
        <label>No.of floors :</label>
        <input type="number" name="floors" class="form-control" id="floor" value="<?php echo $dataaarr['no_of_floors'] ?>" placeholder="Enter No.of floors" onchange="caltotal()" required>
      </div><br>
      <div class="form-group">
        <label>Flats per floor</label>
        <input type="number" name="flats" class="form-control" id="flat" value="<?php echo $dataaarr['flats_per_floor'] ?>" placeholder="Enter flats per floor" onchange="caltotal()" required>
      </div><br>
      <div class="form-group">
        <label>Total Flats :</label>
        <input type="number" name="total" id="total" value="<?php echo $dataaarr['total_flats'] ?>" class="form-control" readonly>
      </div><br>
      <div class="form-group">
        <label>Maintainance :</label>
        <input type="number" name="maintainance" class="form-control" value="<?php echo $dataaarr['maintainance'] ?>" id="mnt" placeholder="Enter Maintainance amount" required>
      </div><br>
      <button name="update" type="submit" class="btn btn-primary" >Update Building</button>
      <a name="cancel" href="./managebuilding.php" class="btn btn-danger my-3 ">CANCEL</a>
    </form>
  </div>
</div>
<?php
if (isset($_POST['update'])) {
  $bid = $_POST['bid'];
  $floors = $_POST['floors'];
  $flats = $_POST['flats'];
  $total = $_POST['total'];
  $maintainance = $_POST['maintainance'];
  $sql = "update buildingtb set no_of_floors='$floors',flats_per_floor='$flats',total_flats='$total',maintainance='$maintainance' where b_id='$bid'";
  include "connection.php";
  if (mysqli_query($con, $sql)) {
?>
    <script>
      alert("Building Updated Successfully !!");
      setTimeout(window.location.href = "./managebuilding.php", 10);
    </script>
<?php
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>