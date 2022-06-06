<?php
session_start();
$bid = $_SESSION['owedetails']['b_id'];
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
$r_id = $_GET['ID'];
$sql = "delete from rentertb where r_id='$r_id' and flatno='$_flatno' and b_id='$bid'";
include 'connection.php';   
$response = mysqli_query($con, $sql);
if ($response) {
?>
    <script>
        alert("Renter Removed Successfully !!");
        setTimeout(window.location.href = "./managerenter.php", 10);
    </script>
<?php
} else {
?>
    <script>
        alert("No such record : <?php echo mysqli_error($con) ?>");
        setTimeout(window.location.href = "./managerenter.php", 10);
    </script>
<?php
}
?>