<?php
// session_start();
?>
<?php
$bid=$_SESSION['tredetails']['b_id'];
$sql1 = "select sum(in_amount) as totalincome from incometb where  b_id='$bid'";
include './connection.php';
$response1 = mysqli_query($con, $sql1);
$totalincome = mysqli_fetch_assoc($response1);

$sql2 = "select sum(exp_amount) as totalexpense from expensetb where  b_id='$bid'";
$response2 = mysqli_query($con, $sql2);
$totalexpense = mysqli_fetch_assoc($response2);
$income=$totalincome['totalincome'];
$expense=$totalexpense['totalexpense'];
$balance=$income-$expense;
?>