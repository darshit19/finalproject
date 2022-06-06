<?php
session_start();
$bid = $_SESSION['owedetails']['b_id'];
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
include './ownerside.php';
?>
<div class="content">
    <div class="container my-5 ">
        <h1 class="mb-4 ">Fill up The Form Details</h1>
        <form method="POST">

            <div class="form-group mb-1">
                <label>RENTER NAME :</label>
                <input name="name" type="text" class="form-control col-7" placeholder="Enter renter name" required>
            </div><br>

            <div class="form-group mb-1">
                <label class="form-label" for="form3Example3">RENTER EMAIL :</label>
                <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="abcdefgh@xyz.com" required>
            </div><br>

            <div class="form-group mb-1">
                <label for="exampleFormControlInput1" class="form-label">RENTER'S MOBILE NUMBER :</label>
                <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Enter renter's Mobile Number : " maxlength="10" name="mobile" required>
            </div><br>

            <div class="form-group mb-1">
                <label for="exampleFormControlInput1" class="form-label">RENT MONEY :</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter rent money : " name="rent" required>
            </div>

            <button name="submit" type="submit" class="btn btn-success" style="margin-top: 13px;">SUBMIT</button>
            <a name="cancel" href="./managerenter.php" class="btn btn-danger " style="margin-top: 13px;">CANCEL</a>

        </form>
    </div>


<?php
if (isset($_POST['submit'])) {
    $r_name = $_POST['name'];
    $r_mobile = $_POST['mobile'];
    $r_email = $_POST['email'];
    $rent = $_POST['rent'];

    $sql = "INSERT INTO `rentertb`( `flatno`, `b_id`, `r_name`, `r_mobile`, `r_email`, `rent`) VALUES ('$_flatno','$bid','$r_name','$r_mobile','$r_email','$rent')";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if ($response) {
?>
        <script>
            alert("Renter Added Successfully !!");
            setTimeout(window.location.href = "./managerenter.php", 10);
        </script>
<?php
    }else{
        echo mysqli_error($con);
    }
}
?>
</div>