<div class="container">

    <?php
    $con = new mysqli('localhost', 'root', '', 'batch7.30a');
    $rs = $con->query("select * from categories ");
    $con->close();
    if ($rs->num_rows) {
        $data = $rs->fetch_all(1);
        // MYSQLI_NUM -2 D
        // MYSQLI_ASSOC -1 
        // MYSQLI_BOTH - 3
        //  echo "<pre>"; print_r($data);exit;
    ?>
        <div class="text-success h4  text-center">
            Listing of Categories
        </div>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success" id="sm">
                <?= $_SESSION['success']; ?>
            </div>

        <?php unset($_SESSION['success']);
        }
        ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger  " id="em">
                <?= $_SESSION['error']; ?>
            </div>

        <?php unset($_SESSION['error']);
        }
        ?>
        <div class="mb-3">
            <a href="index.php?module=categories&do=create" class="btn btn-success">New Category</a>
        </div>
        <table class="table table-striped border">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach ($data as $info) {
                ?>
                    <tr>
                        <td><?= ++$index; ?></td>
                        <td><a href="index.php?module=categories&do=edit&id=<?= $info['id']; ?>"><?= (trim($info['name'])) ? $info['name'] : '<span class="text-muted">N/A</span>'; ?></a></td>
                        <td><?= $info['description'] ? $info['description'] : '<span class="text-muted">N/A</span>';; ?></td>
                        <td><?= ucfirst($info['cstatus']); ?></td>
                        <td><small><?= date('d-M-y h:iA', strtotime($info['create_at'])); ?></small></td>
                        <td><small><?= ($info['update_at'] == $info['create_at']) ? date('d-M-y h:iA', strtotime($info['update_at'])) : "<span class='text-warning'>" . date('d-M-y h:iA', strtotime($info['update_at'])) . "</span>"; ?></small></td>
                        <td>
                            <a href="#" class="btn btn-danger" onclick="cdel('index.php?module=categories&do=delete&id=<?= $info['id']; ?>')">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php } else {
    ?>
        <div class="alert alert-info text-center h2">
            Nothing to display!
        </div>
    <?php
    } ?>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $("document").ready(function() {
        setTimeout(() => {
            $('#sm').fadeOut(1000);
            $('#em').fadeOut(1000);
        }, 3000);

    })

    function cdel(id) {
        if (confirm("Do you really want to delete this record")) {
            location.href = "delete.php?id=" + id;
        }
    }
</script>