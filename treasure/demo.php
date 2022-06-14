<?php

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
    echo "Total Expense of selected is : ".$totalexpense['totalexp'].".rs <br><br>";
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
   echo "No Data is available for your selection";
}

?>