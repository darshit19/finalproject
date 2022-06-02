<?php
session_start();
$vid=$_GET['ID'];
?>
<?php
$sql="delete from vehicletb where v_id='$vid'";
include 'connection.php';
$response=mysqli_query($con,$sql);
if($response){
    header("location:./vehiclepanel.php");
}else{
    echo mysqli_error($con);
}
?>