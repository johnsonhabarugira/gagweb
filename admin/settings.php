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
          <h2 class="intro-title mb-4">Users Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Users settings</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

<div class="container">
  <div class="box-shadow-full">
    


  
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>User name</th>
          <th>Password</th>
          <th>Email</th>
          <th>Created at</th>
          <th>Updsted at</th>
          <th>Delete</th>
          <th>Update</th>
        </tr>
      </thead>
      <tbody>

          <?php 

           $sql = "SELECT * from users";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $userid = $row['id'];?>
        <tr>
          <td>
        <?php echo $title = $row['username']; ?></td>
          <td>
        <?php echo $picture = $row['password']; ?></td>
          <td>
        <?php echo $slug = $row['email']; ?></td>
          <td>
        <?php echo $time = $row['created_at']; ?></td>
          <td>
        <?php echo $updatt = $row['updated_at']; ?></td>
        <td class="socials">
                  <a href="deleteuser.php?userid=<?php echo $row['id']?>"><span class="ico-circle"><i class="ion-android-delete"></i></span></a>
         </td>
        <td class="socials">
                  <a href="updateuser.php?userid=<?php echo $row['id']?>"><span class="ico-circle"><i class="ion-social-codepen-outline"></i></span></a>
         </td>
        </tr>


           <?php }
        }?> 
      </tbody>
    </table>
  </div>
</div>


  </div>
</div>

  <div class="container">

    <div class="box-comments" id="post">
      <h2>Add User</h2>
  <form class="form-horizontal" role="form" action="#" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"" name="username" id="Title" placeholder="Enter Both names">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"" name="email" id="Title" placeholder="Enter Email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"" name="pass" id="Title" placeholder="Enter Password">
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

$username=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['pass'];

$sql="INSERT INTO users VALUES ('','$username','$email','','$pass',current_timestamp(),'NULL')";//queryto

if ($conn->query($sql) === TRUE) {
  echo "<script type = \"text/javascript\">alert(\"Post Successfully deleted\");window.location = (\"settings.php\")</script>";
} else {
    echo "Error updating record: " . $conn->error;
}
}
  ?>
</html>