<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Log In Aplikasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>
<style>
.authentication-bg {
    background-color: rgb(248, 198, 193);
}
</style>
    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="assets/images/logo-dark.png" alt="" height="55" class="logo logo-dark">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                <?php 
								  if (empty($_GET['alert'])) {
									echo "";
								  } 
								  elseif ($_GET['alert'] == 1) {
									echo "<div class='alert alert-danger alert-dismissable'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<h4>  <i class='icon fa fa-times-circle'></i> Gagal Login!</h4>
											Username atau Password salah, cek kembali Username dan Password Anda.
										  </div>";
								  }
								  elseif ($_GET['alert'] == 2) {
									echo "<div class='alert alert-success alert-dismissable'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
											Anda telah berhasil logout.
										  </div>";
								  }
								  ?>
                                </div>
                                <div class="p-2 mt-4">
                                <form class="form-signin" action="login-check.php" method="POST">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
                                        </div>
                
                                        <div class="form-group">
                                           
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Masukan Password">
                                        </div>
                
                                        <div class="mt-3 text-right">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit" name="login">Log In</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <script src="assets/js/app.js"></script>
</html>
