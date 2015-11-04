<?php

function katalogPlyt() {
    
    ?>

        <div id="container">

            <div class="logo">
                <div class="title">DYNAMICZNY KATALOG DODAWANIA I USUWANIA WOLUMINÓW</div>
                <div class="search">

                    <form action="glowna.php" method="post">
                        Podaj szukaną fraze: <input type="search" name="autor" />
                        <input type="submit" name="button" value="szukaj" />
                        <input type="hidden" name="xx" value="se" />
                    </form>

                    <?php
                    if (isset($_POST["button"])) {
                        $plik = "katalog/wolumin.txt";
                        $dane = file($plik); /* pobieram dane z pliku i zapisuje do tablicy (linia = rekord) */

                        if ((isset($_POST['autor'])) AND ( trim($_POST['autor']) != "")) {
                            /* sprawdzam czy zmienna została zainicjonowana i czy jej wartość nie  jest pusta */

                            for ($i = 0; $i < count($dane); $i++) /* przeszukuję tablicę */
                                list($ID[$i], $regal[$i], $slot[$i], $autor[$i], $utwor[$i], $data[$i], $opis[$i]) = explode("|", $dane[$i]);
                            /* dziele linię na tablicę i zapisuje dane do odpowiednich zmienncyh */

                            for ($i = 0; $i < count($autor); $i++)
                                if (stripos($autor[$i], $_POST['autor']) !== false || stripos($utwor[$i], $_POST['autor']) !== false || stripos($data[$i], $_POST['autor']) !== false || stripos($opis[$i], $_POST['autor']) !== false) {
                                    /* sprawdzam czy szukany ciąg znaków znajduje się w zmiennych[$i] */
                                    echo "Szukana fraza znajduje sie na regale nr: " . $ID[$i] . " " . $regal[$i] . " w slocie nr:   " . $slot[$i] . "<br />";
                                    
                                } 
                               
                            }
                            /* wyświetlam dane w ktore spelnialy powyzszy warunek */
                        
                    } 
    
                    
                    ?>

                </div>
            </div>
            <div class="content"	>

                <?php
                //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                // Tworzenie dynamicznej tabeli z tablicami rekordów 


                if (file_exists("katalog/wolumin.txt") && filesize("katalog/wolumin.txt") >= 2) {                  //warunek sprawdzający czy plik wolumin.txt istnieje
                    ?>
                    <table border="1" width="100%" bordercolor="gray" >															<?php /* Tworzenie Tabeli Woluminów */ ?>

                        <tr align="center">
                            <td width="20px">ID</td>
                            <td width="20px">REGAŁ</td>
                            <td width="20px">SLOT</td>
                            <td width="150px">WYKONOWCA</td>
                            <td width="150px">PłYTA</td>
                            <td width="50px">DATA WYDANIA</td>
                            <td width="490px">OPIS PłYTY</td>
                            <td width="50px" >Edycja</td>
                            <td width="70px" >Usuwanie</td>

                        </tr>

    <?php
    $i = 1;
    $r = 1;
    $s = 1;
    echo"<tr>";
    $content = "katalog/wolumin.txt";
    $lista = file("$content");                    //Tworzenie Tablicy z zawartości pliku wolumin.txt
    foreach ($lista as $userek) {                  // Pętla tworząca kolejne Tablice ciągów w katalogu
        $wolumin = explode('|', $userek);
        ?>

                            <tr align='center' valign="middle">
                                <td><?php echo $i; ?></td>
                                <td><?php
                    if ($s % 5 == 0) {
                        echo $r;
                        $r = $r + 1;
                    } else
                        echo $r;
        ?></td>
                                <td><?php
                                    if ($s % 5 == 0) {
                                        echo $s;
                                        $s = 0;
                                    } else
                                        echo $s;
                                    ?></td>
                                <td><?php echo $wolumin[3]; ?></td>
                                <td><?php echo $wolumin[4]; ?></td>
                                <td><?php echo $wolumin[5]; ?></td>
                                <td><?php echo $wolumin[6]; ?></td>
                                <td align="center" >



        <?php
        //------TEST-------   Poprawność wyświetlania tablicy $wolumin
        //echo "<pre>";print_r($tuser);echo"</pre>";

        $int = implode("|", $wolumin);                //zamiana tablicy na ciągi
        $zmienna = strlen($int);                   //pobieranie pozycji aktualnego ciągu (potrzebne podczas edycji i usuwania)
        $usun = substr($int, 0);                    //funkcja zwracająca podaną prze $zmienna częsc ciągu
        //------TEST-------   Poprawność wyświetlania wybranej częsci ciągu z pliku wolumin.txt
        //echo $usun;
        ?>

                                    <?php /* -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                      Formularz uruchamiający skrypt edycja.php */ ?>


                                    <form method="POST" action="katalog/edycja_form.php" >
                                        <input type="hidden" value="<?php print_r($int); ?> " name="xx"/>
                                        <input type="hidden" value="<?php echo $i; ?> " name="klucz"/>
                                        <input type="hidden" value="<?php echo $r; ?> " name="e"/>
                                        <input type="hidden" value="<?php echo $s; ?> " name="d"/>
                                        <input type="image" title="Edycja" src="katalog/images/edit.png" width="21" heigh="21"  name="edycja"  />
                                    </form>

                                </td>
                                <td align="center">

        <?php
        //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        // Formularz uruchamiający skrypt usuwanie.php 
        ?>


                                    <form action="katalog/usuwanie.php" method="POST" >
                                        <input type="hidden" value="<?php echo $usun; ?>" name="szukaj"/>
                                        <input type="image" title="usuwanie" src="katalog/images/usun.png" width="20" heigh="20" value="-" name="delete"  />
                                    </form>


                                </td>

                            </tr>
                                    <?php $i++;
                                    $s++ ?>

    <?php } ?>

                    </table>

    <?php
} else {                            //warunek uruchamiany gdy if zwróci false
    echo "Katalog nie istnieje";
}
?>


            </div>	
            <div class="scroll"></div>

            <div class="form">

                <div class="form1">

                <?php
                //kontrola czy zmienne $r i $s istnieja
                if (isset($r)and isset($s)) {
                    
                } else {
                    $r = 1;
                    $s = 1;
                }

                /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                  Formularz dodawania nowego CD */
                ?>

                    <form method="GET" action="katalog/form.php">
                        <input type="hidden" value="<?php echo $r; ?>" name="t" />
                        <input type="hidden" value="<?php echo $s; ?>" name="s" />
                        <input type="submit" value="Dodaj nowe CD" />

                    </form>
                </div>
                <div class="form2">	

                    <?php
                    /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                     
                     * 
                     * 
                     * 
                     *  Skrypt usuwania całego katalogu woluminów */
                    
                 
                    ?>

                    <form action="katalog/delete.php">
                        <input type="submit" value="Usuń cały katalog" />
                    </form>
                </div>
            </div>
        </div>
<?php


    
}


?>

