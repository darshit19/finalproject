<?php
session_start();
$_flatno = $_SESSION['owedetails']['flatno'];
$_bid = $_SESSION['owedetails']['b_id'];
$er1 = "";
$er2 = "";
$er3 = "";
?>
<?php
include 'ownerside.php';
?>
<div class="content">
    <div class="container my-5 ">
        <h1 class="mb-4 ">Fill up The Vehicle Details</h1>
        <form method="POST">
            <div class="form-group">
                <label>Vehicle Name :</label>
                <input name="v_name" type="text" class="form-control col-7" placeholder="Enter Vehicle Name" required><span><?php echo $er1 ?></span>
            </div><br>
            <div class="form-group">
                <label>Vehicle number :</label>
                <input type="text" name="v_number" class="form-control" placeholder="Enter Vehicle Number  ....eg:GJ-05-AD-0283" required><span><?php echo $er2 ?></span>
            </div><br>
            <div class="form-group">
                <label>Color</label>
                <input type="text" name="color" class="form-control" placeholder="Enter Color of the vehicle  ..eg:Red " required><span><?php echo $er3 ?></span>
            </div><br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vehicle Type : </label>
                <select class="form-select" name="type" aria-label="Default select example" required>
                    <option value="dummy" selected>Select Vehicle Type</option>
                    <option value="1">2 Wheeler</option>
                    <option value="2">4 Wheeler</option>
                </select>
            </div><br>

            <button name="add" type="submit" class="btn btn-primary" style="margin-top: 13px;">ADD Vehicle</button>
            <a name="cancel" href="./vehiclepanel.php" class="btn btn-Danger" style="margin-top: 13px;">Cancel</a>
        </form>
    </div>


    <?php
    


    if (isset($_POST['add'])) {
        $regex = '/^[A-Z]{2}[-][0-9]{1,2}[-][A-Z]{1,2}[-][0-9]{3,4}$/';
        $_vnumber = $_POST['v_number'];
        $name = $_POST['v_name'];
        $color = $_POST['color'];
        $type = $_POST['type'];

        if ($type == 'dummy') {
    ?>
            <script>
                alert("Please Select the Vehicle Type");
            </script>
            <?php
        } else {
            if (preg_match($regex, $_vnumber)) {
                $sql = "INSERT INTO `vehicletb`( `type_id`, `color`, `v_name`, `vehicle_num`, `flatno`, `b_id`) VALUES ('$type','$color','$name','$_vnumber','$_flatno','$_bid')";
                include 'connection.php';
                $response = mysqli_query($con, $sql);
                if ($response) {
                    header("location:./vehiclepanel.php");
                } else {
                    echo "error" . mysqli_errno($con);
                }
            } else {
            ?>
                <script>
                    alert("Please match the given format of number Plat");
                </script>
    <?php
            }
        }
    }


    ?>
</div>