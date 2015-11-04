<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Edytowanie CD</title>
        <link rel="stylesheet" href="../style/stylekat.css" type="text/css"/>



    </head>

    <body>

        <div id="edycja2">
            <?php
            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	
            //edytowanierekordów w tablicy



            $autor_new = $_POST["autor_new"];           //Przesyłanie danych z formularza
            $utwor_new = $_POST["utwor_new"];
            $opis_new = $_POST["opis_new"];
            $rok_new = $_POST["rok_new"];
            $fraza = $_POST["pozycja"];



            $fraza2 = explode("|", $fraza);
            $regal = $fraza2[1];
            $slot = $fraza2[2];

            /*
              print_r($autor); echo "<br>";
              print_r($autor_new);echo "<br><hr>";
              print_r ($utwor); echo "<br>";
              echo $utwor_new; echo "<br><hr>";
              echo $opis; echo "<br>";
              echo $opis_new; echo "<br><hr>";
              echo $rok; echo "<br>";
              echo $rok_new; echo "<br><hr>";
              echo "<hr><pre>"; print_r($fraza2);echo "</pre>";
              echo $regal; echo "<br><hr>";
              echo $slot; echo "<br><hr>"; */


            $filename = "../katalog/wolumin.txt";

            $fp = fopen($filename, 'r');                      //otwiera plik tylko do odczytu przy przesłaniu wartości "-" z pliku index.php

            $datatxt = fread($fp, filesize($filename));                //czyta zawartość pliku wraz z jego rozmiare w bajtach
            $pozycja = strpos($datatxt, "|" . $regal . "|" . $slot . "|" . $fraza2[3] . "|" . $fraza2[4] . "|");                    //wyznacza pozycje do usunięcia

            fseek($fp, $pozycja);                        //przesuwa wskaznik pod pozycje do usnięcia
            //------TEST-------   Wyswiwtlanie pobranej pozycji do usunięcia z przesłanej z formularza
            //echo "<hr> Pozycja $pozycja";

            $line = fgets($fp, 9999);                       //pobiera  cała tablice z ciagiem
            //------TEST-------   Ostateczny test wybranej frazy przeznaczonej do usunięcia
            //echo "<hr><pre>"; print_r($line);echo "</pre>";

            fclose($fp);                           //zamyka plik
            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            // usuwanie wskazanego rekordu

            $fp = fopen($filename, 'w+');


            $nowy = str_replace($line, "|$regal|$slot|$autor_new|$utwor_new|$rok_new|$opis_new|" . "\r" . "\n", $datatxt);                //zamienia podany ciąg na daną wartość/wkłada wynik do zmiennej $nowy i zwraca plik ze zmianami
            //------TEST-------   Wyswietlenie zawartości pliku po edycji wybranego rekordu
            //echo "<hr>$nowy";

            fwrite($fp, "$nowy");                        //zapisuje treść ciagu do pliku wolumin.txt(tu zmienna $fb)

            fclose($fp);

            echo "Zmiany zostały wprowadzone do katalogu";

             function refresh($time = 6, $url = "../glowna.php") {

                header('refresh: ' . $time . ($url == '' ? '' : '; url=' . $url));
            }

            refresh();
            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            //Powrót do Katalogu głównego -->
            ?>

        </div>
    <center><form action="../glowna.php">
            <input type="submit" value="Powrót do katalogu woluminów"/>
        </form></center>
</body>

</html>