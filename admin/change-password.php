<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {

        $old_pass = $_POST['old-password'];
        $old_pass = mysqli_real_escape_string($con, $old_pass);
        $hash_old = MD5($old_pass);
        

        $new_pass = $_POST['password'];
        $old_pass = mysqli_real_escape_string($con, $new_pass);
        $hash_new = MD5($new_pass);

        $new_pass1 = $_POST['password1'];
        $old_pass = mysqli_real_escape_string($con, $new_pass1);
        $hash_new1 = MD5($new_pass1);
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('d-m-Y h:i:s A', time());


        if ($hash_new != $hash_new1) {
            echo "<script>alert('New Passwords do not match.')</script>";
        } else {
            $query = "SELECT * FROM tbladmin WHERE AdminUserName ='" . $_SESSION['login'] . "' || AdminEmailId ='" . $_SESSION['login'] . "'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $row = mysqli_fetch_array($result);
            $orig_pass = $row['AdminPassword'];
           
            if ($hash_old == $orig_pass){
                $query = "UPDATE tbladmin SET AdminPassword = '" . $hash_new . "' WHERE AdminEmailId = '" . $_SESSION['login'] . "' || AdminUserName = '" . $_SESSION['login'] . "'";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo "<script>alert('New Password Updated.')</script>";
                }
                else{
                    echo "<script>alert('Some error occured.')</script>";
                }
            } else {
                echo "<script>alert('Wrong Old password.')</script>";
            }
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>

            <title>Change password | TrueIndia</title>


            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
            <script src="assets/js/modernizr.min.js"></script>



        </head>


        <body class="fixed-left">

            <div id="wrapper">

                <?php include('includes/topheader.php'); ?>

                <?php include('includes/leftsidebar.php'); ?>


                <div class="content-page">

                    <div class="content">
                        <div class="container">


                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Change Password</h4>
                                        <ol class="breadcrumb p-0 m-0">
                                            <li>
                                                <a href="#">Admin</a>
                                            </li>

                                            <li class="active">
                                                Change Password
                                            </li>
                                        </ol>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="m-t-0 header-title"><b>Change Password </b></h4>
                                        <hr />



                                        <div class="row">
                                            <div class="col-sm-6">  

                                                <?php if ($msg) { ?>
                                                    <div class="alert alert-success" role="alert">
                                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                                    </div>
                                                <?php } ?>


                                                <?php if ($error) { ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
                                                <?php } ?>


                                            </div>
                                        </div>





                                        <div class="row">
                                            <div class="col-md-10">
                                                <form class="form-horizontal" name="chngpwd" method="post">

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Current Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control" value="" name="old-password" autocomplete="off" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">New Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control" value="" name="password" autocomplete="off" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Confirm Password</label>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control" value="" name="password1" autocomplete="off" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">&nbsp;</label>
                                                        <div class="col-md-8">

                                                            <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submit">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <?php include('includes/footer.php'); ?>

                </div>
            </div>

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
            <script src="../plugins/switchery/switchery.min.js"></script>

            <script src="assets/js/jquery.core.js"></script>
            <script src="assets/js/jquery.app.js"></script>

        </body>
    </html>
<?php } ?>
