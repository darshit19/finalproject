<?php
session_start();
?>
<?php
if(isset($_POST['login'])){
    $ad_email=$_POST['ad_email'];
    if(filter_var($ad_email,FILTER_VALIDATE_EMAIL)){
        $ad_password=$_POST['ad_password'];

        //hit query
        $sql="select * from admin where admin_email='$ad_email' and password='$ad_password'";

        //include connection file
        include "connection.php";

        $respones=mysqli_query($con,$sql);
        if(mysqli_num_rows($respones)>0){
            $data=mysqli_fetch_assoc($respones);
            $_SESSION['admin']=$data;
            $_SESSION['admin_id']=$data['admin_id'];
            $_SESSION['admin_email']=$data['admin_email'];
            header("location:./profile.php");
        }
        else{
            ?>
            <script>
                alert("Please enter valid Login Credentials");
            </script>
            <?php
          echo "<script>setTimeout(\"location.href = '../adminlogin.php';\",200); </script>";
        }
    }
    

}
?>