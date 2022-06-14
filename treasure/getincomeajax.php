<?php
session_start();
?>

<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>
<?php
$month = $_GET['month'];
$year = $_GET['year'];
$bid = $_SESSION['tredetails']['b_id'];
$sql = "select * from incometb where in_month='$month' and in_year='$year' and b_id='$bid'";
include './connection.php';
$response = mysqli_query($con, $sql);
if(mysqli_num_rows($response)>0){
    $sql2="select sum(in_amount) as totalincome from incometb where in_month='$month' and in_year='$year' and b_id='$bid'";
    $response2=mysqli_query($con, $sql2);
    $totalincome=mysqli_fetch_assoc($response2);
    echo "
<table>
<tr>
<th scope='col'>ID</th>
<th scope='col'>Income Date</th>
<th scope='col'>Income Source</th>
<th scope='col'>Income Amount</th>
</tr>
";
while ($data = mysqli_fetch_assoc($response)) {
    echo "<tr>";
    echo "<td>".$data['in_id']."</td>";
    echo "<td>".$data['in_day']."/".$data['in_month']."/".$data['in_year']."</td>";
    echo "<td>".$data['in_source']."</td>";
    echo "<td>".$data['in_amount']."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>Total income of selected month is : ".$totalincome['totalincome'].".rs";
}
else{
   echo "No Data is available for your selection";
}

?>