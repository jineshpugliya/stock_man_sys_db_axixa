<?php 
$err=1;
if(!trim($_POST['name'])){
    $err=0;
    $_SESSION['errorname'] = "Enter valid error name!";
}
$id="";
$path= "index.php?module=subcategories&do=create";
$msg= "Data saved successfully!";
if(isset($_GET['id'])){
    $id= $_GET['id'] ;
    $path = "index.php?module=subcategories&do=update&id=$id";
    $msg = "Data updated successfully!";
}
if($err && $ddb->save($_POST,$id)){
    $_SESSION['success'] = $msg;

    header("Location:index.php?module=subcategories");
}else{
    $_SESSION['error']="Something went wrong!";
    header("Location:$path");

}

?>