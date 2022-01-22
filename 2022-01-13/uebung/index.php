<!doctype html>
<html>
<?php
session_start();
include('./inc/head.inc.php');
?>
<body>
<main>
    <?php include('./inc/nav.inc.php'); ?>
    <article class="container">
        <h1 class="my-5">Unsere Einträge</h1>
        <section class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            require_once('./inc/login.inc.php');
            $sql = "SELECT imgpath, title, id, teaser FROM content";
            foreach($conn->query($sql) as $row) {
            ?>
                <div class="col">
                    <div class="card">
                        <?php if($row['imgpath'] != NULL) { ?>
                            <img src="<?= $row['imgpath'] ?>" class="card-img-top" alt="...">
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['title'] ?></h5>
                            <p class="card-text"><?= $row['teaser'] ?></p>
                            <button type="button" class="btn btn-dark" data-toggle="modal" onclick="showDetail(<?= $row['id'] ?>)">
                                Show more
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>
    </article>
</main>
<div id="modalContainer"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    function showDetail(id) {
        $.ajax({
            url: 'modal.php',
            data: { id: id },
            method: 'POST',
            success: function (data) {
                $('#modalContainer').html(data);
                $('#showModal').modal('show');
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
 
</script>
</body>
</html>