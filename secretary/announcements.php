<?php
session_start();
?>
<?php
include 'secsidebar.php';
?>
<div class="content">

    <?php
    $bid = $_SESSION['secdetails']['b_id'];
    $sql = "select * from announcementtb where b_id='$bid' order by ann_id desc";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    ?>
    <div class="container my-3">
        <h2> Your Announcements</h2>
    </div>
    <?php
    if (mysqli_num_rows($response) > 0) {
    ?>
        <a class="btn btn-dark mb-5 " href="./myannouncement.php">Make new Announcements</a>
        <?php

        while ($data = mysqli_fetch_assoc($response)) {
        ?>
            <div class="card border-light mb-3" style="max-width: 25rem;">
                <div class="card-header">
                    <h4><?php echo $data['ann_title'] ?></h4>
                </div>
                <div class="card-body bg-light">
                    <p class="card-text"><b>Details : </b><?php echo $data['ann_text'] ?></p>
                    <p class="card-text"><b>Announcement Date : </b><?php echo $data['ann_date'] ?></p>
                    <a class="material-icons mx-2" onclick="return confirm('Are you sure you want to delete this announcement ?')" href="./deleteannouncement.php?ann_id=<?php echo $data['ann_id']?>">delete</a>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container  mt-4">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <p class="card-text">No announcements has been made...!!!</p>
                    <a class="btn btn-dark my-3 " href="./myannouncement.php">Make new Announcements</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>