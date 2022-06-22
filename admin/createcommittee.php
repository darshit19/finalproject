<?php
session_start();
?>
<?php
include "./sidebar.php";
?>

<?php
$sql = "select * from roletb";
include "./connection.php";
$response = mysqli_query($con, $sql);
$b_id = $_GET['BID'];
$role = $_GET['ROLE'];
?>

<script src="../js/mmvalidation.js"></script>
<div class="content">
    <div class="container my-5">
        <h1 class="mb-4 ">Fill up The Member's Details</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Member's Name :</label>
                <input type="text" name="m_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter Member's Name : " required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Member's Role :</label>
                <select class="form-select" name="rolenm" aria-label="Default select example" readonly>
                    <option selected>Select Member's Role</option>
                    <?php
                    while ($data = mysqli_fetch_assoc($response)) {
                    ?>
                        <option value="<?php echo $data['role_id'] ?>" <?php if($role==$data['role_name']){echo 'selected';}?>><?php echo $data['role_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">WING Name :</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $b_id ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Member's Mobile Number : </label><span id="errmobile"></span>
                <input type="number" class="form-control" id="mobile" placeholder="Enter Member's Mobile Number : "  onkeyup="validatemobile()" onchange="validatemobile()" maxlength="10" name="mobile" pattern="[6-9]{1}[0-9]{9}" required>
            </div>
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Email address : </label><span id="erremail"></span>
                <input type="email" onchange="validateemail()" onkeyup="validateemail()" id="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
            </div>
            <button name="add" type="submit" class="btn btn-dark">Add Member</button>
        </form>
    </div>

    <?php
    if (isset($_POST['add'])) {
        $name = $_POST['m_name'];
        $rolein = $_POST['rolenm'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        $sql1 = "INSERT INTO `commiteetb`(`m_name`, `role_id`, `b_id`, `m_mobile`, `m_email`) VALUES ('$name','$rolein','$b_id','$mobile','$email')";

        include "./connection.php";
        $response1 = mysqli_query($con, $sql1);
        if ($response1) {
    ?>
            <script>
                alert("Member Added Successfully");
                setTimeout(window.location.href = "./showcommittee.php?BID=<?php echo $b_id ?>", 20);
            </script>
    <?php
        } else {
            echo $sql . mysqli_errno($con);
        }
    }

    ?>
</div>

<!--  -->