<?php
session_start();
// include 'ownerside.php';
?>
<div class="content">
<?php
$dataarr=unserialize(urldecode($_GET['response']));
$_SESSION['owedetails']=$dataarr;
$_SESSION['renter']=1;
header("location:./profile.php");
// echo $_SESSION['owedetails']['flatno'];
?>
</div>
