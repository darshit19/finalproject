<?php
session_start();
?>
<?php
include './ownerside.php'
?>

<head>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="content">
    <div class="container my-3">
    <h3 style="color: red;"><?php if($_SESSION['renter']==1){echo '* You can not update your profile because you are renter you have to contact your Owner for profile updation';} ?></h3>
    </div>
    <div class="profilecard mt-5">
        <img src="../img/profilepic.jpg" alt="John" style="width:100%">
        <h1><?php if($_SESSION['renter']==0){echo 'OWNER';}else{echo 'RENTER';} ?></h1>

        <p>Name : <?php if($_SESSION['renter']==0){ echo $_SESSION['owedetails']['owe_name'];}else{echo $_SESSION['owedetails']['r_name'];}?></p>

        <p>Email : <?php if($_SESSION['renter']==0){echo $_SESSION['owedetails']['owe_email'];}else{echo $_SESSION['owedetails']['r_email'];}?></p>

        <p>Phone Number : <?php if($_SESSION['renter']==0){echo $_SESSION['owedetails']['owe_mobile'];}else{echo $_SESSION['owedetails']['r_mobile'];}?></p>

        <a href="#" class="anccard"><i class="fa fa-dribbble"></i></a>
        <a href="#" class="anccard"><i class="fa fa-twitter"></i></a>
        <a href="#" class="anccard"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="anccard"><i class="fa fa-facebook"></i></a>

        <p><button class="mt-3" onclick="location.href='./editprofile.php'" style="background-color:<?php if($_SESSION['renter']==1){echo 'grey';} ?>;" <?php if($_SESSION['renter']==1){echo 'disabled';}?>>Edit Profile</button></p>
    
    </div>
    
</div>