<?php
if (!isset($_GET['id']) or !$_GET['id']) {
?>
    <script>
        alert("Something went wrong!");
        location.href = "index.php?module=categories";
    </script>
<?php
    exit();
}
$id = $_GET['id'];
$sql = "SELECT name,description,cstatus FROM categories WHERE id=$id";
$info = (new mysqli('localhost', 'root', '', 'batch7.30a'))->query($sql)->fetch_assoc();
?>
<div class="container border">

    <form action="index.php?module=categories&do=update&id=<?= $id; ?>" method="post">
        <div class="alert alert-info h4 text-center">
            Category Edit Form
        </div>
        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; ?>
            </div>
        <?php
            unset($_SESSION['error']);
        }
        ?>
        <?php
        if (isset($_SESSION['errorname'])) {
        ?>
            <div class="alert alert-danger">
                <?= $_SESSION['errorname']; ?>
            </div>
        <?php
            unset($_SESSION['errorname']);
        }
        ?>
        <div class="mb-3">
            <label for="name">Category Name:</label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Enter Name" value="<?= $info['name']; ?>">
        </div>

        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" rows="10"><?= $info['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label>Status:</label>
            <div class="form-control">
                <div class="form-check form-check-inline">
                    <input type="radio" name="cstatus" <?php if ($info['cstatus'] == 'yes') {
                                                            echo "checked";
                                                        } ?> id="yes" value="yes" class="form-check-input">
                    <label for="yes" class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">

                    <input type="radio" class="form-check-input" name="cstatus" id="no" value="no" <?= ($info['cstatus'] == 'no') ? "checked" : ""; ?>>
                    <label for="no" class="form-check-label">No</label>
                </div>
            </div>
        </div>
        <div class="mb-3 text-center">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
</div>