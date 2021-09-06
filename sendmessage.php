  <?php 
  include 'config.php';
//value from form in blog.php
$names=$_POST['names'];
$email=$_POST['email'];
$message=$_POST['message'];


$sql="INSERT INTO messages values (NULL,'$names','$email','$message',current_timestamp())";//queryto 

if ($conn->query($sql) === TRUE) {
    echo "<script type = \"text/javascript\">alert(\"Message Successfully sent\");window.location = (\"index.php\")</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
 ?>
