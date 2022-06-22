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
    
    <a class="btn btn-dark my-5 mx-3 disabled" href="">Current Month Income</a>
    <a class="btn btn-dark my-5 mx-3" href="./previousincome.php">Previous Months' Income</a>
    <button  class="btn btn-dark mx-3 my-5" onclick="window.print()">Print</button>

    <?php
    $month = date('n');
    $year = date('Y');
    $sql = "select * from incometb where b_id='$bid' and in_month='$month' and in_year='$year'";
    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
    ?>
        <h2 class="py-3"><?php echo $bid ?> Building Income Details of Current Month</h2>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Income Date</th>
                    <th scope="col">Income Source</th>
                    <th scope="col">Income Amount</th>
                    <th scope="col" colspan="2">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_assoc($response)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $data['in_id'] ?></th>
                        <td><?php echo $data['in_day'] ?>/<?php echo $data['in_month'] ?>/<?php echo $data['in_year'] ?></td>
                        <td><?php echo $data['in_source'] ?></td>
                        <td><?php echo $data['in_amount'] ?></td>
                        <td><a class="material-icons" href="./removeincome.php?ID=<?php echo $data['in_id'] ?>" onclick="return confirm('Are you sure you want to remove this Income?')">delete</a></td>
                        <td><a class="material-icons" href="./updateincome.php?ID=<?php echo $data['in_id'] ?>">edit</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="./addincome.php">Add Income</a>
    <?php
    } else {
    ?>
        <div class="container pt-5">
            <div class="card text-center">
                <div class="card-header">
                    No Income is added for current month till now !
                </div>
                <div class="card-body">
                    <p class="card-text">You can add Income of current month by clicking on Button !</p>
                    <a href="./addincome.php" class="btn btn-primary ">Add Income</a>
                </div>
                <div class="card-footer text-muted">
                    Please Add Income for Better Management!!!!
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>