<?php include "components/header.php" ?>

<div class="d-flex w-100">
    <div class="w-25 bg-danger">
        <?php include "components/sidebar.php" ?>
    </div>

    <div class="w-75">
        <?php include "components/$action.php"?>
    </div>
</div>

<?php include "components/footer.php" ?>