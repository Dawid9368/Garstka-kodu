<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Dodawanie CD</title>

        <link rel="stylesheet" href="../style/stylekat.css" type="text/css"/>

    </head>

    <body>

        <div id="fdodawanieCD">
            <?php
            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
            //dodawanie nowych rekordów do tablicy


            $autor = $_POST["autor"];           //Przesyłanie danych z formularza
            $utwor = $_POST["utwor"];
            $opis = $_POST["opis"];
            $rok = $_POST["rok"];
            $regal = $_POST["regal"];
            $slot = $_POST["slot"];



            if ($_POST['autor'] != null && $_POST['utwor'] != null && $_POST['opis'] != null) {     //Sprawdzanie czy istnieją przesłane zmienne
                echo "Wolumin został dodany do katalogu <br><br>";

                $plik = fopen("../katalog/wolumin.txt", "a+");
                fputs($plik, "" . "|" . "$regal" . "|" . "$slot" . "|" . $autor . "|" . $utwor . "|" . $rok . "|" . $opis . "|" . "\r" . "\n");          //dodawanie lelementów do katalogu |Ważne sę znaki przejscia do nowej lini

                fclose($plik);
            } else {
                echo "Nie wypełniłeś wymaganych pól !!!!";


                //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                // Powrót do Formlularza dodawania nowego CD -->
            }

            function refresh($time = 6, $url = "../glowna.php") {

                header('refresh: ' . $time . ($url == '' ? '' : '; url=' . $url));
            }

            refresh();


            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            //Powrót do Katalogu głównego -->
            ?>
            <form action="../glowna.php">
                <input type="submit" value="Powrót do katalogu woluminów"/>
            </form>
        </div>

    </body>

</html>