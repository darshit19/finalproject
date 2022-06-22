<?php
session_start();
?>
<?php
$_flatno=$_SESSION['owedetails']['flatno'];
$_bid=$_SESSION['owedetails']['b_id'];
$_maintid=$_POST['maint_id'];

include('connection.php');

if(isset($_POST['payment_id'])){
    
    $payment_id=$_POST['payment_id'];
    $sql="INSERT INTO `collectiontb`(`maint_id`, `flatno`, `b_id`) VALUES ('$_maintid','$_flatno','$_bid')";
    $response=mysqli_query($con,$sql);
}
