<?php
session_start();
$_maintid=$_SESSION['id'];
$flatno= $_GET['flatno'];
$msg= $_POST['msg'];
$mid=$_SESSION['secdetails']['m_id'];
?>
<?php
$date=date('d-m-y');
$sql="INSERT INTO `messagetb`(`msg_text`, `flatno`, `m_id`,`msg_date`) VALUES ('$msg','$flatno','$mid','$date')";
include 'connection.php';
$response=mysqli_query($con,$sql);
if($response){
    ?>
    <script>
        alert("Message sent successfully");
        window.location.href="./showremain.php?ID=<?php echo $_maintid?>";
    </script>
    <?php
}
else{
    echo mysqli_error($con);
}
?>