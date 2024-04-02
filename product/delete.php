<?php
$ids = implode(',', $_POST['delid']);
if ($ddb->delete($ids)) {
    $_SESSION['error'] = "Data deleted successfully!";
} else {
    $_SESSION['error'] = "Something went wrong!";
}
header("Location:index.php?module=subcategories");
$con->close();
