
<?php

include 'config.php';

          $coment_id = (int)$_GET['coment_id'];

// sql to delete a record
$sql = "DELETE FROM coments WHERE coment_id=$coment_id";

if ($conn->query($sql) === TRUE) {
    echo "<script type = \"text/javascript\">alert(\"comment Successfully deleted\");window.location = (\"dashboard.php\")</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>