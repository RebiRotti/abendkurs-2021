<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container">
<article class="my-4">
    <h1>Das Mathe Quiz</h1>
    <h2 class="user">Es spielt:</h2>
</article>
<article class="fadeCustom my-4">
    <p class="question">Frage</p>
    <section class="d-flex">
        <input id="result" class="form-control w-25">
        <button class="checkResult btn btn-dark" type="button" onclick="checkResult()">Check Result</button>
    </section>
</article>
<article class="fadeCustom game my-4">
    <section class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        for($i = 1; $i < 10; $i++) {
            echo '<div class="text-center"><button id="btn-'.$i.'" type="button" class="w-75 btn btn-secondary disabled" >'.$i.'</button></div>';
        }
        ?>
    </section>
</article>

<article>
    <button id="user" type="button" onclick="username()" class="btn btn-success">Play</button>
    <button id="start" type="button" onclick="start()" class="btn btn-dark">Restart</button>
</article>

<article id="output" class="d-flex flex-wrap"></article>

<article id="dbOutput" class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <td>User</td>
            <td>Frage</td>
            <td></td>
            <td>Level</td>
            <td>gespielt am</td>
            <td></td>
        </tr>
        </thead>
        <tbody id="insert">
            <?php include('./table.php'); ?>
        </tbody>
    </table>
</article>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js.js"></script>
<script src="ajax.js"></script>
</body>
</html>