<?php
session_start();
?>
<?php
$ann_id=$_GET['ann_id'];
$sql="delete from announcementtb where ann_id='$ann_id'";
include 'connection.php';
$response=mysqli_query($con,$sql);
if($response){
    header("location:./announcements.php");
}else{
    echo mysqli_error($con);
}

?>