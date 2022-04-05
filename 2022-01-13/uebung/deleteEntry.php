<?php include('./inc/editEntry.inc.php') ?>
<!doctype html>
<html>
<?php
require_once './inc/login.inc.php';
session_start();
if(!isset($_SESSION['username'])) {
    header('location: index.php');
}
?>
<?php include('./inc/head.inc.php') ?>
<body>
<main>
    <?php include('./inc/nav.inc.php') ?>
    <article class="container my-5 py-5">

        <?php
        if(isset($_GET['id']) && (!isset($_POST['btn_delete']))) {
            $id = intval($_GET['id']);
            if($id != 0) {
                try {
                    $stmt = $conn->prepare('SELECT id, title FROM content WHERE id = :id');
                    $stmt->execute(array(':id' => $id));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() > 0) {
                        ?>
                        <form method="post">
                            <input type="hidden" name="btn_delete" value="true">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <div class="mb-3">
                                Do you really want to delete <strong><?= $row['title'] ?></strong>
                            </div>
                            <!--<div class="mb-3">Fileupload</div>-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Delete</button>
                            </div>
                        </form>
                        <?php
                    } else {
                        $errorMsg[] = "No Entry found";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        ?>
        <?php include('./inc/msg.inc.php') ?>
    </article>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>