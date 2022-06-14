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
$sqlin="select * from incometb where b_id='$bid' ";
$sqltotalin="select sum(in_amount) as totalin from incometb where b_id='$bid' ";
if($month!='dummy'){
    $sqlin.=" and in_month='$month' ";
    $sqltotalin.=" and in_month='$month' ";
}
if($year>=1999){
    $sqlin.=" and in_year='$year'";
    $sqltotalin.=" and in_year='$year' ";
}
include './connection.php';
$response=mysqli_query($con,$sqlin);
$responsetot=mysqli_query($con,$sqltotalin);

if(mysqli_num_rows($response)>0){
    $totalincome=mysqli_fetch_assoc($responsetot);
    echo "Total Income of selected is : ".$totalincome['totalin'].".rs <br><br>";
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

// echo "<br><a class='btn btn-dark my-5 mx-3 ' href='' onclick='return function printpage(){window.print();}'>Current Month Expense</a>";
}
else{
   echo "No Data is available for Income regarding your selection";
}

$sqlexp="select * from expensetb where b_id='$bid' ";
$sqltotalexp="select sum(exp_amount) as totalexp from expensetb where b_id='$bid' ";
if($month!='dummy'){
    $sqlexp.=" and exp_month='$month' ";
    $sqltotalexp.=" and exp_month='$month' ";
}
if($year>=1999){
    $sqlexp.=" and exp_year='$year'";
    $sqltotalexp.=" and exp_year='$year' ";
}
include './connection.php';
$response=mysqli_query($con,$sqlexp);
$responsetot=mysqli_query($con,$sqltotalexp);

if(mysqli_num_rows($response)>0){
    $totalexpense=mysqli_fetch_assoc($responsetot);
    echo "<br><br>Total Expense of selected is : ".$totalexpense['totalexp'].".rs <br><br>";
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

// echo "<br><a class='btn btn-dark my-5 mx-3 ' href='' onclick='return function printpage(){window.print();}'>Current Month Expense</a>";
}
else{
   echo "<br><br>No Data is available for Expense regarding your selection";
}


?>