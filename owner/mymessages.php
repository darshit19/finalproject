<?php
session_start();
$bid = $_SESSION['owedetails']['b_id'];
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
include './ownerside.php';
?>
<?php
$sql = "select * from messagetb where flatno='$_flatno'";
include './connection.php';
$response = mysqli_query($con, $sql);
?>
<div class="content">
    <div class="col d-flex justify-content-center  my-3">
        <h2> Your Messages</h2>
    </div>
    <?php
     if(mysqli_num_rows($response)>0){
        while ($data = mysqli_fetch_assoc($response)) {
            ?>
                    <div class="col d-flex justify-content-center mb-3">
                        <div class="card border-light " style="width: 40rem;">
                            <div class="card-header">
                                <h4><?php echo $data['msg_date'] ?></h4>
                            </div>
                            <div class="card-body bg-light">
                                <p class="card-text"><b>Message : </b><?php echo $data['msg_text'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
     }else {
        ?>
        <div class="col d-flex justify-content-center">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <p class="card-text">No Messages has been sent to you...!!!</p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    ?>
</div>