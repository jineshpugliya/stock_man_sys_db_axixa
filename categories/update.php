<?php
//               HOSTNAME    USERNAME PASSWORD DBNAME
$con = new mysqli('localhost', 'root', '', 'batch7.30a');
// $con->select_db('batch7.30a');//if connection not mantion db name
$err = 1;
if (!trim($_POST['name'])) {
    $err = 0;
    $_SESSION['errorname'] = "Enter valid name!";
}
$_POST = array_map('addslashes', $_POST);
$sql = "update categories set name='$_POST[name]',description='" . $_POST['description'] . "',cstatus='$_POST[cstatus]' where id=$_GET[id]";

if ($err && $con->query($sql)) {
    $_SESSION['success'] = "Data updated successfully!";

    header("Location:index.php?module=categories");
} else {
    $_SESSION['error'] = "Something went wrong!";
    header("Location:index.php?module=categories&do=update&id=$_GET[id]");
}
$con->close();
?>
