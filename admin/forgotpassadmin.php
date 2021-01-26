<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) != 0) {
    header('location:dashboard.php');
} else {
    ?>

    <?php
    if (isset($_POST['login']) & !empty($_POST)) {
      
                date_default_timezone_set('Asia/Kolkata');
                $exptime = date("d-m-Y h:i:s A",strtotime(date("d-m-Y h:i:s A")." +10 minutes"));
                $curtime = date("d-m-Y h:i:s A",strtotime(date("d-m-Y h:i:s A")));
                $email = $_POST['email'];
                $email = mysqli_real_escape_string($con,$email);
                $sql = "SELECT AdminEmailId FROM tbladmin WHERE AdminEmailId = '" . $email . "'";
                $query = mysqli_query($con, $sql);

                if (mysqli_num_rows($query) != 0) {
                    $random = random_int(1, 99999999);
                    $getkey = md5($random);

                    $sql = "INSERT INTO forgot(getkey,email,exp_time,curr_time) VALUES('$getkey','$email','$exptime','$curtime')";
                    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
                    if ($query == TRUE) {
                        if(mail($email, "Password Reset Link for $email","You have requested for password reset here is your link"
                                . "don't share this with anyone.   https://trueindia.co.in/admin/forgotpassadminscript.php?getkey=$getkey&email=$email   "
                                . "If you didn't make this request inform us at devesh@trueindia.co.in", "From: bot@trueindia.co.in") == TRUE){
                                echo "<script>alert('Password reset link sent successfully')</script>";
                                }
                                else{
                                    echo "<script>alert('Some error occured')</script>";
                                }
                    } else {
                        echo "<script>alert('Sorry some error occured link not generated')</script>";
                    }
                } else {
                    echo "<script>alert('Sorry email not found')</script>";
                }
            
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">



            <title>Forgot password | TrueIndia</title>


            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

            <script src="assets/js/modernizr.min.js"></script>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <script>
                var onloadCallback = function () {
                    grecaptcha.execute();
                };

                function setResponse(response) {
                    document.getElementById('captcha-response').value = response;
                }
            </script>


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
                                                <span style="color: white;"><p alt="" height="70">Forgot Password</p></span>
                                            </a>
                                        </h2>

                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" method="post">

                                            <div class="form-group ">
                                                <div class="col-xs-12">
                                                    <input class="form-control" type="text" required="" name="email" placeholder="Email" autocomplete="off">
                                                </div>
                                            </div>

                                                                 <div class="form-group account-btn text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="login">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="clearfix"></div>

                                    </div>
                                </div><br><br>
                                <div class="col-xs-12">
                                    <center> <p>Go back to login <a href="forgotpassadmin.php">panel</a></p></center>
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
