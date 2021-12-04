<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Übung 1</title>
</head>
<body>
    <p>
        <?php print "mein erstes Programm"; ?>
        <br>
        <?php echo 255; ?>
        <br>
        <?php echo '500'; ?>
        <br>
        <?php echo 2*3; ?>
        <br>
        <?= 'test' ?>
    </p>
    <div>
        <?php
            echo "<h1>Willkommen</h1>";
         ?>
         <h2>Zum Abendkurs</h2>
    </div>
    <p>
        <?php
            $meineErsteVariable = "meine erste Variable";
            echo $meineErsteVariable;
        ?>
    </p>
    <p>
        <?php
            $ganzeZahl = 3;
            $kommaZahl = 5.389;
            $boolean = true;
            echo "Ganze Zahl " . $ganzeZahl .
            "<br>Komma Zahl " . $kommaZahl . 
            "<br>Boolean " . $boolean;
            echo "<br>";
            var_dump($ganzeZahl);
            echo "<br>";
            var_dump($kommaZahl);
            echo "<br>";
            var_dump($boolean);
            echo "<br>";
            var_dump($meineErsteVariable);
        ?>
    </p>
    <div>
        <?php
            $count = 5;
            echo '<p>Meine Zahl: ' . $count . "</p>\n";
            $count = $count - 1;
            // Kurzschreibweise wie in JS
            // $count--;
            echo '<p>Meine Zahl: ' . $count . '</p>';
        ?>
    </div>
</body>
</html>