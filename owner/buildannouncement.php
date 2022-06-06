<?php
session_start();
?>
<?php
include 'ownerside.php';
?>
<div class="content">

    <?php
    $bid = $_SESSION['owedetails']['b_id'];
    $sql = "select * from announcementtb where b_id='$bid' order by ann_id desc";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    ?>
    <div class="col d-flex justify-content-center  my-3">
        <h2> Your Building's Announcements :</h2>
    </div>
    <?php
    if (mysqli_num_rows($response) > 0) {


        while ($data = mysqli_fetch_assoc($response)) {
    ?>
            <div class="col d-flex justify-content-center mb-3">
                <div class="card border-light " style="width: 40rem;">
                    <div class="card-header">
                        <h4><?php echo $data['ann_title'] ?></h4>
                    </div>
                    <div class="card-body bg-light">
                        <p class="card-text"><b>Details : </b><?php echo $data['ann_text'] ?></p>
                        <p class="card-text"><b>Announcement Date : </b><?php echo $data['ann_date'] ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="col d-flex justify-content-center">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <p class="card-text">No announcements has been made...!!!</p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>