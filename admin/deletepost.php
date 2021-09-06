
<?php

include 'config.php';

          $id_article = (int)$_GET['postid'];

// sql to delete a record
$sql = "DELETE FROM posts WHERE id=$id_article";

if ($conn->query($sql) === TRUE) {
    echo "<script type = \"text/javascript\">alert(\"Post Successfully deleted\");window.location = (\"dashboard.php\")</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>