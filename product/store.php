
<?php
$productinfo = [
    'product_name' => $_POST['product_name'],
    'product_price' => $_POST['product_price'],
    'product_discount' => $_POST['product_discount'],
    'product_description' => $_POST['product_description']
];
$s=0;
$product_id = $ddb->save($productinfo);
if ($product_id) {
    $scddb = new Db('product_subcategories');
    foreach ($_POST['subcats'] as $catid) {
        $pcinfo = [
            'product_id' => $product_id,
            'subcategories_id' => $catid
        ];
        $scddb->save($pcinfo);
    }
    $mdb = new Db('media');
    $pmdb = new Db('product_media');

    if ($_FILES['image']['error'] == 0) {
        $from = $_FILES['image']['tmp_name'];
        $to = "public/images/" . time() . "_" . $_FILES['image']['name'];
         $type = substr($_FILES['image']['type'], 0, strpos($_FILES['image']['type'], '/'));
        if ($type == 'image' && $_FILES['image']['size'] <= 5242880 &&  move_uploaded_file($from, $to)) {
            $fdata = [
                'title' => 'product',
                'path' => $to,
                'type' => $type,
                'main' => 'yes'
            ];
            $mid = $mdb->save($fdata);
            $pmdb->save(['product_id' => $product_id, 'media_id' => $mid]);
        }
    }

$count = count($_FILES['oimage']['name']);
if (!($count == 1 && $_FILES['oimage']['error'][0] != 0)) {
    for ($i = 0; $i < $count; $i++) {     
        if ($_FILES['oimage']['error'][$i] == 0) {
            $from = $_FILES['oimage']['tmp_name'][$i];
            $to = "public/images/" . time() . "_" . $_FILES['oimage']['name'][$i];
            $type = substr($_FILES['oimage']['type'][$i], 0, strpos($_FILES['oimage']['type'][$i], '/'));
            if (($type == 'image'|| $type == 'video')  &&  move_uploaded_file($from, $to)) {
                $fdata = [
                    'title' => 'product sub image',
                    'path' => $to,
                    'type' => $type,
                    'main' => 'no'
                ];
                $mid = $mdb->save($fdata);
                $pmdb->save(['product_id' => $product_id, 'media_id' => $mid]);
            }
        }
    }
}
$_SESSION['success']="Data saved ";
header("Location:index.php?module=product");
}else{
    $_SESSION['error'] = "Some thing went wrong ";
    header("Location:index.php?module=product&do=create");

}
?>
