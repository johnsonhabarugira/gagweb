
<?php

include 'config.php';

          $userid = (int)$_GET['userid'];

// sql to delete a record
$sql = "DELETE FROM users WHERE id=$userid";

if ($conn->query($sql) === TRUE) {
    echo "<script type = \"text/javascript\">alert(\"User Successfully deleted\");window.location = (\"settings.php\")</script>";
} else {
    echo "<script type = \"text/javascript\">alert(\"You can not delete Parent user\");window.location = (\"settings.php\")</script>";
}

$conn->close();
?>