<?php
$data = $ddb->custom("SELECT 
    product.id AS product_id, 
    product_name,
    product_price,
    product_discount,
    product_description, 
    GROUP_CONCAT(DISTINCT CONCAT(subcategories.categories_id, ' - ', subcategories.name)) AS subcatids, 
    GROUP_CONCAT(DISTINCT CONCAT(media.path, ' - ', media.type, ' - ', media.main)) AS images 
FROM 
    product 
LEFT JOIN 
    product_subcategories ON product.id = product_subcategories.product_id
LEFT JOIN 
    subcategories ON subcategories.id = product_subcategories.subcategories_id
LEFT JOIN 
    product_media ON product.id = product_media.product_id
LEFT JOIN 
    media ON media.id = product_media.media_id
GROUP BY 
    product.id");

if ($data) {
?>


    <form action="index.php?module=subcategories&do=delete" method="post">
        <div class="text-success h4  text-center">
            Listing of Sub Categories
        </div>
        <div class="container mb-2 row">
            <div class="col-2">
                <a href="index.php?module=product&do=create" class="btn btn-success">New Product</a>
            </div>
            <div class="col-7">

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="text-success text-center h5" id="sm">
                        <?= $_SESSION['success']; ?>
                    </div>

                <?php unset($_SESSION['success']);
                }
                ?>
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="text-danger  text-center h5" id="em">
                        <?= $_SESSION['error']; ?>
                    </div>

                <?php unset($_SESSION['error']);
                }
                ?>
            </div>
            <div class="col-3 text-end">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-danger" id="mainbtn" onclick="return confirm('Click Ok Confirmation');" disabled>Delete</button>

                    </div>
                    <div class="col-6">

                        Check All <input type="checkbox" id="alldel" class="form-check-input" onclick="ckall()">
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php foreach ($data as $info) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="card" style="width: 18rem;">
                            <h5 class="card-header text-success">
                                <?= $info['product_name']; ?>
                                <input type="checkbox" name="delid[]" onclick="activebtn()" value="<?= $info['product_id']; ?>" class="form-check-input ele float-end"></a>
                            </h5>
                            <?php

                            $mainimage = "public/images/notavailable.jpg";
                            $images = "";
                            if ($info['images']) {
                                $images = explode(",", $info['images']);
                                $images = array_map(fn ($e) => explode(" - ", $e), $images);

                                $mainimage = array_filter($images, fn ($e) => in_array('yes', $e));
                                if ($mainimage) {
                                    $mk = array_key_first($mainimage);
                                    unset($images[$mk]);
                                    $mainimage = $mainimage[$mk][0];
                                }
                            }

                            ?>
                            <img src="<?= $mainimage ?>" class="card-img-top" height="200px" id="mainimg_<?= $info['product_id']; ?>" alt="...">
                            <?php if (is_array($images)) {
                            ?>
                                <div class="row mt-2">
                                    <div class="col-3 mb-2" style="cursor:pointer">
                                        <img src="<?= $mainimage ?>" onclick="(()=>{
                                              
                                                document.getElementById('mainimg_<?= $info['product_id']; ?>').src=this.src;
                                            })()" class="card-img-top" height="50px">
                                    </div>
                                    <?php
                                    foreach ($images as $img) {
                                    ?>
                                        <div class="col-3 mb-2" style="cursor:pointer">
                                            <img src="<?= $img[0] ?>" onclick="(()=>{
                                              
                                                document.getElementById('mainimg_<?= $info['product_id']; ?>').src=this.src;
                                            })()" height="50px" width="50px" class="card-img-top" alt="...">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="card-body">
                                <h6 class="card-title">Price:
                                    <?php if ($info['product_discount']) { ?>
                                        <del class="text-danger"><?= $info['product_price'] ?></del>₹ <?= $info['product_discount'] ?>%
                                        <ins class="text-primary"> <?= $info['product_price'] - ($info['product_price'] * $info['product_discount'] / 100) ?></ins>
                                    <?php } else { ?>
                                        <ins class="text-primary"> <?= $info['product_price'] ?>
                                        <?php } ?></ins>
                                </h6>
                                <p class="card-text"><?= $info['product_description']; ?></p>
                                <a href="index.php?module=product&do=edit&id=<?= $info['product_id']; ?>" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </form>
<?php } else {
?>
    <div class="alert alert-info text-center h2">
        Nothing to display!
    </div>
<?php
} ?>
<script>
    function activebtn() {
        let all = document.querySelectorAll('.ele');
        let acounter = 0;
        for (let i = 0; i < all.length; i++) {
            if (all[i].checked)
                ++acounter;
        }
        if (acounter == all.length) {
            alldel.checked = true;
            mainbtn.disabled = false;
        } else {
            if (acounter > 0) {

                mainbtn.disabled = false;
            } else {
                mainbtn.disabled = true;
            }
            alldel.checked = false;
        }
        mainbtn.innerHTML = (acounter > 1) ? ((acounter == all.length) ? "Delete All" : "Multiple Delete") : "Delete";
    }

    function ckall() {

        let all = document.querySelectorAll('.ele');
        for (let i = 0; i < all.length; i++) {
            all[i].checked = alldel.checked;
        }
        activebtn();

    }
</script>