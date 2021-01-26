<?php
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

    <title>About us | TrueIndia</title>

 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

   
    <?php include('includes/header.php');?>
   
    <div class="container">

<?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
      <h1 class="mt-4 mb-3"><?php echo htmlentities($row['PageTitle'])?>
  
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <div class="row">

        <div class="col-lg-12">

          <p><?php echo $row['Description'];?></p>
        </div>
      </div>
   
<?php } ?>
        <h2>Our Team</h2>

      <div class="row">
        <div class="col-lg-5 mb-4">
          <div class="card h-100 text-center">
            <img class="card-img-top" src="http://placehold.it/750x450" alt="">
            <div class="card-body">
              <h4 class="card-title">Kavita</h4>
              <h6 class="card-subtitle mb-2 text-muted">CEO & Founder</h6>
              <p class="card-text">Our industry does not respect tradition - it only respects innovation</p>
            </div>
            <div class="card-footer">
              <a href="mailto:kavita@trueindia.co.in">kavita@trueindia.co.in</a>
            </div>
          </div>
        </div>
        <div class="col-lg-5 mb-4">
          <div class="card h-100 text-center">
              <img class="card-img-top" src="images/profile1.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title">Devesh Pratap Singh</h4>
              <h6 class="card-subtitle mb-2 text-muted">Web developer</h6>
              <p class="card-text">A designer knows he has achieved perfection not when there is nothing left to add, but when there is nothing left to take away.</p>
            </div>
            <div class="card-footer">
              <a href="mailto:devesh@trueindia.co.in">devesh@trueindia.co.in</a>
            </div>
          </div>
        </div>
       
      </div>
    
    </div>
    
 <?php include('includes/footer.php');?>

   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  <img src="../newsportal/images/logo.png" alt=""/>

</html>