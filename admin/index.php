<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:dashboard.php");  
 }  
 
 ?>
<?php 
include 'config.php';
 ?>
<!DOCTYPE html>
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
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="box-shadow-full">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Admin log in
                    </h5>
                  </div>
            
                      <form action="" method="POST" role="form" class="contactForm" action="#">
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" name="email" class="form-control" id="name" placeholder="Admin email" data-rule="minlen:4" data-msg="Please enter your email" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="email" placeholder="Password"  data-msg="Please enter your password" />
                            <div class="validation"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="button button-a button-big button-rouded">Log in</button>
                        </div>
                      </div>
                    </form>
        </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>GATSATA ASSEMBLIES OF GOD</strong>. All Rights Reserved</p>
              <div class="credits"><a href="#">Log in</a><br>
                Designed by <a href="#">ME</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->



</body>
 <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
   <?php 
 $con=mysqli_connect('localhost','root','','gagblogdb')or die(mysql_error());
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      $myusername = mysqli_real_escape_string($con,$_POST['email']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']);
  $sql="SELECT id FROM users WHERE email='$myusername' and password='$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      $id = $row['id'];
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;


$sql = "UPDATE users SET updated_at = current_timestamp() WHERE email = '$myusername'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}


         
         header("location: dashboard.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
  }
 }

  ?>
</html>