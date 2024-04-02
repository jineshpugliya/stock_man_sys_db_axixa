<?php
$con = new mysqli('localhost', 'root', '', 'batch5_30_24');
$sql = "SELECT category.id as cid,product.id as pid from category join product on category.id=category_id";
print_r($con->query($sql)->fetch_all(1));
