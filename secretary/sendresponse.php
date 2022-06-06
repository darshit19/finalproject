<?php
session_start();
?>
<?php
$comp_id= $_GET['comp_id'];
$responsemsg=$_POST['response'];
$resdate=date('d-m-y');

$sql="INSERT INTO `responsetb`( `comp_id`, `res_text`, `res_date`) VALUES ('$comp_id','$responsemsg','$resdate')";
include 'connection.php';
$response=mysqli_query($con,$sql);
if($response){
    header("location:./usercomplaints.php");
}else{
    echo mysqli_error($con);
}

?>