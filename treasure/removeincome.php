<?php
session_start();
$in_id=$_GET['ID'];
$bid = $_SESSION['tredetails']['b_id'];
?>
<?php
$sql="delete from incometb where in_id='$in_id' and b_id='$bid'";
include 'connection.php';
$response = mysqli_query($con, $sql);
        if ($response) {
        ?>
            <script>
                alert("Income Removed successfully !!");
                setTimeout(window.location.href = "./income.php", 20);
            </script>
<?php
        } else {
            echo "error: " . mysqli_errno($con);
        }
?>