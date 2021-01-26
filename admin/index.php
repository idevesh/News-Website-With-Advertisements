<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) != 0) {
    header('location:dashboard.php');
} else {
    ?>
    <?php
    if (isset($_POST['login'])) {
                $uname = $_POST['username'];
                $uname = mysqli_real_escape_string($con, $uname);
                $password = $_POST['password'];
                $password = mysqli_real_escape_string($con, $password);
                $password = md5($password);

                $sql = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='" . $uname . "' || AdminEmailId='" . $uname . "')");
                $num = mysqli_fetch_array($sql);
                if ($num > 0) {
                    $sqli = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='" . $uname . "' || AdminEmailId='" . $uname . "' && AdminPassword='" . $password . "')");
                    $result = mysqli_fetch_array($sqli);
                    if ($result['AdminPassword'] == $password) {
                        $_SESSION['login'] = $_POST['username'];
                        echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
                    } else {
                        echo "<script>alert('Wrong Password');</script>";
                    }
                } else {
                    echo "<script>alert('User not registered with us');</script>";
                }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">



            <title>Admin Panel | TrueIndia</title>


            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

            <script src="assets/js/modernizr.min.js"></script>
        


        </head>


        <body class="bg-transparent">


            <section>
                <div class="container-alt">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="wrapper-page">

                                <div class="m-t-40 account-pages">
                                    <div class="text-center account-logo-box">
                                        <h2 class="text-uppercase">
                                            <a href="index.php" class="text-success">
                                                <span><img src="assets/images/logo.png" alt="" height="70"></span>
                                            </a>
                                        </h2>

                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" method="post">

                                            <div class="form-group ">
                                                <div class="col-xs-12">
                                                    <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                                </div>
                                            </div>
                                            

                                            <div class="form-group account-btn text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Log In</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>

                                    </div>
                                </div><br><br>
                                <div class="col-xs-12">
                                    <center> <p>Forgot password? <a href="forgotpassadmin.php">Reset</a></p></center>
                                    <center> <p>Go back to <a href="../">trueindia.co.in</a></p></center>

                                </div>





                            </div>


                        </div>
                    </div>
                </div>
            </section>


            <script>
                var resizefunc = [];
            </script>

            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/detect.js"></script>
            <script src="assets/js/fastclick.js"></script>
            <script src="assets/js/jquery.blockUI.js"></script>
            <script src="assets/js/waves.js"></script>
            <script src="assets/js/jquery.slimscroll.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>


            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>
             

            <?php
            include 'includes/footer.php';
            ?>

        </body>
    </html>
    <?php
}
?>