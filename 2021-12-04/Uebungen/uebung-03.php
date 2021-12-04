<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Übung 3</title>
        <style>
            .meineKlasse {
                color: green;
            }
        </style>
    </head>
    <body>
        <?php
            // IF
            $var1 = 2;
            $var2 = 9;
            if($var1 < 5 || $var2 == 9) {
                echo '<p>Var 1 ist kleiner als 5 oder Var 2 ist 9</p>';
            }
            if(!($var2 < 5)) {
                echo '<p>Var2 ist nicht kleiner als 5</p>';
            }
            // if else
            if($var1 > 3) {
                echo '<p>var1 größer 3</p>';
            } elseif($var2 < 7) {
                echo '<p>var2 kleiner 7</p>';
            } else {
                echo '<p>die alternative</p>';
            }
        ?>
        <hr>
        <?php
            $i = 0;
            while($i < 10) {
                echo '<p class="meineKlasse">Hallo</p>';
                $i++;
            }
        ?>
        <hr>
        <?php
            // for
            $array1 = array();
            $array1[0] = 2;
            $array1[1] = 'Grönland';
            $array1[2] = 2.56;
            $array1[3] = "Kaltes Land";
            // var_dump(count($array1));
            for($j = 0; $j < count($array1); $j++) {
                echo '<p>' . $array1[$j] . '</p>';
            }
        ?>
        <hr>
        <?php
            // do-while
            $k = 0;
            do {
                echo '<p>Hallo</p>';
                $k++;
            } while($k < 10);
            
            // BPS 2
            $anzahl = 50;
            $bedingung = true;
            do {
                echo '<p> Aktuelle Zahl ' . $anzahl . '</p>';
                $anzahl--;
                $bedingung = ($anzahl > 20);
            } while($bedingung);
        ?>
    </body>
</html>