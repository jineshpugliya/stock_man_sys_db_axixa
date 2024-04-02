<?php
$con = new mysqli('localhost', 'root', '', 'batch7.30a');
$sql="delete from categories where id=$_GET[id]";
if ($con->query($sql)) {
    $_SESSION['error'] = "Data deleted successfully!";
} else {
    $_SESSION['error'] = "Something went wrong!";
}
header("Location:index.php?module=categories");
$con->close();
?>