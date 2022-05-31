<?php
session_start();
?>
<?php
include 'secsidebar.php';
$_bid = $_SESSION['secdetails']['b_id'];
?>

<head>
    <link rel="stylesheet" href="../css/span.css">
</head>
<div class="content">
    <div class="container my-5">
        <h1 class="mb-4 ">Fill up The Form Details</h1>
        <form action="" method="post" name="myform" >

            <div class="form-group mb-3">
                <label>WING :</label>
                <input name="bid" type="text" class="form-control col-7" value="<?php echo $_bid ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">MONTH : </label><span id="lbmonth"></span>
                
                <select class="form-select" name="month" id="month" aria-label="Default select example" required>
                    <option value="dummy" selected>Select Maintainance month</option>
                </select>
            </div>

            <div class="mb-3">
                
                <label for="exampleFormControlInput1" class="form-label">YEAR : </label><span id="lbyear"></span>
                <select class="form-select" name="year" id="year" aria-label="Default select example" required>
                    <option value="dummy" selected>Select Maintainance Year</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Maintainance Money :</label>
                <input name="m_money" type="text" class="form-control col-7" value="<?php echo  $_SESSION['m_money'] ?>" readonly>
            </div>

            <button name="generate" type="submit" class="btn btn-success" style="margin-top: 13px;">GENERATE</button>
            <a name="cancel" href="./managemaintainance.php" class="btn btn-danger " style="margin-top: 13px;">CANCEL</a>
        </form>
    </div>

</div>

<script src="../js/monthyear.js"></script>

<?php
if (isset($_POST['generate'])) {
    $year = $_POST['year'];
    $month = $_POST['month'];
    if ($year && $month != 'dummy') {
        $_money = $_SESSION['m_money'];
        $sql = "INSERT INTO `maintainancetb`( `month`, `year`, `b_id`, `ac_status`, `m_money`) VALUES ('$month','$year','$_bid','0','$_money') ";
        include 'connection.php';
        $response = mysqli_query($con, $sql);
        if ($response) {
?>
            <script>
                alert("Maintainance added successfully !!");
                setTimeout(window.location.href = "./managemaintainance.php", 20);
            </script>
<?php
        } else {
            echo "error: " . mysqli_errno($con);
        }
    } else {
        if($month==='dummy'){
            ?>
            <script>
                document.getElementById("lbmonth").innerHTML=" *Please Select the month";
            </script>
            <?php
        }
        if($year==='dummy'){
            ?>
            <script>
                document.getElementById("lbyear").innerHTML=" *Please Select the year";
            </script>
            <?php
        }

    }
}

?>