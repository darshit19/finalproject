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
$sql = "select * from expensetb where exp_month='$month' and exp_year='$year' and b_id='$bid'";
include './connection.php';
$response = mysqli_query($con, $sql);
if(mysqli_num_rows($response)>0){
    $sql2="select sum(exp_amount) as totalexpense from expensetb where exp_month='$month' and exp_year='$year' and b_id='$bid'";
    $response2=mysqli_query($con, $sql2);
    $totalexpense=mysqli_fetch_assoc($response2);
    echo "
<table>
<tr>
<th scope='col'>ID</th>
<th scope='col'>Expense Date</th>
<th scope='col'>Expense Source</th>
<th scope='col'>Expense Amount</th>
</tr>
";
while ($data = mysqli_fetch_assoc($response)) {
    echo "<tr>";
    echo "<td>".$data['exp_id']."</td>";
    echo "<td>".$data['exp_day']."/".$data['exp_month']."/".$data['exp_year']."</td>";
    echo "<td>".$data['exp_source']."</td>";
    echo "<td>".$data['exp_amount']."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br>Total expense of selected month is : ".$totalexpense['totalexpense'].".rs";
// echo "<br><a class='btn btn-dark my-5 mx-3 ' href='' onclick='return function printpage(){window.print();}'>Current Month Expense</a>";
}
else{
   echo "No Data is available for your selection";
}

?>