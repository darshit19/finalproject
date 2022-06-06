<?php
session_start();
?>
<?php
$dataarr=unserialize(urldecode($_GET['response']));
?>
<div class="content">
  <div class="container my-5 ">
    <h1 class="mb-4 ">Fill up The Form Details</h1>
    <form method="POST">
      <div class="form-group">
        <label>WING Name :</label>
        <input name="bid" type="text" class="form-control col-7" value="<?php echo $dataaarr['b_id']?>" placeholder="Enter Wing Name" readonly>
      </div><br>
      <div class="form-group">
        <label>No.of floors :</label>
        <input type="number" name="floors" class="form-control" id="floor" value="<?php echo $dataaarr['no_of_floors']?>" placeholder="Enter No.of floors" onchange="caltotal()" required>
      </div><br>
      <div class="form-group">
        <label>Flats per floor</label>
        <input type="number" name="flats" class="form-control" id="flat" value="<?php echo $dataaarr['flats_per_floor']?>" placeholder="Enter flats per floor" onchange="caltotal()" required>
      </div><br>
      <div class="form-group">
        <label>Total Flats :</label>
        <input type="number" name="total" id="total" value="<?php echo $dataaarr['total_flats']?>" class="form-control" readonly>
      </div><br>
      <div class="form-group">
        <label>Maintainance :</label>
        <input type="number" name="maintainance" class="form-control" value="<?php echo $dataaarr['total_flats']?>" id="mnt" placeholder="Enter Maintainance amount" required>
      </div><br>
      <button name="add" type="submit" class="btn btn-primary" style="margin-top: 13px;">ADD Building</button>
    </form>
  </div>
</div>
<?php

?>