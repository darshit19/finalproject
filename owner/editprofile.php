<?php
session_start();
$id = $_SESSION['owedetails']['owe_id'];
$name= $_SESSION['owedetails']['owe_name'];
$mobile=$_SESSION['owedetails']['owe_mobile'];
$email=$_SESSION['owedetails']['owe_email'];
?>
<?php
include './ownerside.php';
?>
<div class="content">

    <div class="container my-5">
        <h1 class="mb-4 ">Fill up The Member's Details</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Name :</label>
                <input type="text" name="m_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Member's Name : " value="<?php echo $name ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Mobile Number :</label>
                <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Enter Member's Mobile Number : " name="mobile" pattern="[6-9]{1}[0-9]{9}" value="<?php echo $mobile ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Email address :</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email" value="<?php echo $email ?>" required>
            </div>
            <button name="update" type="submit"  style="margin-top: 13px;" class="btn btn-dark">UPDATE</button>
            <a name="cancel" href="./profile.php" class="btn btn-danger " style="margin-top: 13px;">CANCEL</a>
            <!-- <button name="reset" type="reset" class="btn btn-dark">Clear</button> -->
        </form>
    </div>


<?php
    if (isset($_POST['update'])) {
        $name = $_POST['m_name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];


        $sql1 = "update ownertb set owe_name='$name',owe_mobile='$mobile',owe_email='$email' where owe_id='$id'";
        include "./connection.php";
        $response1 = mysqli_query($con, $sql1);
        if ($response1) {
    ?>
            <script>
                alert("Profile Updated Successfully\nYou need to login again as you update your Profile");
                setTimeout(window.location.href = "./ownerlogout.php", 20);
            </script>
    <?php
        } else {
            echo  $sql1. mysqli_error($con);
        }
    }

    ?>
    </div>