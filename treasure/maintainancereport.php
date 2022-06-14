<?php
session_start();
$bid = $_SESSION['tredetails']['b_id'];
?>
<?php
include './tresidebar.php';
?>
<?php
$sql = "select * from maintainancetb where b_id='$bid' order by maint_id desc";
include 'connection.php';
$response = mysqli_query($con, $sql);
?>

<div class="content">
    <?php
    if (mysqli_num_rows($response) > 0) {
    ?>
        <h2 class="py-3"><?php echo $bid ?> Building Maintainance Details</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">M_ID</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Month</th>
                    <th scope="col">Year</th>
                    <th scope="col">Total Collection(in rs.)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($response)) {
                    $_mid = $data['maint_id'];
                    $sqlcount = "select count(maint_id) as total from collectiontb where maint_id='$_mid'";
                    $res = mysqli_query($con, $sqlcount);
                    $cdata = mysqli_fetch_assoc($res);
                    $collectedamount = $cdata['total'] * $data['m_money'];
                    $status=$data['ac_status'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $data['maint_id'] ?></th>
                        <td><?php echo $data['m_money'] ?></td>
                        <td><?php echo $data['month'] ?></td>
                        <td><?php echo $data['year'] ?></td>
                        <td><?php echo $collectedamount ?></td>
                        <td><a class="btn btn-primary <?php if($status==0){echo 'disabled';}?>" href="addtoincome.php?maint_id=<?php echo $data['maint_id'] ?>&amt=<?php echo $collectedamount?>&month=<?php echo $data['month'] ?>&year=<?php echo $data['year'] ?>" >Add this to income</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    <?php
    } else {
    ?>
        <div class="container pt-5">
            <div class="card text-center">
                <div class="card-header">
                    No Maintainance are added there till now !
                </div>
                <div class="card-body">
                    <p class="card-text">You can show total collection here !</p>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>