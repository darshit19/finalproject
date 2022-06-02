<?php
session_start();
$_flatno=$_SESSION['owedetails']['flatno'];
$_bid=$_SESSION['owedetails']['b_id'];
$_maintid=$_GET['maint_id'];
?>
<?php
$sql="INSERT INTO `collectiontb`(`maint_id`, `flatno`, `b_id`) VALUES ('$_maintid','$_flatno','$_bid')";
include 'connection.php';
$response=mysqli_query($con,$sql);
if($response){
    header("location:maintainancepanel.php");
}else{
    ?>
    <div class="content">
        <?php echo "error :".mysqli_errno($con); ?>
    </div>
    <?php
}
?>
