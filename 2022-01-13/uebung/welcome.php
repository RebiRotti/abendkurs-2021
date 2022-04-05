<?php include ('./inc/editEntry.inc.php'); ?>
<!doctype html>
<html>
<?php
require_once './inc/login.inc.php';
session_start();
if(!isset($_SESSION['username'])) {
    header('location:index.php');
}
?>
<?php include('./inc/head.inc.php'); ?>
<body>
<main>
    <?php include('./inc/nav.inc.php'); ?>
    <article class="container">
        <h1>Welcome <?= $_SESSION['username']; ?></h1>
    </article>
    <article class="m-2 text-center">
        <?php include('./inc/msg.inc.php'); ?>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew">
            Add new
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="btn_add" value="true">
                            <div class="mb-3 row text-start">
                                <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="inputTitle" id="inputTitle">
                                </div>
                            </div>
                            <div class="mb-3 row text-start">
                                <label for="inputTeaser" class="col-sm-2 col-form-label">Teaser</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="inputTeaser" id="inputTeaser">
                                </div>
                            </div>
                            <div class="mb-3 row text-start">
                                <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                              name="inputDescription" id="inputDescription"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row text-start">
                                <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="inputImage" id="inputImage">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Anlegen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </article>
    <article class="container table-responsive mt-2">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col" class="col-3">Title</th>
                <th scope="col" class="col-3">Teaser</th>
                <th scope="col" class="col-3">IMG</th>
                <th scope="col" class="col-3">Edit</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT title, id, teaser, imgpath FROM content";
            foreach($conn->query($sql) as $row) {
            ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['teaser'] ?></td>
                    <td><?php
                    if($row['imgpath'] != NULL) {
                        echo '<span class="alert alert-success p-0">IMG vorhanden</span>';
                    } else {
                        echo '<span class="alert alert-danger p-0">IMG nicht vorhanden</span>';
                    }
                    ?></td>
                    <td>
                        <a href="./editEntry.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="./deleteEntry.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </article>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>