<?php
if (!isset($_GET['id']) or !$_GET['id']) {
?>
    <script>
        alert("Something went wrong!");
        location.href = "index.php";
    </script>
<?php
    exit();
}
$id = $_GET['id'];
$info = $ddb->find($id);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container border">

    <form action="index.php?module=subcategories&do=store&id=<?= $id; ?>" method="post">
        <div class="alert alert-info h4 text-center">
            SubCategory Edit Form
        </div>
        <div class="mb-3">
            <label for="categories_id">Select Category:</label>
            <select name="categories_id" required class="form-select">
                <option value="">Select One</option>
                <?php foreach (getcat() as $cinfo) {
                ?>
                    <option value="<?= $cinfo['id']; ?>" <?=$info['categories_id']== $cinfo['id']?"selected":'';?>><?= $cinfo['name']; ?></option>
                <?php
                }
                ?>
            </select>
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

        <div class="mb-3 text-center">
            <button class="btn btn-primary">Update</button>
        </div>
    </form>
</div>