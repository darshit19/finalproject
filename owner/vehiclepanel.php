<?php
session_start();
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
include 'ownerside.php';
?>
<div class="content">
    <?php
    $sql1 = "select * from vehicletb where flatno='$_flatno' and type_id='1'";

    include 'connection.php';
    $response1 = mysqli_query($con, $sql1);

    if (mysqli_num_rows($response1) > 0) {
    ?>
        <h2 class="py-3">Two Wheeler Details</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Vehicle No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col" colspan="2">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data1 = mysqli_fetch_assoc($response1)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $data1['vehicle_num'] ?></th>
                        <td><?php echo $data1['v_name'] ?></td>
                        <td><?php echo $data1['color'] ?></td>
                        <td><a class="material-icons" href="./deletevehicle.php?ID=<?php echo $data1['v_id'] ?>" onclick="return confirm('Are you sure you want to delete this Vehicle??')">delete</a></td>
                        <td><a class="material-icons" href="./updatevehicle.php?ID=<?php echo $data1['v_id'] ?>">edit</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="./addvehicle.php" class="btn btn-success ">Add Vehicle</a>
    <?php
    } else {
    ?>
        <div class="container pt-5">
            <div class="card text-center">
                <div class="card-header">
                    No Two wheelers are added there till now !
                </div>
                <div class="card-body">
                    <p class="card-text">You can add your two wheeler by clicking on Button !</p>
                    <a href="./addvehicle.php" class="btn btn-success ">Add Vehicle</a>
                </div>
                <div class="card-footer text-muted">
                    Please Add Your Vehicle for Better Management!!!!
                </div>
            </div>
        </div>
    <?php
    }
    $sql2 = "select * from vehicletb where flatno='$_flatno' and type_id='2'";
    $response2 = mysqli_query($con, $sql2);
    if (mysqli_num_rows($response2) > 0) {
        ?>
            <h2 class="py-3">Four Wheeler Details</h2>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Vehicle No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Color</th>
                        <th scope="col" colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data2 = mysqli_fetch_assoc($response2)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $data2['vehicle_num'] ?></th>
                            <td><?php echo $data2['v_name'] ?></td>
                            <td><?php echo $data2['color'] ?></td>
                            <td><a class="material-icons" href="./deletevehicle.php?ID=<?php echo $data2['v_id'] ?>" onclick="return confirm('Are you sure you want to delete this Vehicle??')">delete</a></td>
                            <td><a class="material-icons" href="./updatevehicle.php?ID=<?php echo $data2['v_id'] ?>">edit</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a href="./addvehicle.php" class="btn btn-success ">Add Vehicle</a>
        <?php
        } else {
        ?>
            <div class="container pt-5">
                <div class="card text-center">
                    <div class="card-header">
                        No Four wheelers are added there till now !
                    </div>
                    <div class="card-body">
                        <p class="card-text">You can add your four wheeler by clicking on Button !</p>
                        <a href="./addvehicle.php" class="btn btn-success ">Add Vehicle</a>
                    </div>
                    <div class="card-footer text-muted">
                        Please Add Your Vehicle for Better Management!!!!
                    </div>
                </div>
            </div>
        <?php
        }
    ?>
</div>