<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author Dawid
 */
class Strona {

    protected $zawartosc;
    private $tytul = "Kody"."\n";
    private $slowa_kluczowe = "Tla konsulting, Tutaj lubia atrybuty, Niektore z moich firends to przegladarki";
    private $przyciski = array(
        'Strona glowna' => 'glowna.php',
        'Kontakt' => 'kontakt.php',
        'Uslugi' => 'uslugi.php',
        'Mapa strony' => 'mapa.php'
    );
    

    public function __set($nazwa, $wartosc) {
       $this->$nazwa = $wartosc;
    }
    public function __get($przyciski) {
        return $this->$przyciski;
    }

    public function Wyswietl() {
        echo "<html lang = \"pl\">\n<head>\n";
        $this->WyswietlTytul();
        $this->WyswietlSlowaKluczowe();
        $this->WyswietlUtf();
        $this->WyswietlStyle();
        $this->WyswietlSkrypty();
        echo "</head>\n<body>\n";
        $this->WyswietlNaglowek();
        echo "<div id = \"wrapper\">\n";
        $this->WyswietlMenu($this->przyciski);
        echo"<div class = \"content\">\n"
        . "$this->zawartosc.\n".
           "</div>\n";
        echo "</div>\n";
        $this->WyswietlStopke();
        echo "</body>\n</html>";
    }
  
    
    public function WyswietlTytul() {
        echo "<title>$this->tytul</title>";
    }

    public function WyswietlSlowaKluczowe() {
        echo "<meta name={\"keywords\"} content={$this->slowa_kluczowe} />\n";
    }
    public function WyswietlUtf() {
        echo "<meta charset=\"UTF-8\"/>\n";
    }

    public function WyswietlStyle() {
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\">\n"
        . "<link rel=\"stylesheet\" href=\"style/stylekat.css\" type=\"text/css\"/>\n";
    }
    public function WyswietlSkrypty() {
        echo "<script src=\"js/js.js\"></script>\n"
        . "<script src=\"js/menu.js\"></script>\n";
    }

    public function WyswietlNaglowek() {
        ?>
        <div class='header'>
            <div class="foto"><h1><a href="glowna.php">Kody</a></h1></div>
            <div class="foto"><img width="100" height="90" src="images/logo.png"></div>
        </div>
        <?php
    }

    public function WyswietlMenu($przyciski) {
        echo "\n";
        
        echo "<div class=\"menu\">\n";
        echo "<div class=\"res\">menu</div>\n";
        echo "<ul>\n";
        
        foreach ($przyciski as $nazwa => $url) {

            $this->WyswietlPrzycisk($nazwa, $url, !$this->CzyToAktualnyUrl($url));
        }
        echo "</ul>\n";
        echo "</div>\n";
    }

    public function CzyToAktualnyUrl($url) {
        if (strpos($_SERVER['PHP_SELF'], $url) == false) {
            return false;
        } else {
            return true;
        }
    }

    public function WyswietlPrzycisk($nazwa, $url, $active = true) {

        if ($active) {
            echo "
                        <li class=\"podmenu\"><a href = \"" . $url . "\"><img width=\"50\" height=\"50\"  src = \"images/m-logo.jpg\" alt = \"" . $nazwa . "\" border = \"0\"><p>". $nazwa . "</p></a></li>
                        
                        \n";
        } else {
            echo "
                
                        <li class=\"podmenu\"><a href = \"" . $url . "\"><img width=\"50\" height=\"50\"  src = \"images/boczne-logo.jpg\" alt = \"" . $nazwa . "\" border = \"0\"><p>". $nazwa . "</p></a></li>
                        \n";
        }
    }

    public function WyswietlStopke() {
        ?>
        <div class='foot'>   
            <p>Prawa zastrzeżone&COPYdawidziol14</p>

        </div> 
        <?php
    }

}
