<?php
session_start();
include 'tresidebar.php';
?>
<?php
$dataarr=unserialize(urldecode($_GET['response']));
$_SESSION['tredetails']=$dataarr;
header("location:./profile.php");
?>