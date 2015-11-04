<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>EdytowanieCD</title>									

        <link rel="stylesheet" href="../style/stylekat.css" type="text/css"/>

    </head>
    <body>

        <div id="edytowanieCD">
            <?php
            $zmienna = $_POST["xx"];
            $key = $_POST["klucz"];
            $regal = $_POST["e"];
            $slot = $_POST["d"];


            $ed = explode("|", $zmienna);

            //---TEST---- Wyswietlanie tablicy danych do edycji
            //echo "<pre>";print_r($ed); echo "</pre>";
            ?>
            <table align="center" border="1" width="80%" bordercolor="gray" >						

                <tr>
                    <td width="20px">ID</td>
                    <td width="20px">Regał</td>
                    <td width="20px">Slot</td>
                    <td width="150px">WYKONOWCA</td>
                    <td width="150px">PŁYTA</td>
                    <td width="50px">DATA WYDANIA</td>
                    <td width="350px">OPIS PłYTY</td>

                </tr>


                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $ed[1]; ?></td>
                    <td><?php echo $ed[2]; ?></td>
                    <td><?php echo $ed[3]; ?></td>
                    <td><?php echo $ed[4]; ?></td>
                    <td><?php echo $ed[5]; ?></td>
                    <td><?php echo $ed[6]; ?></td>
                </tr>




            </table>
            <div id="edycja_form">
                <form method="post" action="../katalog/edycja.php" >
                    <fieldset><legend>Edycja Woluminu</legend>
                        <label>Padaj Autora :<br/></label><input type="text" value="<?php echo $ed[3]; ?>" name="autor_new" placeholder="<?php echo $ed[3]; ?>" size="51"/><br/><br/>
                        <label>Padaj Utwór :<br/></label><input type="text" value="<?php echo $ed[4]; ?>" name="utwor_new" placeholder="<?php echo $ed[4]; ?>" size="51"/><br/><br/>
                        <label>Padaj Date Wydania :<br/></label><input type="date" value="<?php echo $ed[5]; ?>" name="rok_new" placeholder="<?php echo $ed[5]; ?>" cols="45"/><br/><br/>
                        <label>Padaj Opis utworu :<br/></label><textarea  name="opis_new" value="<?php echo $ed[6]; ?>" cols="45" rows="5"><?php echo $ed[6]; ?></textarea>
                        <br/><br/>

                        <input type="hidden" value="<?php echo $zmienna; ?>" name="pozycja" />

                        <center><input type="submit" value="Edytuj Wolumin" />
                            <input type="reset" value="Resetuj"/></center>
                    </fieldset>
                </form>
            </div>
            <br><br>
            <form action="../glowna.php">
                <center><input type="submit" value="Powrót do katalogu woluminów"/></center>
            </form>


        </div>	


    </body>
</html>