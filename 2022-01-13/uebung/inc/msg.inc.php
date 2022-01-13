<?php
if(isset($errorMsg)) {
    foreach($errorMsg as $error) {
        ?>
        <div class="alert alert-danger">
            <strong>Wrong <?= $error ?></strong>
        </div>
        <?php
    }
}

if(isset($successMsg)) {
    ?>
    <div class="alert alert-success">
        <strong><?= $successMsg ?></strong>
    </div>
    <?php
}
?>
