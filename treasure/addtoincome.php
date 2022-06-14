<?php
session_start();
$bid = $_SESSION['tredetails']['b_id'];
$maint_id=$_GET['maint_id'];
$_amt=$_GET['amt'];
?>
<?php
 $sql = "update maintainancetb set ac_status='0' where maint_id='$maint_id' and b_id='$bid'";
 include './connection.php';
 $response = mysqli_query($con, $sql);
 if (!$response) {
    ?>
    <script>
        alert("There is some error occured !!\nError:<?php echo mysqli_error($con)?>");
        setTimeout(window.location.href = "./maintainancereport.php", 20);
    </script>
<?php
} else{
    $_day=10;
    $_month=$_GET['month'];
    $_year=$_GET['year'];
    $_source="Maintainance of this month";
    $sql1="INSERT INTO `incometb`( `in_day`, `in_month`, `in_year`, `in_source`, `in_amount`, `b_id`) VALUES('$_day','$_month','$_year','$_source','$_amt','$bid')";
    $response1 = mysqli_query($con, $sql1);
    if ($response1) {
        ?>
            <script>
                alert("Income added successfully !!");
                setTimeout(window.location.href = "./maintainancereport.php", 20);
            </script>
<?php
        } else {
            echo "error: " . mysqli_errno($con);
        }
}
?>
