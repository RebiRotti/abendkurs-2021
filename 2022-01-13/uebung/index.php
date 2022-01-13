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
                        <!--<img src="<? /*= $row['imgpath'] */ ?>" class="card-img-top" alt="...">-->
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['title'] ?></h5>
                            <p class="card-text"><?= $row['teaser'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>
    </article>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>