<?php
session_start();
$bid = $_SESSION['tredetails']['b_id'];
?>

<head>
    <link rel="stylesheet" href="../css/span.css">
</head>
<?php
include './tresidebar.php';
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
                <input name="day" type="number" placeholder="eg. from 1 to 31 according to month" class="form-control col-7" minlength="1" maxlength="31">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">MONTH : </label><span id="lbmonth"></span>

                <select class="form-select" name="month" id="month" aria-label="Default select example" required>
                    <option value="dummy" selected>Select Expense month</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">YEAR : </label>
                <input name="year" type="number" class="form-control col-7" min="2022" max="2099" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ENTER SOURCE OF EXPENSE : </label>
                <input name="source" type="text" class="form-control col-7" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ENTER AMOUNT OF EXPENSE : </label>
                <input name="amount" pattern="[0-9]*" type="text" min="1" class="form-control col-7" required>
            </div>



            <button name="add" type="submit" class="btn btn-success" style="margin-top: 13px;">ADD</button>
            <a name="cancel" href="./expense.php" class="btn btn-danger " style="margin-top: 13px;">CANCEL</a>
        </form>
    </div>
</div>
<script src="../js/monthyear.js"></script>

<?php
if (isset($_POST['add'])) {
    $_day = $_POST['day'];
    $_month = $_POST['month'];
    $_year = $_POST['year'];
    $_source = $_POST['source'];
    $_amt = $_POST['amount'];
    if ($_month === 'dummy') {
?>
        <script>
            document.getElementById("lbmonth").innerHTML = " *Please Select the month";
        </script>
        <?php
    } else {
        $sql = "INSERT INTO `expensetb`( `exp_day`, `exp_month`, `exp_year`, `exp_source`, `exp_amount`, `b_id`) VALUES ('$_day','$_month','$_year','$_source','$_amt','$bid')";
        include 'connection.php';
        $response = mysqli_query($con, $sql);
        if ($response) {
        ?>
            <script>
                alert("Expense added successfully !!");
                setTimeout(window.location.href = "./expense.php", 20);
            </script>
<?php
        } else {
            echo "error: " . mysqli_errno($con);
        }
    }
}
?>