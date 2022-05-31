<?php
session_start();
?>
<?php
include "sidebar.php";
?>

<?php
$sqlbuild = "select b_id from buildingTB";
include "./connection.php";
$responsebuild = mysqli_query($con, $sqlbuild);
if (mysqli_num_rows($responsebuild) > 0) {
?>
    <div class="content">
        <?php
        while ($databuild = mysqli_fetch_assoc($responsebuild)) {
            $bid = $databuild["b_id"];
            $sqlcom = "select m_name,role_name from commiteeTB c,roleTB r where b_id='$bid' and c.role_id=r.role_id";
            $responsecom = mysqli_query($con, $sqlcom);
            if (mysqli_num_rows($responsecom) > 0) {
        ?>
                <div class="card text-center my-3" >
                    <div class="card-header">
                        <b> WING : <?php echo $bid ?></b>
                    </div>
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php
                        while ($datacom = mysqli_fetch_assoc($responsecom)) {
                        ?>
                            <li class="list-group-item ">
                                <?php
                                if ($datacom['role_name'] == "Secretary") {
                                    echo "Secretary : " . $datacom['m_name'];
                                } elseif($datacom['role_name'] == "Treasure") {
                                    echo "Treasure : " . $datacom['m_name'];
                                }else{
                                    echo "Committee Member : ".$datacom['m_name'];
                                }
                                ?>
                            </li>
                        <?php
                        }
                        ?>
                        <div class="container mt-3">
                        <a href="./showcommittee.php?BID=<?php echo $bid?>" class="btn btn-primary">Show Committee Details</a>
                        </div>
                        
                    </ul>
                    </div>
                </div>
            <?php

            } else {
            ?>
                <div class="card text-center my-3">
                    <div class="card-header">
                        <b> Wing : <?php echo $bid ?></b>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">No committee has been created !!</h5>
                        <p class="card-text">You can create committee by clicking on button !!</p>
                        <a href="./showcommittee.php?BID=<?php echo $bid?>" class="btn btn-primary">Create Committee</a>
                    </div>
                    <div class="card-footer text-muted">
                        Please Create Committee!!!!
                    </div>
                </div>
    <?php
            }
        }
    }
    ?>

    </div>