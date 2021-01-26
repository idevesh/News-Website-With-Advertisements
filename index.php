<?php
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Our News is India’s Leading Hindi News digitalpaper on Politics, Business, Bollywood, Cricket, Education, Sports and more at times from India, हिन्दी ताजा खबरें around the World." />
        <meta name="description" content="Our News is India’s Leading हिन्दी न्यूज़ Paper on Politics, Business, Bollywood, Cricket, Education, Sports and more at times from India, ताजा खबरें, न्यूज़ इन हिन्दी, around the World. " />
        <meta name="keywords" content="Hindi News, News in Hindi, Breaking News, Latest Hindi News, Latest News in Hindi, Hindustan Times,  हिन्दी समाचार,  हिन्दी न्यूज़, समाचार, ताजा खबरें" />
        <meta name="news_keywords" content="Hindi News Paper, Breaking News in Hindi, hindinews, Today News, हिन्दी समाचार, हिन्दी न्यूज़, न्यूज़ इन हिन्दी, हिन्दुस्तान, hindustan times Hindi hindi" />
        <meta name="robots" content="NOYDIR, NOODP" /><meta name="language" content="hindi" />
        <meta property="og:image" content="https://trueindia.co.in/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
        <title>TrueIndia : India's largest news hub </title>    
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
        <link href="css/modern-business.css" rel="stylesheet">
         </head>
    <body>
        <?php include('includes/header.php'); ?>
        <div class="container">     
        
            <div class="row" style="margin-top: 4%">
                <div class="col-md-8">
                    <?php
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;


                    $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);


                    $query = mysqli_query($con, "select tblposts.id as pid,"
                            . "tblposts.PostTitle as posttitle,"
                            . "tblposts.PostImage,"
                            . "tblcategory.CategoryName as category,"
                            . "tblcategory.id as cid,"
                            . "tblsubcategory.Subcategory as subcategory,"
                            . "tblposts.PostDetails as postdetails,"
                            . "tblposts.PostingDate as postingdate,"
                            . "tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page") or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($query)) {
                        ?>

                        <div class="card mb-4">
                            <img class="card-img-top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h2>
                                <p><b>Category : </b> <a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a></p>

                                <a href="news-details.php?title=<?php echo htmlentities($row['url'])?>&nid=<?php echo htmlentities($row['pid']) ?>" class="btn btn-primary">Read More →</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on <?php echo htmlentities($row['postingdate']);
                                                ?>
                            </div>
                        </div>
                    <?php } ?>
<!-- top -->

                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
                        <li class="<?php if ($pageno <= 1) {
                        echo 'disabled';
                    } ?> page-item">
                            <a href="<?php if ($pageno <= 1) {
                        echo '#';
                    } else {
                        echo "?pageno=" . ($pageno - 1);
                    } ?>" class="page-link">Prev</a>
                        </li>
                        <li class="<?php if ($pageno >= $total_pages) {
                        echo 'disabled';
                    } ?> page-item">
                            <a href="<?php if ($pageno >= $total_pages) {
                        echo '#';
                    } else {
                        echo "?pageno=" . ($pageno + 1);
                    } ?> " class="page-link">Next</a>
                        </li>
                        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                    </ul>

                </div><div style="display: none;">
</div>

<?php include('includes/sidebar.php'); ?>
            </div>

        </div>
<?php include('includes/footer.php'); ?>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            var onloadCallback = function () {
                grecaptcha.execute();
            };

            function setResponse(response) {
                document.getElementById('captcha-response').value = response;
            }
        </script>
    </head>
</body>

</html>  
