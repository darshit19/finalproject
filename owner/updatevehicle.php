<?php
session_start();
$_flatno = $_SESSION['owedetails']['flatno'];
$vid = $_GET['ID'];
$sql = "select * from vehicletb where v_id='$vid'";
include 'connection.php';
$response = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($response);
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
                <input name="v_name" value="<?php echo $data['v_name'] ?>" type="text" class="form-control col-7" placeholder="Enter Vehicle Name" required>
            </div><br>
            <div class="form-group">
                <label>Vehicle number :</label>
                <input type="text" name="v_number" value="<?php echo $data['vehicle_num'] ?>" class="form-control" placeholder="Enter Vehicle Number  ....eg:GJ-05-AD-0283" required>
            </div><br>
            <div class="form-group">
                <label>Color</label>
                <input type="text" name="color" value="<?php echo $data['color'] ?>" class="form-control" placeholder="Enter Color of the vehicle  ..eg:Red " required>
            </div><br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Vehicle Type : </label>
                <select class="form-select" name="type" aria-label="Default select example" required>
                    <option value="dummy" selected>Select Vehicle Type</option>
                    <option value="1" <?php if ($data['type_id'] == 1) {
                                            echo 'selected';
                                        } ?>>2 Wheeler</option>
                    <option value="2" <?php if ($data['type_id'] == 2) {
                                            echo 'selected';
                                        } ?>>4 Wheeler</option>
                </select>
            </div><br>

            <button name="update" type="submit" class="btn btn-primary" style="margin-top: 13px;">Update Vehicle</button>
            <a name="cancel" href="./vehiclepanel.php" class="btn btn-Danger" style="margin-top: 13px;">Cancel</a>
        </form>
    </div>

    <?php
    if (isset($_POST['update'])) {
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
                $sql = "update vehicletb set type_id='$type',color='$color',v_name='$name',vehicle_num='$_vnumber' where v_id='$vid'";
                include 'connection.php';
                $response = mysqli_query($con, $sql);
                if ($response) {
                    ?>
                    <script>
                        alert("Vehicle Updated Successfully");
                        window.location.href="./vehiclepanel.php";
                    </script>
        <?php
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