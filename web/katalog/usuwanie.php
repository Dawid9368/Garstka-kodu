<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Usuwanie Katalogu</title>									

        <link rel="stylesheet" href="../style/stylekat.css" type="text/css"/>

    </head>
    <body>

        <div id="del_katalog">
            <?php
            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            // Pobieranie wartości przychodzących z formlularza skryptu index.php

            $delete = $_POST["delete"];
            //------TESTY-------   Poprawność wyświetlania zmiennych $fraza i $fraza
            //--1--echo "<hr>$delete <br>";
            $fraza = $_POST["szukaj"];
            //echo "<hr>$fraza";
            //------TEST-------   Sprawdzanie poprawności wyświetlania ciągu poprzez tablice
            $x = explode('|', $fraza);
            // echo "<hr><pre>";
            //print_r($x);
            //echo "</pre>";
            //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            //odczyt z pliku wolumin.txt na wskazana pozycje do usuniecia

            $filename = "../katalog/wolumin.txt";
            if ($delete == "-") {
                $fp = fopen($filename, 'r');                      //otwiera plik tylko do odczytu przy przesłaniu wartości "-" z pliku index.php

                $datatxt = fread($fp, filesize($filename));                //czyta zawartość pliku wraz z jego rozmiare w bajtach
                $pozycja = strpos($datatxt, "|" . $x[1] . "|" . $x[2] . "|" . $x[3] . "|" . $x[4] . "|");                  //wyznacza pozycje do usunięcia
                // echo "<hr> Pozycja $pozycja";
                fseek($fp, $pozycja);                        //przesuwa wskaznik pod pozycje do usnięcia
                //------TEST-------   Wyswiwtlanie pobranej pozycji do usunięcia z przesłanej z formularza


                $line = fgets($fp, 9999);                       //pobiera  cała tablice z ciagiem
                //------TEST-------   Ostateczny test wybranej frazy przeznaczonej do usunięcia
                //echo "<hr><pre>"; print_r($line);echo "</pre>";

                fclose($fp);                           //zamyka plik
                //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                // usuwanie wskazanego rekordu

                $fp = fopen($filename, 'w+');


                $nowy = str_replace($line, "", $datatxt);                //zamienia podany ciąg na pusta wartość/wkłada wynik do zmiennej $nowy i zwraca plik pomniejszony o wskazany rekord
                //------TEST-------   Wyswietlenie zawartości pliku po usunięciu wybranego rekordu
                //echo "<hr>$nowy";

                fwrite($fp, "$nowy");                                   //zapisuje treść ciagu do pliku wolumin.txt(tu zmienna $fb)

                fclose($fp);

                echo "Rekord został prawidłowo usunięty z katalogu !";

              

                function refresh($time = 5, $url = "../glowna.php") {

                    header('refresh: ' . $time . ($url == '' ? '' : '; url=' . $url));
                }
                refresh();

            //wyswietlanie na stronie info o usnięciu
            } else {
            echo "Nie mozna usunąc katalogu";
            }
            ?>

            <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            Powrót do Katalogu głównego -->


            <form action="../glowna.php">
                <input type="submit" value="Powrót do katalogu woluminów"/>
            </form>	
        </div>
    </body>
</html>