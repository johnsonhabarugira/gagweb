<?php


$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { include 'config.php';
//value from form

$userid=$_POST['userid'];
$post_title=$_POST['title'];
$slug=$_POST['slug'];
$body=$_POST['body'];
$imagename = basename( $_FILES["fileToUpload"]["name"]);
$new_data = str_replace("'", "", $imagename);
$new_data = preg_replace('(\s)','_', $new_data);

$sql="INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `post_views`, `image`, `body`, `published`, `created_at`, `updated_at`) VALUES (NULL, '$userid', '$post_title', '$slug', '0', '$new_data', '$body', '', current_timestamp(), current_timestamp());";//queryto


if ($conn->query($sql) === TRUE) {
    echo "<script type = \"text/javascript\">alert(\"Post Successfully Uploaded\");window.location = (\"dashboard.php\")</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


 

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}//$path= $target_dir.basename( $_FILES["fileToUpload"]["name"]);
//echo "<br>".$path;

?>