<?php
session_start();
$exp_id=$_GET['ID'];
$bid = $_SESSION['tredetails']['b_id'];
?>
<?php
$sql="delete from expensetb where exp_id='$exp_id' and b_id='$bid'";
include 'connection.php';
$response = mysqli_query($con, $sql);
        if ($response) {
        ?>
            <script>
                alert("Expense Removed successfully !!");
                setTimeout(window.location.href = "./expense.php", 20);
            </script>
<?php
        } else {
            echo "error: " . mysqli_errno($con);
        }
?>