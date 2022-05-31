<?php
session_start();
?>
<?php
include "./sidebar.php";
?>
<?php
$sql = "select * from buildingTB";
include "connection.php";
$response = mysqli_query($con, $sql);
?>
<div class="content">
    <?php
    if (mysqli_num_rows($response) > 0) {
    ?>
        <div class="container row">
            <?php
            while ($data = mysqli_fetch_assoc($response)) {
            ?>

                <div class="col-sm-6">
                    <div class="card text-center my-3">
                        <div class="card-header">
                           <h3> WING : <?php echo $data['b_id'] ?></h3>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Total Flats : <?php echo $data['total_flats'] ?></h5>
                            <p class="card-text">Number of floors : <?php echo $data['no_of_floors'] ?></p>
                            <p class="card-text">Number of flats per floor : <?php echo $data['flats_per_floor'] ?></p>
                            <p class="card-text">Maintainance : <?php echo $data['maintainance'] ?></p>
                            <a href="manageflats.php?BID=<?php echo $data['b_id']?>&FLOOR=<?php echo $data['no_of_floors'] ?>&FLAT=<?php echo $data['flats_per_floor'] ?>" class="btn btn-dark">Show Flats</a>
                        </div>
                        <div class="card-footer text-muted">
                            WING Details
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    <?php
    }
    
    ?>
</div>