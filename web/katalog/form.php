<!DOCTYPE html>

<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>DodawanieCD</title>									

        <link rel="stylesheet" href="../style/stylekat.css" type="text/css"/>

    </head>
    <body>
        <?php
        $regal = $_GET["t"];
        $slot = $_GET["s"];
        ?>


        <div id="dodawanieCD">
            <form name="form" method="post" action="../katalog/dodawanie.php" >
                <fieldset><legend>Dodawanie Nowego Woluminu</legend>
                   <!-- <label>Padaj Nr.Regału :<br/></label><input type="number" name="regal" placeholder="Podaj Nr.Regału" size="45"/><br/><br/>
                    <label>Padaj Nr.Slotu :<br/></label><input type="number" name="slot" placeholder="Podaj Nr.Slotu" size="45"/><br/><br/>-->
                    <label>Padaj Autora :<br/></label><input type="text" name="autor" placeholder="Podaj autora" size="45"/><br/><br/>
                    <label>Padaj Utwór :<br/></label><input type="text" name="utwor" placeholder="Podaj utwór" size="45"/><br/><br/>
                    <label>Padaj Date Wydania :<br/></label><input type="date" name="rok" placeholder="Podaj date wydania" size="45"/><br/><br/>

                    <input type="hidden" value="<?php echo $regal; ?>" name="regal" />
                    <input type="hidden" value="<?php echo $slot; ?>" name="slot" />
                    <label>Padaj Opis utworu :<br/></label><textarea  name="opis" placeholder="Opisz dodawanay wolumin" cols="40" rows="5"></textarea>
                    <br/><br/>
                    <center><input type="submit" value="Dodaj Wolumin" />
                        <input type="reset" value="Resetuj"/></center>
                </fieldset>
            </form>
            <form action="../glowna.php">
                <center><input type="submit" value="Powrót do katalogu woluminów"/></center>
            </form>
        </div>	
        <?php
        ?>
    </body>
</html>