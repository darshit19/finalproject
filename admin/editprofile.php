<?php
session_start();
$id = $_SESSION['admin']['admin_id'];
$name= $_SESSION['admin']['name'];
$mobile=$_SESSION['admin']['mobile'];
$email=$_SESSION['admin']['admin_email'];
?>
<?php
include './sidebar.php';
?>

<script src="../js/mmvalidation.js"></script>
<div class="content">

    <div class="container my-5">
        <h1 class="mb-4 ">Fill up The Member's Details</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Name :</label>
                <input type="text" name="m_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Member's Name : " value="<?php echo $name ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"> Mobile Number : </label><span id="errmobile"></span>
                <input type="number" class="form-control" id="mobile" onkeyup="validatemobile()" onchange="validatemobile()" placeholder="Enter Member's Mobile Number : " name="mobile" pattern="[6-9]{1}[0-9]{9}" maxlength="10" value="<?php echo $mobile ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Email address :</label><span id="erremail"></span>
                <input type="email" class="form-control" onchange="validateemail()" onkeyup="validateemail()" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" value="<?php echo $email ?>" required>
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


        $sql1 = "update admin set name='$name',mobile='$mobile',admin_email='$email' where admin_id='$id'";
        include "./connection.php";
        $response1 = mysqli_query($con, $sql1);
        if ($response1) {
    ?>
            <script>
                alert("Profile Updated Successfully\nYou need to login again as you update your Profile");
                setTimeout(window.location.href = "./adminlogout.php", 5);
            </script>
    <?php
        } else {
            echo  $sql1. mysqli_error($con);
        }
    }

    ?>
    </div>