  <?php 
  include 'config.php';
//value from form in blog.php
$post_id=$_POST['post_id'];
$comenter=$_POST['comenter_names'];
$comenter_email=$_POST['comenter_email'];
$coment_fiel=$_POST['coment_fiel'];


$sql="INSERT INTO coments (`coment_id`, `post_id`, `comenter_names`, `comenter_email`, `comented_at`, `coment_field`) values(NULL,'$post_id','$comenter','$comenter_email',current_timestamp(),'$coment_fiel')";//queryto 

if ($conn->query($sql) === TRUE) {
    echo "<script type = \"text/javascript\">alert(\"Post Successfully Uploaded\");window.location = (\"blog.php?postid=$post_id\")</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 ?>
