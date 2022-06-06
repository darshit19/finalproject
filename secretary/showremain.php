<?php
session_start();
include 'secsidebar.php';
?>
<script src="../js/buttondisable.js"></script>
<div class="content">
    <?php
    $mid = $_GET['ID'];
    $_SESSION['id']=$mid;
    $bid = $_SESSION['secdetails']['b_id'];
    $sql = "select flatno from flattb where flatno not in(select flatno from collectiontb where maint_id='$mid') and b_id='$bid'";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
    ?>
        <h2 class="py-3"><?php echo $bid ?> Building's Remaining Flat's to pay Maintainance </h2>
        <div class="container">
            <form action="sendall.php?response=<?php echo $mid?>" method="post">
            <h4 class="py-3"> You can Direct send message to all remaining : </h4>
            <input name="msg" id=""  type="textarea"  placeholder="type message here..." class="form-control my-3 sendmsg1">
            <span><button type="submit" class="btn btn-primary"  id="sendall" >Send Message</button>  </span>
            </form>
        </div>
        <table class="table " style="max-width: 12rem;">
            <thead>
                <tr>
                    <th scope="col">FlatNo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($response)) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $data['flatno'] ?></th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
        <h2 class="py-3">No Flat's maintainance is Remaining.....!! </h2>
    <?php
    }
    ?>
</div>