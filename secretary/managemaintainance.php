<?php
session_start();
?>
<?php
include 'secsidebar.php';
?>
<div class="content">
    <div class="container">
        <?php
        $bid = $_SESSION['secdetails']['b_id'];
        $sql = "select * from maintainancetb where b_id='$bid'";
        $sql2 = "select maintainance,total_flats from buildingtb where b_id='$bid'";
        include "connection.php";
        $response = mysqli_query($con, $sql);
        $response2 = mysqli_query($con, $sql2);
        $data2 = mysqli_fetch_assoc($response2);
        $_SESSION['m_money'] = $data2['maintainance'];
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
                        <th scope="col">Total Flats</th>
                        <th scope="col">Collected Flats</th>
                        <th scope="col">Details of Remainingn flats</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($response)) {
                        $_mid = $data['maint_id'];
                        $sqlcount = "select count(maint_id) as total from collectiontb where maint_id='$_mid'";
                        $res = mysqli_query($con, $sqlcount);
                        $cdata = mysqli_fetch_assoc($res);
                    ?>
                        <tr>
                            <th scope="row"><?php echo $data['maint_id'] ?></th>
                            <td><?php echo $data2['maintainance'] ?></td>
                            <td><?php echo $data['month'] ?></td>
                            <td><?php echo $data['year'] ?></td>
                            <td><?php echo $data2['total_flats'] ?></td>
                            <td><?php echo $cdata['total'] ?></td>
                            <td><a class="btn btn-outline-primary" href="./showremain.php?ID=<?php echo $data['maint_id'] ?>">Show</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a class="btn btn-success" href="./generatemaintainance.php">Generate Maintainance</a>
        <?php
        } else {
        ?>
            <div class="container pt-5">
                <div class="card text-center">
                    <div class="card-header">
                        No Maintainance are added there till now !
                    </div>
                    <div class="card-body">
                        <p class="card-text">You can add Maintainance by clicking on Button !</p>
                        <a href="./generatemaintainance.php" class="btn btn-primary ">Generate Maintainance</a>
                    </div>
                    <div class="card-footer text-muted">
                        MAINTAINANCE MONEY : <?php echo $data2['maintainance'] ?>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>