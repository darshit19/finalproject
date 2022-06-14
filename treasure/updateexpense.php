<?php
session_start();
$exp_id = $_GET['ID'];
$bid = $_SESSION['tredetails']['b_id'];
?>
<?php
include './tresidebar.php';
?>
<?php
$sql = "select * from expensetb where exp_id='$exp_id' and b_id='$bid'";
include 'connection.php';
$response = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($response);
?>


<?php

$monthArray[0] = "January";
$monthArray[1] = "February";
$monthArray[2] = "March";
$monthArray[3] = "April";
$monthArray[4] = "May";
$monthArray[5] = "June";
$monthArray[6] = "July";
$monthArray[7] = "August";
$monthArray[8] = "September";
$monthArray[9] = "October";
$monthArray[10] = "November";
$monthArray[11] = "December";

?>




<div class="content">
    <div class="container my-5">
        <h1 class="mb-4 ">Fill up The Form Details</h1>
        <form action="" method="post" name="myform">

            <div class="form-group mb-3">
                <label>WING :</label>
                <input name="bid" type="text" class="form-control col-7" value="<?php echo $bid ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">DAY : </label>
                <input name="day" value="<?php echo $data['exp_day'] ?>" type="number" placeholder="eg. from 1 to 31 according to month" class="form-control col-7" minlength="1" maxlength="31">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">MONTH : </label><span id="lbmonth"></span>

                <select class="form-select" name="month" id="month" aria-label="Default select example" required>
                    <option value="dummy">Select Expense month</option>
                    <?php
                    $monval = 1;
                    for ($i = 0; $i < 12; $i++) {
                    ?>
                        <option value="<?php echo $monval ?>" <?php if ($data['exp_month'] == $monval) {
                                                                    echo "selected";
                                                                } ?>><?php echo $monthArray[$i] ?></option>
                    <?php
                        $monval++;
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">YEAR : </label>
                <input name="year" value="<?php echo $data['exp_year'] ?>" type="number" class="form-control col-7" min="2022" max="2099" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ENTER SOURCE OF EXPENSE : </label>
                <input name="source" value="<?php echo $data['exp_source'] ?>" type="text" class="form-control col-7" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ENTER AMOUNT OF EXPENSE : </label>
                <input name="amount" pattern="[0-9]*" value="<?php echo $data['exp_amount'] ?>" min="1" type="text" class="form-control col-7" required>
            </div>



            <button name="update" type="submit" class="btn btn-success" style="margin-top: 13px;">UPDATE</button>
            <a name="cancel" href="./expense.php" class="btn btn-danger " style="margin-top: 13px;">CANCEL</a>
        </form>
    </div>
</div>
<?php
if (isset($_POST['update'])) {
    $_day = $_POST['day'];
    $_month = $_POST['month'];
    $_year = $_POST['year'];
    $_source = $_POST['source'];
    $_amt = $_POST['amount'];

    $sql1 = "update expensetb set exp_day='$_day',exp_year='$_year',exp_month='$_month',exp_source='$_source',exp_amount='$_amt' where exp_id='$exp_id' and b_id='$bid'";
    $response1 = mysqli_query($con, $sql1);
    if ($response1) {
?>
        <script>
            alert("Expense Updated successfully !!");
            setTimeout(window.location.href = "./expense.php", 20);
        </script>
<?php
    } else {
        echo "error: " . mysqli_errno($con);
    }
}
?>