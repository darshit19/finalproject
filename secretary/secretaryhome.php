<?php
session_start();
include 'secsidebar.php';
?>
<?php
$dataarr=unserialize(urldecode($_GET['response']));
$_SESSION['secdetails']=$dataarr;
?>