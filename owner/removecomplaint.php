<?php
session_start();
?>
<?php
$comp_id=$_GET['comp_id'];
$sql="delete from complainttb where comp_id=$comp_id";
include 'connection.php';
$response=mysqli_query($con,$sql);
if($response){
    ?>
    <script>
        alert("Complaint removed successfully");
        setTimeout("window.location.href= \"./complaint.php\";",50);
    </script>
    <?php
}  else{
    echo mysqli_error($con);
}
?>