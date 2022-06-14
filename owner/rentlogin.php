<?php
session_start();
?>
<?php
$_email = $_POST['email'];
$_mobile = $_POST['mobile'];
$_bid = $_POST['building'];

if ($_bid === 'dummy') {
?>
    <script>
        alert("Please select Building");
        window.location.href = "../ownerlogin.php";
    </script>
    <?php
} else {
    $sql = "select * from rentertb where r_email='$_email' and r_mobile='$_mobile' and b_id='$_bid'";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
        $data = mysqli_fetch_assoc($response);
        //$dataurl=http_build_query($data);
        $dataurl = urlencode(serialize($data));

        header("location:./renterhome.php?response=$dataurl");
    } else {
    ?>
        <script>
            alert("Please Provide Valid Credentials !!");
            setTimeout(window.location.href = "../renterlogin.php", 20);
        </script>
<?php
    }
}
?>