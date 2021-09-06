<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
 } 
 else { header("location:index.php");} 
 
 ?>
<?php 
include 'config.php';

                $useremail = $_SESSION["user"];
 ?>
<?php

$sql = "SELECT updated_at FROM users WHERE email = '$useremail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $lastaccess = $row['updated_at'];
    }
} else {
    echo "0 results";
}
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

<!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#home">Welcome  <?php echo $_SESSION['user']; ?></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#post">Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#blog">blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="settings.php">Settings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

    <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">

  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route">
    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle">
                <?php
$sql = "SELECT COUNT(message)  FROM messages;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

          echo $row['COUNT(message)'];

    }
} else {
}
?></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Messages</h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"></span>
            </div>
            <div class="service-content">
              <h2 class="s-title"><?php echo $lastaccess; ?></h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle">
                <?php
$sql = "SELECT COUNT(comenter_names)  FROM coments;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

          echo $row['COUNT(comenter_names)'];

    }
} else {
}
?></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Comments</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--forms-->



        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!-- forms start-->
  <div class="container">

                <?php
$sql = "SELECT id FROM users WHERE email = '$useremail';
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

         $userid = $row['id'];

    }
} else {
}
?>
    <div class="box-comments" id="post">
      <h2>Add Posts</h2>
  <form class="form-horizontal" role="form" action="upload.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Title:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="title" id="Title" placeholder="Enter Title">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">body:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Slug">Slug:</label>
    <div class="col-sm-10">
      <input type="text" name="slug" class="form-control" id="Slug" placeholder="Enter Slug">
      <input type="hidden" name="userid" value="<?php echo $userid ; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-10">
      <input type="file" class="form-control-file" id="pwd" name="fileToUpload" id="fileToUpload">
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
  <!--/ tables starts /-->
  <div class="container" id="blog">
    <div class="box-shadow-full">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Post title</th>
        <th>Comments</th>
        <th>Time</th>
        <th>Commented by</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>


          <?php $sql = "SELECT  posts.title, coments.coment_field, coments.comented_at, coments.comenter_names, coments.coment_id FROM posts JOIN coments ON posts.id=coments.post_id ORDER BY coments.coment_id desc";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {?>
      <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['coment_field']; ?></td>
        <td><?php echo $row['comented_at']; ?></td>
        <td><?php echo $row['comenter_names']; ?></td>
        <td class="socials">
                  <a href="deletecomment.php?coment_id=<?php echo $row['coment_id']?>"><span class="ico-circle"><i class="ion-android-delete"></i></span></a>
         </td>
      </tr>

           <?php }
        }?> 
    </tbody>
  </table>
  </div>

    </div>
  </div>
  <!--/ tables starts /-->
  <div class="container" id="blog">
    <div class="box-shadow-full">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            <div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Post title</th>
        <th>Posted By</th>
        <th>post_views</th>
        <th>Time</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>


          <?php $sql = "SELECT posts.post_views, posts.image, posts.title, users.username, posts.id, posts.slug, posts.created_at FROM posts JOIN users ON posts.user_id=users.id ORDER BY posts.id desc ";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $userid = $row['id'];?>
      <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['post_views']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td class="socials">
                  <a href="updatepost.php?postid=<?php echo $row['id']?>"><span class="ico-circle"><i class="ion-social-codepen-outline"></i></span></a>
         </td>
        <td class="socials">
                  <a href="deletepost.php?postid=<?php echo $row['id']?>"><span class="ico-circle"><i class="ion-android-delete"></i></span></a>
         </td>
      </tr>

           <?php }
        }?> 
    </tbody>
  </table>
  </div>

    </div>
  </div>

  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>GATSATA ASSEMBLIES OF GOD</strong>. All Rights Reserved</p>
              <div class="credits"><a href="logout.php">Log out</a><br>
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
</html>