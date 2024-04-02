<?php
$data = $ddb->all();
if ($data) {
?>


    <form action="index.php?module=subcategories&do=delete" method="post">
        <div class="text-success h4  text-center">
            Listing of Sub Categories
        </div>
        <div class="container mb-2 row">
            <div class="col-2">
                <a href="index.php?module=subcategories&do=create" class="btn btn-success">New Sub Category</a>
            </div>
            <div class="col-8">

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
            <div class="col-2 text-end">

                <button class="btn btn-danger" id="mainbtn" onclick="return confirm('Click Ok Confirmation');" disabled>Delete</button>
            </div>
        </div>
        <table class="table table-striped border" id="listing">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Main Category</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th><label for="alldel" title="Check for select all">Delete</label> <input type="checkbox" id="alldel" class="form-check-input" onclick="ckall()"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($data as $info) {
                ?>
                    <tr>
                        <td><?= ++$index; ?></td>
                        <td><a href="index.php?module=subcategories&do=edit&id=<?= $info['id']; ?>"><?= (trim($info['name'])) ? $info['name'] : '<span class="text-muted">N/A</span>'; ?></a></td>
                        <td><?= $info['categories_id']?getcat($info['categories_id']): '<span class="text-muted">N/A</span>'; ?></td>
                        <td><?= $info['description'] ? $info['description'] : '<span class="text-muted">N/A</span>'; ?></td>

                        <td><small><?= date('d-M-y h:iA', strtotime($info['created_at'])); ?></small></td>
                        <td><small><?= ($info['updated_at'] == $info['created_at']) ? date('d-M-y h:iA', strtotime($info['updated_at'])) : "<span class='text-warning'>" . date('d-M-y h:iA', strtotime($info['updated_at'])) . "</span>"; ?></small></td>
                        <td>
                            <input type="checkbox" name="delid[]" onclick="activebtn()" value="<?= $info['id']; ?>" class="form-check-input ele"></a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
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