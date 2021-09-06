<!DOCTYPE html>
<?php include 'config.php' ?>
<?php 

          $id_article = (int)$_GET['postid'];
$sql = "UPDATE posts SET post_views = post_views + 1 WHERE id = '$id_article'";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error updating record: " . $conn->error;
}
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
  <link href="css/style-orange.css" rel="stylesheet">

  <!-- =======================================================
  ======================================================= -->
</head>
<body>

                <?php
$sql = "SELECT post_views  FROM posts
WHERE id=$id_article;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

         $views = $row['post_views'];

    }
} else {
}
?>
                <?php
$sql = "SELECT COUNT(comenter_names)  FROM coments
WHERE post_id=$id_article;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

          $comentscount = $row['COUNT(comenter_names)'];

    }
} else {
}
?>


  <!--/ Intro Skew Star /-->
  <div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Blog Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

  <!--/ Section Blog-Single Star /-->




  <section class="blog-wrapper sect-pt4" id="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8">


          <?php

$sqll = "SELECT COUNT(comenter_names)  FROM coments
WHERE post_id=$id_article;
";
           $sql = "SELECT posts.image, posts.id, posts.title, users.username, posts.body, posts.slug, posts.created_at FROM posts JOIN users ON posts.user_id=users.id where posts.id=$id_article";
         $result = $conn->query($sql) and $conn->query($sqll);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {


              ?>

          <div class="post-box">
            <div class="post-thumb">
              <img src="uploads/<?php echo $row['image'] ?>" class="img-fluid" alt="">
            </div>

            <h6> <?php $idd=$row['id'];?></h6>
            <div class="post-meta">
              <h1 class="article-title"><?php echo $row['title'] ?></h1>
              <ul>
                <li>
                  <span class="ion-ios-person"></span>
                  <a href="#"><?php echo $row['username'] ?></a>
                </li>
                <li>
                  <span class="ion-eye"></span>
                  <a href="#"><?php  echo $views; ?></a>
                </li>
                <li>
                  <span class="ion-chatbox"></span>
                  <a href="#comments"><?php echo $comentscount ?></a>
                </li>
              </ul>
            </div>
            <div class="article-content">
              <p><?php echo $row['body'] ?>
                  </p>

                  <br>
            </div>
          </div>

           <?php }
        }?> 
          <div class="box-comments">
            <div class="title-box-2">
              <h4 class="title-comments title-left">Comments 



                <?php

$sql = "SELECT COUNT(comenter_names)  FROM coments
WHERE post_id=$id_article;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['COUNT(comenter_names)'];
    }
} else {
}
?>


              </h4>
            </div>
            <ul class="list-comments">
          <?php $sql = "SELECT * from coments where post_id=$id_article";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {


              ?>

              <li>
                <div class="comment-details">
                  <h4 class="comment-author"><?php echo $row['comenter_names'] ?></h4>
                  <span><?php echo $row['comented_at'] ?></span>
                  <p>
                   <?php echo $row['coment_field'] ?>
                  </p>
                  <a href="3">Reply</a>
                </div>
              </li>

           <?php }
        }?> 

            </ul>
          </div>
          <div class="form-comments" id="comments">
            <div class="title-box-2">
              <h3 class="title-left">
                Leave a Reply
              </h3>
            </div>
            <!-- COMENTS FORM -->
            <form class="form-mf" method="POST" action="commenter.php">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="text" name="comenter_names" class="form-control input-mf" id="inputName" placeholder="Name *" required><input type="hidden" name="post_id" value="<?php echo $idd;?>">
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <input type="email" name="comenter_email" class="form-control input-mf" id="inputEmail1" placeholder="Email *" required>
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <div class="form-group">
                    <textarea id="textMessage" class="form-control input-mf" placeholder="Comment *" name="coment_fiel"
                      cols="45" rows="8" required></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="button button-a button-big button-rouded">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Recent Post</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">

          <?php $sql = "SELECT  posts.id, posts.title FROM posts JOIN users ON posts.user_id=users.id ORDER BY posts.id desc LIMIT 5 ";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {?>
                <li>
                  <a href="blog.php?postid=<?php echo $row['id']?>"><?php echo $row['title'] ?></a>
                </li>

           <?php }
        }?>
              </ul>
            </div>
          </div>
          <div class="widget-sidebar">
            <h5 class="sidebar-title">Archives</h5>
            <div class="sidebar-content">
              <ul class="list-sidebar">

          <?php $sql = "SELECT  posts.id, posts.title, posts.created_at FROM posts JOIN users ON posts.user_id=users.id ORDER BY RAND() LIMIT 5";
         $result = $conn->query($sql);
         if ($result->num_rows >0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {?>

                <li>
                  <a href="blog.php?postid=<?php echo $row['id']?>"><?php echo $row['title'].'<br><span>'.$row['created_at'].'</span>' ?></a>
                </li>

           <?php }
        }?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



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
                Designed by <a href="#">ME</a><br><a href="admin/index.php">Log in</a>
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
</html>