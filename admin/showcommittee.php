<?php
include "./sidebar.php";
?>

<?php
$b_id = $_GET['BID'];
$sql = "select m_id,m_name,role_name,b_id,m_mobile,m_email from commiteeTB c,roletb r where b_id='$b_id' and c.role_id=r.role_id and r.role_id=1";
include "./connection.php";
$response = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows($response);
?>
<div class="content">
<?php
if ($rowcount > 0) {
    $data = mysqli_fetch_assoc($response);
?>
    <div class="container my-3">
        <div class="card">
            <h5 class="card-header"><?php echo $data['role_name'] ?></h5>
            <div class="card-body">
                <p class="card-text"><b>Member Name : </b><?php echo $data['m_name'] ?></p>
                <p class="card-text"><b>Wing Name : </b><?php echo $data['b_id'] ?></p>
                <p class="card-text"><b>Mobile Number : </b><?php echo $data['m_mobile'] ?></p>
                <p class="card-text"><b>Email : </b><?php echo $data['m_email'] ?></p>
                <a href="./updatecommittee.php?BID=<?php echo $b_id?>&ROLE=<?php echo 'Secretary'?>&NAME=<?php echo $data['m_name']?>&MOBILE=<?php echo $data['m_mobile'] ?>&EMAIL=<?php echo $data['m_email'] ?>&MID=<?php echo $data['m_id'] ?>" class="btn btn-primary">Update or Change Secretary</a>
            </div>
        </div>
    </div>
<?php
}else{
    ?>
    <div class="container my-3">
        <div class="card">
            <h5 class="card-header">Secretary</h5>
            <div class="card-body">
                <p class="card-text">Secretary is not created yet</p>
                <a href="./createcommittee.php?BID=<?php echo $b_id?>&ROLE=<?php echo 'Secretary'?>" class="btn btn-primary">Create Secretary</a>
            </div>
        </div>
    </div>
    <?php
}
$sql1 = "select m_id,m_name,role_name,b_id,m_mobile,m_email from commiteeTB c,roletb r where b_id='$b_id' and c.role_id=r.role_id and r.role_id=2";
$response1 = mysqli_query($con, $sql1);
$rowcount1 = mysqli_num_rows($response1);
if ($rowcount1 > 0) {
    $data1 = mysqli_fetch_assoc($response1);
?>
    <div class="container my-3">
        <div class="card">
            <h5 class="card-header"><?php echo $data1['role_name'] ?></h5>
            <div class="card-body">
                <p class="card-text"><b>Member Name : </b><?php echo $data1['m_name'] ?></p>
                <p class="card-text"><b>Wing Name : </b><?php echo $data1['b_id'] ?></p>
                <p class="card-text"><b>Mobile Number : </b><?php echo $data1['m_mobile'] ?></p>
                <p class="card-text"><b>Email : </b><?php echo $data1['m_email'] ?></p>
                <a href="./updatecommittee.php?BID=<?php echo $b_id?>&ROLE=<?php echo 'Treasure'?>&NAME=<?php echo $data1['m_name']?>&MOBILE=<?php echo $data1['m_mobile'] ?>&EMAIL=<?php echo $data1['m_email'] ?>&MID=<?php echo $data1['m_id'] ?>" class="btn btn-primary">Update or Change Treasure</a>
            </div>
        </div>
    </div>
<?php
}else{
    ?>
    <div class="container my-3">
        <div class="card">
            <h5 class="card-header">Treasure</h5>
            <div class="card-body">
                <p class="card-text">Treasure is not created yet</p>
                <a href="./createcommittee.php?BID=<?php echo $b_id?>&ROLE=<?php echo 'Treasure'?>" class="btn btn-primary">Create Treasure</a>
            </div>
        </div>
    </div>
    <?php
}
?>
</div>