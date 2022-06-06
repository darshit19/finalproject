<?php
session_start();
?>
<?php
include './ownerside.php';
$_flatno = $_SESSION['owedetails']['flatno'];
$_bid = $_SESSION['owedetails']['b_id'];
?>
<div class="content">
    <div class="container">
        <form method="POST">
            <h1 class="my-4 ">Fill up The Complaint Details</h1>
            <div class="form-group">
                <label>Title :</label>
                <input name="title" type="text" class="form-control col-7" placeholder="Enter Complaint title..." required>
            </div><br>
            <div class="form-group">
                <label>Complaint :</label>
                <textarea name="complaint" placeholder="enter your complaint details..." class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div><br>

            <button name="add" type="submit" class="btn btn-primary" style="margin-top: 13px;">Raise Complaint</button>
            <a name="cancel" href="./complaint.php" class="btn btn-Danger" style="margin-top: 13px;">Cancel</a>
        </form>
    </div>


<?php
    if(isset($_POST['add'])){
        $_title=$_POST['title'];
        $_comp=$_POST['complaint'];
        $date=date('d-m-y');
        $sql="INSERT INTO `complainttb`(`comp_title`, `comp_text`, `flatno`, `b_id`, `comp_date`) VALUES ('$_title','$_comp','$_flatno','$_bid','$date')";
        include 'connection.php';
        $response=mysqli_query($con,$sql);
        if($response){
            header("location:./complaint.php");
        }else{
            echo mysqli_error($con);
        }
    }
?>
</div>