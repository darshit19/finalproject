<?php
session_start();
?>
<?php
include 'secsidebar.php';
?>
<div class="content">
    <?php
    $bid = $_SESSION['secdetails']['b_id'];
    $sql1 = "select flatno from flattb where b_id='$bid' ";
    include 'connection.php';
    $response1 = mysqli_query($con, $sql1);
    if (mysqli_num_rows($response1) > 0) {
    ?>
        <div class="container">
            <h2 class="pt-3">Vehicle Details of Building : <?php echo $bid?></h2>
            <?php
            while ($data = mysqli_fetch_assoc($response1)) {
                $_flatno=$data['flatno'];
                $sql2 = "select * from vehicletb where flatno='$_flatno' and b_id='$bid'";
                $response2 = mysqli_query($con, $sql2);
            ?>
                <div class="card my-5">
                    <div class="card-header">
                       <h3><?php echo $_flatno?></h3>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">Vehicles</h4>
                        <?php
                        if(mysqli_num_rows($response2)>0){
                            while($data2=mysqli_fetch_assoc($response2)){
                                ?>
                                <p class="card-text"><b>TYPE:</b><?php if($data2['type_id']==1){echo "Two Wheeler";}else{echo "Four Wheeler  ";}?><br> <b>NUMBER:</b><?php echo $data2['vehicle_num']."  "?><br> <b>NAME:</b><?php echo $data2['v_name']."  "?><br><b>COLOR:</b><?php echo $data2['color']."  "?></p>
                                <hr>
                                <?php
                            }
                        }else{
                            ?>
                            <p class="card-text"><h5>No vehicle is there for this flat. </h5></p>
                            <?php
                        }
                        ?>                                                
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>