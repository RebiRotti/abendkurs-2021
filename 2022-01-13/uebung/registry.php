<?php include('./inc/userregistry.inc.php') ?>
<!doctype html>
<html>


<?php include('./inc/head.inc.php') ?>

<body>
<main>
    <?php include('./inc/nav.inc.php') ?>
    <article class="container">
        <?php include('./inc/msg.inc.php') ?>
        <form method="post">
            <input type="hidden" name="btn_register" value="true">
            <div class="mb-3">
                <label for="inputForename" class="form-label">Vorname</label>
                <input type="text" class="form-control" name="inputForename" id="inputForename" required>
            </div>
            <div class="mb-3">
                <label for="inputFamilyname" class="form-label">Nachname</label>
                <input type="text" class="form-control" name="inputFamilyname" id="inputFamilyname" required>
            </div>
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" name="inputUsername" id="inputUsername" required>
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" required>
            </div>
            <div class="mb-3">
                <label for="inputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="inputPassword" id="inputPassword1" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrieren</button>
        </form>
    </article>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>