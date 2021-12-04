<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Übung 2</title>
    </head>
    <body>
        <?php
            // Numerische Arrays
            $array1 = array();
            $array1[0] = 2;
            $array1[1] = 'Grönland';
            $array1[2] = 2.56;
            $array1[3] = "Kaltes Land";
            foreach($array1 as $entry) {
                echo '<p>' . $entry . '</p>';
            }

            // Kurzschreibweise Array
            $arrayAlternative = array(
                2,
                'Kanada',
                4.57,
                'großes Land'
            );
            // Ausgabe mit Index
            foreach($arrayAlternative as $key => $entry) {
                echo '<p>' . $key . ': ' . $entry . '</p>';
            }
        ?>
        <hr>
        <?php
            // Assoziatives Array
            $array2 = array();
            $array2['Nummer'] = 5;
            $array2['Produkt'] = 'Buch';
            $array2['Preis'] = 20.89;
            $array2['Titel'] = 'PHP für Einsteiger';
            foreach($array2 as $i => $entry) {
                echo '<p>' . $i . ': ' . $entry;
                if($i == 'Preis') {
                    echo ' €';
                }
                echo '</p>';
            }
        ?>
        <hr>
        <?php
            // Mehrdimensionales Array
            $array3 = array();

            $array3[0]['Nummer'] = 8;
            $array3[0]['Produkt'] = 'Zeitschrift';
            $array3[0]['Preis'] = 2.65;
            $array3[0]['Titel'] = 'WebDeveloper';

            $array3[1]['Nummer'] = 5;
            $array3[1]['Produkt'] = 'Buch';
            $array3[1]['Preis'] = 32.99;
            $array3[1]['Titel'] = 'React für Einsteiger';

            var_dump($array3);
            echo '<p>' . $array3[1]['Produkt'] . '</p>';

            foreach($array3 as $array) {
                var_dump($array);
                echo '<hr>';
                foreach($array as $i => $entry) {
                    echo '<p>' . $i . ': ' . $entry . '</p>';
                }
            }
        ?>
    </body>
</html>