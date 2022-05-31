<?php
session_start();
?>
<?php
include 'secsidebar.php';
?>
<div class="content">


    <?php
    $bid = $_SESSION['secdetails']['b_id'];
    $sql = "select * from flatTB where b_id='$bid'";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
    ?>
        <h2 class="py-3"><?php echo $bid ?> Building Details</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Flat No.</th>
                    <th scope="col">Floor No.</th>
                    <th scope="col">Owner Details</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($response)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $data['flatno'] ?></th>
                        <td><?php echo $data['floorno'] ?></td>
                        <td><?php if ($data['isowned'] == 1) {
                                $_flatno = $data['flatno'];
                                $sql1 = "select * from ownertb where flatno='$_flatno'";
                                $response1 = mysqli_query($con, $sql1);
                                if (mysqli_num_rows($response1) > 0) {
                                    $data1=mysqli_fetch_assoc($response1);
                                    echo "Name : ".$data1['owe_name']."<br>";
                                    echo "Mobile : ".$data1['owe_mobile']."<br>";
                                    echo "Email : ".$data1['owe_email']."<br>";
                                }
                                else{
                                    echo mysqli_errno($con);
                                }
                            } else {
                                echo "No Owner";
                            } ?>
                        </td>
                        <td>
                            <a class="btn btn-outline-primary" href="setowner.php?flatno=<?php echo $data['flatno'] ?>&status=<?php echo $data['isowned'] ?>" role="button"><?php
                                                                                                                                                                            if ($data['isowned'] == 1) {
                                                                                                                                                                                echo "Change Owner";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "Set Owner";
                                                                                                                                                                            }
                                                                                                                                                                            ?></a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="dummy" style="height: 40px;"></div>
        <!-- <button type="button" class="btn btn-success" onclick="window.location.href='./addbuilding.php'">Add Buildings</button> -->
    <?php
    }
    ?>

</div>