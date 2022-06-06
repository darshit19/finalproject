<?php
session_start();
?>
<?php
include './secsidebar.php';
?>
<div class="content">
    <div class="container">
        <h1 class="my-3">Your Complaints :</h1>
        <?php
        $_bid = $_SESSION['secdetails']['b_id'];
        $sql = "select * from complainttb where b_id='$_bid' order by comp_id desc";
        include 'connection.php';
        $response = mysqli_query($con, $sql);
        if (mysqli_num_rows($response) > 0) {
            while ($data = mysqli_fetch_assoc($response)) {
                $comp_id = $data['comp_id'];
                $sqlres = "select * from responsetb where comp_id='$comp_id'";
                $res = mysqli_query($con, $sqlres);
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    $datares = mysqli_fetch_assoc($res);
                }

        ?>
                <div class="card border-light mx-5 my-5" style="max-width: 35rem;">
                    <div class="card-header">
                        <h4>Complaint Title : <h2><?php echo $data['comp_title'] ?></h2>
                        </h4>
                    </div>
                    <div class="card-body bg-light">
                        <p class="card-text"><b>Flatno : </b><?php echo $data['flatno'] ?></p>
                        <p class="card-text"><b>Complaint : </b><?php echo $data['comp_text'] ?></p>
                        <p class="card-text"><b>Complaint Date : </b><?php echo $data['comp_date'] ?></p>
                        <hr>
                        <p class="card-text"><b>Response : </b></p>
                        <p class="card-text" style="color:<?php if ($count == 0) {
                                                                echo 'red';
                                                            } ?> ;"><?php if ($count > 0) {
                                                                        echo $datares['res_text'];
                                                                    } else { ?>
                        <form method="POST" action="sendresponse.php?comp_id=<?php echo $data['comp_id'] ?>">
                            <div class="form-group">
                                <textarea name="response" placeholder="enter your response here..." class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                <button name="add" type="submit" class="btn btn-primary" style="margin-top: 13px;">Send Response</button>
                            </div>
                        </form><?php
                                                                    } ?></p>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="container  mt-4">
                <div class="card">
                    <div class="card-header">
                        Your Complaint Panel is empty
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>You can respond complaints</p>
                            <p>Check this panel regularly</p>
                        </blockquote>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>
</div>