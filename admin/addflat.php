<?php
session_start();
?>
<?php
$b_id = $_GET['BID'];
$floor = $_GET['FLOOR'];
$flat = $_GET['FLAT'];
$flatstatus=null;
$flatnoA = $b_id;
$flatnoN = 100;
$flatno = $flatnoA . $flatnoN;
$sql=null;
include "./connection.php";
for ($i = 1; $i < $floor+1; $i++) {

    for ($j = 0; $j < $flat; $j++) {
        $flatnoN++;
        $flatno = $flatnoA . $flatnoN;
        $sql .= "insert into flatTB(`flatno`, `b_id`, `floorno`, `isowned`, `isonrent`, `isempty`) values('$flatno','$b_id','$i','$flatstatus','$flatstatus','$flatstatus');";
    }
    
    $flatnoN = $flatnoN - $flat + 100;
    
}

if (mysqli_multi_query($con, $sql)) {
    ?>
    <script>
        setTimeout("window.location.href= \"./manageflats.php?BID=<?php echo $b_id?>&FLOOR=<?php echo$floor?>&FLAT=<?php echo$flat?>\";",50);
    </script>
    <?php
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>