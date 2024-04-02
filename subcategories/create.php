<div class="container border">

    <form action="index.php?module=subcategories&do=store" method="post">
        <div class="alert alert-info h4 text-center">
            Category Form
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
            <label for="categories_id">Select Category:</label>
            <select name="categories_id" required class="form-select">
                <option value="">Select One</option>
                <?php foreach (getcat() as $cinfo) {
                ?>
                    <option value="<?= $cinfo['id']; ?>"><?= $cinfo['name']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="name">Sub Category Name:</label>
            <input type="text" id="name" name="name" class="form-control" required placeholder="Enter Name">
        </div>

        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter Description" rows="10"></textarea>
        </div>
       
        <div class="mb-3 text-center">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>