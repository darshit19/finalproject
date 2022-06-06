<?php
session_start();
?>
<?php
include 'secsidebar.php';
?>
<?php
$bid = $_SESSION['secdetails']['b_id'];
?>
<div class="content">
    <div class="container my-5 ">
        <h1 class="mb-4 ">Fill up The Announcement Details</h1>
        <form method="POST">
            <div class="form-group">
                <label>Title :</label>
                <input name="title" type="text" class="form-control col-7" placeholder="Enter Announcement title" required>
            </div><br>
            <div class="form-group">
                <label>Announcement :</label>
                <textarea name="announcement" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div><br>

            <button name="add" type="submit" class="btn btn-primary" style="margin-top: 13px;">Make Announcement</button>
            <a name="cancel"  href="./announcements.php" class="btn btn-Danger" style="margin-top: 13px;">Cancel</a>
        </form>
    </div>


    <?php
    if (isset($_POST['add'])) {
        $annmsg = $_POST['announcement'];
        $title=$_POST['title'];
        $anndate = date('d-m-y');
        $sql = "INSERT INTO `announcementtb`(`ann_title`,`ann_text`, `b_id`, `ann_date`) VALUES ('$title','$annmsg','$bid','$anndate')";
        include 'connection.php';
        $response = mysqli_query($con, $sql);
        if ($response) {
            header("location:announcements.php");
        } else {
            echo mysqli_error($con);
        }
    }
    ?>
</div>