<?php
session_start();
?>
<?php
include "./sidebar.php";
?>
<head>
<link rel="stylesheet" href="../css/anchortag.css">
</head>
<div class="content">
    <div class="container">
        <?php
        $sql = "select * from buildingTB";
        include "connection.php";
        $response = mysqli_query($con, $sql);
        if (mysqli_num_rows($response) > 0) {
        ?>
        <h2 class="py-3">Building Details</h2>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">BuildingID</th>
                        <th scope="col">No.of floors</th>
                        <th scope="col">Flats per floor</th>
                        <th scope="col">Total Flats</th>
                        <th scope="col">Maintainance</th>
                        <th scope="col" colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($response)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $data['b_id'] ?></th>
                            <td><?php echo $data['no_of_floors'] ?></td>
                            <td><?php echo $data['flats_per_floor'] ?></td>
                            <td><?php echo $data['total_flats'] ?></td>
                            <td><?php echo $data['maintainance'] ?></td>
                            <td><a class="material-icons" href="./deletebuilding.php?ID=<?php echo $data['b_id']?>" onclick="return confirm('Are you sure you want to delete this Building??\nIf you delete this building then data regarding this building will also be deleted.\nDo you want to continue?')">delete</a></td>
                            <td><a class="material-icons" href="./updatebuilding.php?ID=<?php echo $data['b_id']?>">edit</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-success" onclick="window.location.href='./addbuilding.php'">Add Buildings</button>
        <?php
        } else {
        ?>
             <div class="container pt-5">
                <div class="card text-center">
                    <div class="card-header">
                        No Buildings are added there till now !
                    </div>
                    <div class="card-body">
                        <p class="card-text">You can add Buildings by clicking on Button !</p>
                        <a href="./addbuilding.php" class="btn btn-primary ">Add Building</a>
                    </div>
                    <div class="card-footer text-muted">
                        Please Add Buildings for Better Management!!!!
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>