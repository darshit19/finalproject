<?php

$_email = $_POST['email'];
$_mobile = $_POST['mobile'];
$_roleid = $_POST['role'];
//serializing the response array for passing in url
//$sql = "select m_id,m_name,b_id from commiteeTB where  role_id='$_roleid' and m_email='$_email' and m_mobile='$_mobile' ";
$sql = "select * from commiteeTB where  role_id='$_roleid' and m_email='$_email' and m_mobile='$_mobile' ";
include 'connection.php';
$response = mysqli_query($con, $sql);
if (mysqli_num_rows($response) > 0) {
    $data = mysqli_fetch_assoc($response);
    //$dataurl=http_build_query($data);
    $dataurl = urlencode(serialize($data));
    if ($_roleid == 1) {
        header("location:./secretary/secretaryhome.php?response=$dataurl");
    } else {
        header("location:./treasure/treasurehome.php?response=$dataurl");
    }
} else {
?>
    <script>
        alert("Please Provide Valid Credentials !!");
        setTimeout(window.location.href = "./committeelogin.php", 20);
    </script>
<?php
}

?>