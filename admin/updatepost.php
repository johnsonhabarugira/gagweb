<!DOCTYPE html>
<?php include 'config.php' ?>
<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
 } 
 else { header("location:index.php");} 
 
 ?>

<html>
<head>
    <meta charset="utf-8">
    <title>GAG</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style-green.css" rel="stylesheet">

  <!-- =======================================================
  ======================================================= -->
</head>
<body>



  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Blog Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Update</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

<div class="container">
  <div class="box-shadow-full">
    

          <?php 

          $id_article = (int)$_GET['postid'];
           $sql = "SELECT * from posts where posts.id=$id_article";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $userid = $row['id'];?>
        <?php $title = $row['title']; ?>
        <?php $picture = $row['image']; ?>
        <?php $slug = $row['slug']; ?>
        <?php $body = $row['body']; ?>

           <?php }
        }?> 

  <div class="container">

    <div class="box-comments" id="post">
      <h2>Update Post</h2>
  <form class="form-horizontal" role="form" action="#" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Title:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $title; ?>" name="title" id="Title" placeholder="Enter Title">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">body:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo $body; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Slug">Slug:</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $slug; ?>" name="slug" class="form-control" id="Slug" placeholder="Enter Slug">
      <input type="hidden" name="userid" value="<?php echo $userid ; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="#" class="btn btn-success">Submit</button>
    </div>
  </div>
</form>
</div>
</div>

  </div>
</div>


  <!--/ Section Blog-Single End /-->

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>GATSATA ASSEMBLIES OF GOD</strong>. All Rights Reserved</p>
              <div class="credits">
                Designed by <a href="#">ME</a><br><a href="logout.php">Log out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  
  <a href="#" class="back-to-top"><i class="fa fa-chevron-down"></i></a>
  <div id="preloader"></div>

</body>
 <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <?php 
  if ($_SERVER["REQUEST_METHOD"] == "POST"){

$userid=$_POST['userid'];
$post_titlee=$_POST['title'];
$slugg=$_POST['slug'];
$bodyy=$_POST['body'];

$sql="UPDATE posts SET title = '$post_titlee', slug = '$slugg', body = '$bodyy', updated_at = current_timestamp() WHERE id = $userid;";//queryto

if ($conn->query($sql) === TRUE) {
  echo "<script type = \"text/javascript\">alert(\"Post Successfully deleted\");window.location = (\"dashboard.php\")</script>";
} else {
    echo "Error updating record: " . $conn->error;
}
}
  ?>
</html>