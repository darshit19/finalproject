<?php
session_start();
?>
<?php
include './ownerside.php';
?>
<div class="content">
    <div class="container">
    <h1 class="my-3">Your Complaints :</h1>
    
    <?php
    $_flatno = $_SESSION['owedetails']['flatno'];
    $_bid = $_SESSION['owedetails']['b_id'];
    $sql = "select * from complainttb where flatno='$_flatno' order by comp_id desc";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
        ?>
        <a class="btn btn-success my-3 " href="./raisecomplaint.php">Raise New Complaint</a>
        <?php
        while ($data = mysqli_fetch_assoc($response)) {
            $comp_id = $data['comp_id'];
            $sqlres = "select * from responsetb where comp_id='$comp_id'";
            $res = mysqli_query($con, $sqlres);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                $datares = mysqli_fetch_assoc($res);
            }

    ?>
            <div class="card border-light mx-5 my-5" style="max-width: 35rem;">
                <div class="card-header">
                    <h4>Complaint Title : <h2><?php echo $data['comp_title'] ?></h2>
                    </h4>
                </div>
                <div class="card-body bg-light">
                    <p class="card-text"><b>Complaint : </b><?php echo $data['comp_text'] ?></p>
                    <p class="card-text"><b>Complaint Date : </b><?php echo $data['comp_date'] ?></p>
                    <hr>
                    <p class="card-text"><b>Response : </b></p>
                    <p class="card-text" style="color:<?php if($count==0){echo 'red';}?> ;"><?php if ($count > 0) {
                                                echo $datares['res_text'];
                                            } else {
                                                echo "Secretary has not respond to your complaint yet.\nHe will respond your complaint shortly.";
                                            } ?></p>
                    <a class="btn btn-danger my-3 " onclick="return confirm('Are you sure you want to remove this complaint ?')" href="./removecomplaint.php?comp_id=<?php echo $data['comp_id']?>">Remove Complaint</a>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container  mt-4">
            <div class="card">
                <div class="card-header">
                    Your Complaint Panel is empty
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>You can raise your complaint and it will be resolved as soon as possible</p>
                        <footer class="blockquote-footer">Secretary </footer>
                    </blockquote>
                </div>
            </div>
            <a class="btn btn-success my-3 " href="./raisecomplaint.php">Raise New Complaint</a>
        </div>
        
    <?php
    }
    ?>
    </div>
</div>