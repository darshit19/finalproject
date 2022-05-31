<?php
session_start();
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
include 'ownerside.php';
?>
<div class="content">
    <a class="btn btn-dark my-5 mx-3 disabled" href="">Pending Maintainance</a>
    <a class="btn btn-dark my-5" href="./previousmaintainance.php">Previous Maintainance</a>
    <?php
    $sql = "select * from maintainancetb where maint_id not in(select maint_id from collectiontb where flatno='$_flatno')";  
    $month_names = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
    ?>
        <div class="container  mb-4">
            <h2>Your Pending Maintainance</h2>
        </div>
        <?php
        while ($data = mysqli_fetch_assoc($response)) {
            $_bid = $_SESSION['owedetails']['b_id'];
        ?>
            <div class="card">
                <h5 class="card-header ">Pending...</h5>
                <div class="card-body">
                    <h5 class="card-title">FlatNo : <?php echo $_flatno ?></h5>
                    <p class="card-text">Maintainance Month : <?php echo '' . $month_names[$data['month'] - 1] . ''; ?>/<?php echo $data['year'] ?></p>
                    <p class="card-text">Payable Money : <?php echo $data['m_money'] . ' rs.'; ?></p>
                    <a href="./paymaintainance.php" class="btn btn-success">Pay Maintainance</a>
                </div>
            </div>
    <?php
        }
    }else{
        ?>
        <div class="container  mb-4">
            <h2>Your Maintainance Record is Up-to-Date</h2>
        </div>
        <?php
    }
    ?>
</div>