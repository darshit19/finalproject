<?php
session_start();
?>
<?php
 $bid = $_SESSION['secdetails']['b_id'];
 $msg=$_POST['msg'];
 $_maintid=$_GET['response'];
 $mid=$_SESSION['secdetails']['m_id'];
 $date=date('d-m-y');
 $sql = "select flatno from flattb where flatno not in(select flatno from collectiontb where maint_id='$_maintid') and b_id='$bid'";
 include 'connection.php';
 $response = mysqli_query($con, $sql);
 $sqlin=null;
 while ($data = mysqli_fetch_assoc($response)){
     $flatno=$data['flatno'];
    $sqlin.="INSERT INTO `messagetb`(`msg_text`, `flatno`, `m_id`,`msg_date`) VALUES ('$msg','$flatno','$mid','$date');";
 }
 if (mysqli_multi_query($con, $sqlin)) {
    ?>
    <script>
        alert("Message Sent to all flats successfully");
        setTimeout("window.location.href= \"./managemaintainance.php\";",50);
    </script>
    <?php
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>