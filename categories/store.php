<?php
//               HOSTNAME    USERNAME PASSWORD DBNAME
$con = new mysqli('localhost', 'root', '', 'batch7.30a');
// $con->select_db('batch7.30a');//if connection not mantion db name
$err = 1;
if (!trim($_POST['name'])) {
    $err = 0;
    $_SESSION['errorname'] = "Enter valid error name!";
}
$_POST = array_map('addslashes', $_POST);
$sql = "insert into categories set name='$_POST[name]',description='" . $_POST['description'] . "',cstatus='$_POST[cstatus]'";

if ($err) {
    try{
       $con->query($sql);
    }catch(Error $e){
        $_SESSION['error'] = "Something went wrong!";
        header("Location:index.php?module=categories&do=create");     
    }
    $_SESSION['success'] = "Data saved successfully!";

    header("Location:index.php?module=categories");
} else {
    $_SESSION['error'] = "Something went wrong!";
    header("Location:index.php?module=categories&do=create");
}
$con->close();

// $con = mysqli_connect('localhost', 'root', '', 'batch7.30a');
// // mysqli_select_db($con,'batch7.30a');//if connection not mantion db name
// mysqli_query($con,"insert into categories set name='Crockery',description='nahi he'");
// $mysqli_close($con);
