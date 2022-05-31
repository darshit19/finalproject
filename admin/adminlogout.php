<?php
session_destroy();
clearstatcache();
header("location:../home.php");
?>