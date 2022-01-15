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
    <article class="container">

        <?php
        if(isset($_GET['id'])) {
            $id = intval($_GET['id']);
            if(is_int($id)) {
                try {
                    $stmt = $conn->prepare('SELECT * FROM content WHERE id=:id');
                    $stmt->execute(array(':id' => $id));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($stmt->rowCount() > 0) {
                        ?>
                        <form method="post" class="pt-5">
                            <input type="hidden" name="btn_edit" value="true">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <div class="mb-3">
                                <label for="inputTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" name="inputTitle" id="inputTitle"
                                       value="<?= $row['title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputTeaser" class="form-label">Teaser</label>
                                <input type="text" class="form-control" name="inputTeaser" id="inputTeaser"
                                       value="<?= $row['teaser'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="inputDescription" class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Leave a comment here"
                                          id="inputDescription" name="inputDescription"><?= $row['description'] ?></textarea>
                            </div>
                            <!--<div class="mb-3">Fileupload</div>-->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
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