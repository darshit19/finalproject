<?php
session_start();
?>
<?php
include "./sidebar.php";
?>
<div class="content">
    <div class="container">
        <?php
        $b_id = $_GET['BID'];
        $floor = $_GET['FLOOR'];
        $flat = $_GET['FLAT'];
        $sql = "select * from flatTB where b_id='$b_id'";
        include "connection.php";
        $response = mysqli_query($con, $sql);
        if (mysqli_num_rows($response) > 0) {
        ?>
            <h2 class="py-3"><?php echo $b_id ?> Building Details</h2>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Flat No.</th>
                        <th scope="col">Floor No.</th>
                        <th scope="col">isOwned</th>
                        <th scope="col">isOnrent</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($response)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $data['flatno'] ?></th>
                            <td><?php echo $data['floorno'] ?></td>
                            <td><?php if ($data['isowned'] == 1) {
                                    echo "Y";
                                } else {
                                    echo "N";
                                } ?></td>
                            <td><?php if ($data['isonrent'] == 1) {
                                    echo "Y";
                                } else {
                                    echo "N";
                                } ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="dummy" style="height: 40px;"></div>
            <!-- <button type="button" class="btn btn-success" onclick="window.location.href='./addbuilding.php'">Add Buildings</button> -->
        <?php
        } else {
        ?>
            <div class="container pt-5">
                <div class="card text-center">
                    <div class="card-header">
                        No Flats are added there till now !
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Wing : <?php echo $b_id ?></h5>
                        <p class="card-text">You can add flats by clicking on Button !</p>
                        <a href="addflat.php?BID=<?php echo $b_id ?>&FLOOR=<?php echo $floor ?>&FLAT=<?php echo $flat ?>" class="btn btn-primary">Add flats</a>
                    </div>
                    <div class="card-footer text-muted">
                        Please Add Flats for Better Management!!!!
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>