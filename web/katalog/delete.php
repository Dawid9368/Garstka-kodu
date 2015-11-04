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
            if (@unlink("../katalog/wolumin.txt")) {
                echo "Katalog został usunięty";
            } else {
                echo "Katalog nie istnieje";
            }
            ?>
        </form>
        <form action="../glowna.php">
            <input type="submit" value="Powrót do katalogu woluminów"/>
        </form>	
    </div>
</body>
</html>