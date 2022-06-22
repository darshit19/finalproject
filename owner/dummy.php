<?php
session_start();
$_flatno = $_SESSION['owedetails']['flatno'];
?>
<?php
include 'ownerside.php';
?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<div class="content">
    <a class="btn btn-dark my-5 mx-3 disabled" href="">Pending Maintainance</a>
    <a class="btn btn-dark my-5" href="./previousmaintainance.php">Previous Maintainance</a>
    <?php
    $sql = "select * from maintainancetb where maint_id not in(select maint_id from collectiontb where flatno='$_flatno')";
    $month_names = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    include 'connection.php';
    $response = mysqli_query($con, $sql);
    if (mysqli_num_rows($response) > 0) {
    ?>
        <div class="container  mb-4">
            <h2>Your Pending Maintainance</h2>
        </div>
        <?php
        while ($data = mysqli_fetch_assoc($response)) {
            $_bid = $_SESSION['owedetails']['b_id'];
        ?>
            <div class="card">
                <h4 class="card-header ">Pending...</h4>
                <div class="card-body">
                    <h5 class="card-title">FlatNo : <?php echo $_flatno ?></h5>
                    <p class="card-text">Maintainance Month : <?php echo '' . $month_names[$data['month'] - 1] . ''; ?>/<?php echo $data['year'] ?></p>
                    <p class="card-text">Payable Money : <?php echo $data['m_money'] . ' rs.'; ?></p>
                    <form method="post">
                        <input type="hidden" value="<?php echo $data['m_money'] ?>" name="amt" id="amt" placeholder="Enter your name" /><br /><br />
                        <input type="hidden" value="<?php echo $data['maint_id'] ?>" name="mid" id="mid" placeholder="Enter amt" /><br /><br />
                        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" />
                    </form>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container  mb-4">
            <h2>Your Maintainance Record is Up-to-Date</h2>
        </div>
    <?php
    }
    ?>
</div>

<script>
    function pay_now() {

        var mid = jQuery('#mid').val();
        var amt = jQuery('#mid').val();


        var options = {
            "key": "rzp_test_MsfaaBFUYm5rO5",
            "amount": amt * 100,
            "currency": "INR",
            "name": "Hetvi Heights",
            "description": "Maintainance Collection",
            "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
            "handler": function(response) {
                jQuery.ajax({
                    type: 'post',
                    url: 'payment_process.php',
                    data: "payment_id=" + response.razorpay_payment_id+"&maint_id="+mid,
                    success: function(result) {
                        window.location.href = "maintainancepanel.php";
                    }
                });
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();




    }
</script>