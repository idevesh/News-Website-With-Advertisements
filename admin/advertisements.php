<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
            <meta name="author" content="Coderthemes">

            <link rel="shortcut icon" href="assets/images/favicon.ico">

            <title>Newsportal | Add Post</title>

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
                    <!-- Start content -->

                    <div class="content">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="page-title-box">
                                        <div class="m-b-30">
                                            <a href="edit-advertisement.php">
                                                <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline" ></i></button>
                                            </a>
                                        </div>
                                        <h4 class="page-title">Update Image </h4>
                                        <ol class="breadcrumb p-0 m-0">
                                            <li>
                                                <a href="#">Admin</a>
                                            </li>
                                            <li>
                                                <a href="#"> Pages </a>
                                            </li>

                                            <li class="active">
                                                Advertisements
                                            </li>
                                        </ol>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>


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
                                <div class="col-sm-12">
                                    <div class="card-box">


                                        <div class="table-responsive">
                                            <table class="table table-colored table-centered table-inverse m-0">
                                                <thead>
                                                    <tr>

                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Edit</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($con, "SELECT * FROM ads");
                                                    $rowcount = mysqli_num_rows($query);
                                                    if ($rowcount == 0) {
                                                        ?>
                                                        <tr>
                                                            <td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
                                                        <tr>
                                                            <?php
                                                        } else {
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                 
                                                                    ?>
                                                                <tr>
                                                                    <td><img src="../advertisements/<?php echo htmlentities($row['image']); ?>" width="200" height=""/></td>
                                                                    <td><?php 
                                                                    if ($row['status'] == 1)
                                                                    {
                                                                        echo "Active";
                                                                    }
                                                                    else{
                                                                        echo "Not Active";
                                                                    }
                                                                    ?></td>
                                                                    <td><a href="edit-advertisement.php?aid=<?php echo htmlentities($row['id']); ?>"><i class="fa fa-pencil" style="color: #29b6f6;"></i></a></td>


                                                                </tr>
                                                                <?php
                                                        
                                                    }
                                                        }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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


