<?php

$err = 1;
if (!trim($_POST['name'])) {
    $err = 0;
    $_SESSION['errorname'] = "Enter valid name!";
}
$_POST = array_map('addslashes', $_POST);
$sql = "update categories set name='$_POST[name]',description='" . $_POST['description'] . "',cstatus='$_POST[cstatus]' where id=$_GET[id]";

if ($err && $con->query($sql)) {
    $_SESSION['success'] = "Data updated successfully!";

    header("Location:index.php");
} else {
    $_SESSION['error'] = "Something went wrong!";
    header("Location:update.php?id=$_GET[id]");
}
$con->close();
?>
