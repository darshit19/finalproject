<?php
session_start();
?>
<?php
//$_bid = $_SESSION['secdetails']['b_id'];
$_status = $_GET['status'];
$_mid = $_GET['m_id'];
include 'connection.php';
if ($_status === '0') {
    $sql = "update maintainancetb set ac_status='1' where maint_id='$_mid'";
    $response = mysqli_query($con, $sql);
    if ($response) {
        header("location: ./managemaintainance.php");
    } else {
        echo "Error" . mysqli_errno($con);
    }
}else{
    $sql = "update maintainancetb set ac_status='0' where maint_id='$_mid'";
    $response = mysqli_query($con, $sql);
    if ($response) {
        header("location: ./managemaintainance.php");
    } else {
        echo "Error" . mysqli_errno($con);
    }
}
?>