<?php // TODO ?>
<!doctype html>
<html>
<?php
// TODO
?>
<?php // TODO ?>
<body>
<main>
    <?php // TODO ?>
    <article class="container">
        <h1>Welcome <?= // TODO ?></h1>
    </article>
    <article class="m-2 text-center">
        <?php // TODO ?>
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
                    <form method="post">
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
                            <!--<div class="mb-3">Fileupload</div>-->
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
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // TODO
            ?>
                <tr>
                    <td><?= // TODO ?></td>
                    <td><?= // TODO ?></td>
                    <td>
                        <a href="./editEntry.php?id=<?= // TODO ?>">Edit</a>
                        <a href="./deleteEntry.php?id=<?= // TODO ?>">Delete</a>
                    </td>
                </tr>
            <?php
            // TODO
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