<?php
session_start();
?>
<?php
include './secsidebar.php'
?>

<head>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="content">
    <div class="profilecard mt-5">
        <img src="../img/profilepic.jpg" alt="John" style="width:100%">
        <h1>SECRETARY</h1>
        <p>Name : <?php echo $_SESSION['secdetails']['m_name']?></p>
        <p>Email : <?php echo $_SESSION['secdetails']['m_email']?></p>
        <p>Phone Number : <?php echo $_SESSION['secdetails']['m_mobile']?></p>
        <a href="#" class="anccard"><i class="fa fa-dribbble"></i></a>
        <a href="#" class="anccard"><i class="fa fa-twitter"></i></a>
        <a href="#" class="anccard"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="anccard"><i class="fa fa-facebook"></i></a>
        <p><button class="mt-3" onclick="location.href='./editprofile.php'" >Edit Profile</button></p>
    </div>
</div>