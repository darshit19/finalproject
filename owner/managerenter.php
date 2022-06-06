<?php
session_start();
$bid = $_SESSION['owedetails']['b_id'];
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
include './ownerside.php';
?>
<div class="content">
<?php
$sql = "select * from rentertb where flatno='$_flatno' and b_id='$bid'";
include './connection.php';
$response = mysqli_query($con, $sql);
if (mysqli_num_rows($response) > 0) {
    while ($data = mysqli_fetch_assoc($response)) {
?>
        <div class="card my-3">
            <div class="card-header">
                <h2>MY RENTER</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Renter Details</h5>
                <p class="card-text">Name : <?php echo $data['r_name']?></p>
                <p class="card-text">Email : <?php echo $data['r_email']?></p>
                <p class="card-text">Mobile no : <?php echo $data['r_mobile']?></p>
                <p class="card-text">Rent : <?php echo $data['rent']?></p>
                <a href="./updaterenter.php?ID=<?php echo $data['r_id']?>" class="btn btn-primary">Change or Update Renter</a>
                <a href="./removerenter.php?ID=<?php echo $data['r_id']?>" onclick="return confirm('Are you sure you want to remove renter')" class="btn btn-danger">Remove Renter</a>
            </div>
        </div>
<?php
    }
}else{
    ?>
    <div class="col d-flex justify-content-center mt-6">
            <div class="card border-secondary m-5" style="width: 40rem;">
            <div class="card-header">
                       <h3>Renter Details</h3>
                    </div>
                <div class="card-body ">
                    <p class="card-text"><b> You haven't add any renter </b></p>
                    <hr>
                    <p class="card-text"><b>If you have given your flat on rent then please add your renter for better management.</b></p>
                    <hr>
                    <a href="./addrenter.php" class="btn btn-success">Add Renter</a>
                </div>
            </div>
        </div>
    <?php
}
?>
</div>