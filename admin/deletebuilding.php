<?php
session_start();
?>
<?php
$delid=$_GET['ID'];
$sql="delete from buildingTB where b_id='$delid'";
include "./connection.php";
if(mysqli_query($con,$sql)){
    header("location:./managebuilding.php");
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
?>