<?php
session_start();
?>
<?php
include 'secsidebar.php';
?>
<?php
$_flatno = $_GET['flatno'];
$_bid = $_SESSION['secdetails']['b_id'];
$_status = $_GET['status']; //for checking that is flat owned or not
?>
<div class="content">
    <div class="container my-5 ">
        <h1 class="mb-4 ">Fill up The Form Details</h1>
        <form method="POST">
            <div class="form-group mb-1">
                <label>FLAT NUMBER :</label>
                <input name="flatno" type="text" class="form-control col-7" value="<?php echo $_flatno ?>" readonly>
            </div><br>

            <div class="form-group mb-1">
                <label>WING :</label>
                <input name="bid" type="text" class="form-control col-7" value="<?php echo $_bid ?>" readonly>
            </div><br>

            <div class="form-group mb-1">
                <label>OWNER NAME :</label>
                <input name="name" type="text" class="form-control col-7" placeholder="Enter owner name" required>
            </div><br>

            <div class="form-group mb-1">
                <label class="form-label" for="form3Example3">OWNER EMAIL :</label>
                <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="abcdefgh@xyz.com" required>
            </div><br>

            <div class="form-group mb-1">
                <label for="exampleFormControlInput1" class="form-label">OWNER'S MOBILE NUMBER :</label>
                <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Enter Owner's Mobile Number : " name="mobile"  required>
            </div><br>

            <button name="submit" type="submit" class="btn btn-success" style="margin-top: 13px;">SUBMIT</button>
            <a name="cancel"  href="./manageowners.php" class="btn btn-danger " style="margin-top: 13px;">CANCEL</a>

        </form>
    </div>


<?php
if (isset($_POST['submit'])) {
    $_name = $_POST['name'];
    $_mobile = $_POST['mobile'];
    $_mail = $_POST['email'];
    if ($_status == 0) {
        $sql = "INSERT INTO `ownertb`(`flatno`, `b_id`, `owe_name`, `owe_mobile`, `owe_email`) VALUES('$_flatno','$_bid','$_name','$_mobile','$_mail')";
    } else {
        $sql = "update ownertb set owe_name='$_name' ,owe_mobile='$_mobile' ,owe_email='$_mail' where flatno='$_flatno' and b_id='$_bid'";
    }

    include "connection.php";
    $response = mysqli_query($con, $sql);
    if ($response) {
        $sqlup="update flattb set isOwned='1' where flatno='$_flatno'";
        $response1 = mysqli_query($con, $sqlup);
?>
        <script>
            alert("Owner Set Successfully !!");
            setTimeout(window.location.href = "./manageowners.php", 20);
        </script>
<?php
    } else {
        echo 'Error' . mysqli_errno($con);
    }
}
?>
</div>