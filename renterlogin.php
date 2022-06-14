<?php
include "./navbar.php";
?>
<?php
$sql = "select b_id from buildingtb";
include 'connection.php';
$response = mysqli_query($con, $sql);

?>
<head>
    <link rel="stylesheet" href="./css/span.css">
</head>
<section class="vh-100 ">
    <div class="container-fluid h-custom">
        <p class="h1 container" style="padding: 3vw;">Welcome To , Renter's Log in !</p>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./img/loginpageimg.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="./owner/rentlogin.php">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input name="email" type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid renter email" required />
                        <label class="form-label" for="form3Example3">Renter Mail</label>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="building" id="building" aria-label="Default select example" required>
                            <option value="dummy" selected>Select Building</option>
                            <?php
                            while ($data = mysqli_fetch_assoc($response)) {
                            ?>
                                <option value="<?php echo $data['b_id'] ?>"><?php echo $data['b_id'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="exampleFormControlInput1" class="form-label">Building </label><span id="lbbuild"></span>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input name="mobile" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" required />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-danger">Register</a></p> -->
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>
<?php
include "./footer.php";
?>