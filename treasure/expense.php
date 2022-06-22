<?php
session_start();
?>
<?php
include './tresidebar.php';
?>

<head>
    <link rel="stylesheet" href="../css/anchortag.css">
</head>
<?php
$bid = $_SESSION['tredetails']['b_id'];
?>
<div class="content">
    <a class="btn btn-dark my-5 mx-3 disabled" href="">Current Month Expense</a>
    <a class="btn btn-dark my-5" href="./previouseexpense.php">Previous Months' Expense</a>
    <button  class="btn btn-dark mx-3 my-5" onclick="window.print()">Print</button>

    <?php
    $month = date('n');
    $year = date('Y');
    $sql = "select * from expensetb where b_id='$bid' and exp_month='$month' and exp_year='$year'";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
    ?>
        <h2 class="py-3"><?php echo $bid ?> Building Expense Details of Current Month</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Expense Date</th>
                    <th scope="col">Expense Source</th>
                    <th scope="col">Expense Amount</th>
                    <th scope="col" colspan="2">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($response)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $data['exp_id'] ?></th>
                        <td><?php echo $data['exp_day'] ?>/<?php echo $data['exp_month'] ?>/<?php echo $data['exp_year'] ?></td>
                        <td><?php echo $data['exp_source'] ?></td>
                        <td><?php echo $data['exp_amount'] ?></td>
                        <td><a class="material-icons" href="./removeexpense.php?ID=<?php echo $data['exp_id'] ?>" onclick="return confirm('Are you sure you want to remove this Expense?')">delete</a></td>
                        <td><a class="material-icons" href="./updateexpense.php?ID=<?php echo $data['exp_id'] ?>">edit</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="./addexpense.php">Add Expense</a>
    <?php
    } else {
    ?>
        <div class="container pt-5">
            <div class="card text-center">
                <div class="card-header">
                    No Expense is added for current month till now !
                </div>
                <div class="card-body">
                    <p class="card-text">You can add Expense of current month by clicking on Button !</p>
                    <a href="./addexpense.php" class="btn btn-primary ">Add Expense</a>
                </div>
                <div class="card-footer text-muted">
                    Please Add Expense for Better Management!!!!
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>