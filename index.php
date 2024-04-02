<?php
session_start();
include_once "Db.php";
$module = $_GET['module'] ?? 'subcategories';
$do = $_GET['do'] ?? 'index';
$ddb = new Db($module);
include_once "helper.php";
$path = "$module/$do.php";
if (file_exists($path)) {
    include_once "header.php";
    include_once $path;
    include_once "footer.php";
}
