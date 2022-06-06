<?php
include "./navbar.php";
?>
<section class="vh-100 ">
    <div class="container-fluid h-custom">
    <p class="h1 container" style="padding: 3vw;">Welcome To , Admin's Log in !</p>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="./img/loginpageimg.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="./admin/ad_login.php">
                    
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="ad_email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" required/>
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="ad_password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" required/>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" name="login" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
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