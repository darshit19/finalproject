<?php
include "./navbar.php";
?>
<section class="vh-100 ">
    <div class="container-fluid h-custom">
        <p class="h1 container" style="padding: 3vw;">Welcome To , Committee's Log in !</p>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./img/loginpageimg.webp" height="400px" width="400px" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="./approvecomlogin.php">

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid Committee Code" />
                        <label class="form-label" for="form3Example3">Committee Code</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="mobile" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>
                    <div class="form-outline mb-3">
                        <label class="form-label" for="form3Example3">Select your Role : </label>
                        <input type="radio" name="role" value="1" id="sec" required>Secretary &nbsp;
                        <input type="radio" name="role" value="2" id="tres">Treasure
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
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