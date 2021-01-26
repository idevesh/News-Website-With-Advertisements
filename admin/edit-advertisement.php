<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    $id = intval($_GET['aid']);
    if (isset($_POST['submit'])) {
        $link = mysqli_real_escape_string($con,$_POST['link']);
        $status = mysqli_real_escape_string($con,$_POST['ACTIVE']);

        $imgfile = $_FILES["adimage"]["name"];

        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));

        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {

            $imgnewfile = md5($imgfile) . $extension;

            move_uploaded_file($_FILES["adimage"]["tmp_name"], "../advertisements/" . $imgnewfile);

            $query = mysqli_query($con, "update ads set image='$imgnewfile',link='$link',status='$status' where id='$id'");
            if ($query) {
                $msg = "Advertisements Image updated ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }
    if (isset($_POST['submit']) && (!isset($_GET['aid']))) {
        $link = mysqli_real_escape_string($con,$_POST['link']);
        $status = mysqli_real_escape_string($con,$_POST['ACTIVE']);

        $imgfile = $_FILES["adimage"]["name"];

        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));

        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {

            $imgnewfile = md5($imgfile) . $extension;

            move_uploaded_file($_FILES["adimage"]["tmp_name"], "../advertisements/" . $imgnewfile);

            $query = mysqli_query($con, "INSERT INTO ads(image,link,status) VALUES('$imgnewfile','$link','$status')");
            if ($query) {
                $msg = "Advertisements Image Added ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
            <meta name="author" content="Coderthemes">

            <link rel="shortcut icon" href="assets/images/favicon.ico">

            <title>Newsportal | Edit Advertisement</title>

            <link href="../plugins/summernote/summernote.css" rel="stylesheet" />


            <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


            <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
            <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
                                        <h4 class="page-title">Add Post </h4>
                                        <ol class="breadcrumb p-0 m-0">
                                            <li>
                                                <a href="#">Admin</a>
                                            </li>
                                            <li>
                                                <a href="#">Pages</a>
                                            </li>
                                            <li class="active">
                                                Advertisements
                                            </li>
                                        </ol>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-sm-6">  
                                    <!---Success Message--->  
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } ?>

                                    <!---Error Message--->
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
                                    <?php } ?>


                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                            <form name="addpost" method="post" enctype="multipart/form-data">


                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Advertisement Image</b></h4>
                                                            <input type="file" class="form-control" id="adimage" name="adimage">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">Link</label>
                                                    <input type="text" class="form-control" id="link" name="link" autocomplete="off" placeholder="Enter link">
                                                </div>

                                                <div class="form-group m-b-20">
                                                    <label for="exampleInputEmail1">Status</label>
                                                    <input type="radio" name="ACTIVE" value="1" />Active
                                                    <input type="radio" name="ACTIVE" value="0"/>Disabled
                                                </div>


                                                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                            </form>
                                        </div>
                                    </div> <!-- end p-20 -->
                                </div> <!-- end col -->
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


        <script src="../plugins/summernote/summernote.min.js"></script>

        <script src="../plugins/select2/js/select2.min.js"></script>

        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


        <script src="../plugins/switchery/switchery.min.js"></script>


        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>
    </html>

<?php } ?>


