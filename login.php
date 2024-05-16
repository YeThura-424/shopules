<?php 

include("Frontend_Header.php");

 ?>
 <?php 

 include("Frontend_Nav.php");

  ?>
<div class="jumbotron jumbotron-fluid subtitle">
        <div class="container">
            <h1 class="text-center text-white"> Login </h1>
        </div>
    </div>
    <!-- Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <?php 
                if (isset($_SESSION['reg_success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations! 🎉 You have successfully created an account.</strong>
                <hr>
                <p><?=$_SESSION['reg_success'] ?></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
               <?php  } 
               unset($_SESSION['reg_success']); ?>
<?php 
                if (isset($_SESSION['loginfail'])) { ?>
                <div class="alert alert-danger" role="alert">
                <strong>Failde to Login!</strong><hr>
                <p><?=$_SESSION['loginfail'] ?></p>
                </div>
                <?php  } 
               unset($_SESSION['loginfail']); ?>
                <form action="signin.php" method="POST">
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                            <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                        </div>
                        <a class="small" href="#">Forgot Password?</a>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button type="submit" class="btn btn-secondary mainfullbtncolor btn-block">Login</button>
                    </div>
                </form>
                <div class=" mt-3 text-center ">
                    <a href="register.php" class="loginLink text-decoration-none">Need an account? Sign Up!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="container-fluid bg-light p-5 align-content-center align-items-center mt-5">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class="icofont-fast-delivery serviceIcon maincolor"></i>
                    </div>
                    <div class="col-md-8">
                        <h6>Door to Door Delivery</h6>
                        <p class="text-muted" style="font-size: 12px">On-time Delivery</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class="icofont-headphone-alt-2 serviceIcon maincolor"></i>
                    </div>
                    <div class="col-md-8">
                        <h6> Customer Service </h6>
                        <p class="text-muted" style="font-size: 12px"> 09-779-999-915 ၊ <br> 09-779-999-913 </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class='bx bx-undo serviceIcon maincolor'></i>
                    </div>
                    <div class="col-md-8">
                        <h6> 100% satisfaction </h6>
                        <p class="text-muted" style="font-size: 12px"> 3 days return </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-4">
                        <i class="icofont-credit-card serviceIcon maincolor"></i>
                    </div>
                    <div class="col-md-8">
                        <h6> Cash on Delivery </h6>
                        <p class="text-muted" style="font-size: 12px"> Door to Door Service </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1> News Letter </h1>
                <p>
                    Subscribe to our newsletter and get 10% off your first purchase
                </p>
            </div>
            <div class="offset-2 col-8 offset-2 mt-5">
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg px-5 py-3" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" style="border-top-left-radius: 15rem; border-bottom-left-radius: 15rem">
                        <div class="input-group-append">
                            <button class="btn btn-secondary subscribeBtn" type="button" id="button-addon2"> Subscribe </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="whitespace d-xl-block d-lg-block d-md-none d-sm-none d-none"></div>

   <?php 

    include("Frontend_Footer.php");
  ?>