<?php

require_once 'Strona.inc';

class Kontakt extends Strona {
  
    public $przyciski2=array(
        'projekty'=>'projekty.php',
        'wdrozenia'=>'wdrozenia.php'
    );
    
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
        $this->WyswietlMenu($this->przyciski2);
        echo"<div class = \"content\">\n"
        . "$this->zawartosc.\n".
           "</div>\n";
        
        echo "</div>\n";
        $this->WyswietlStopke();
        echo "</body>\n</html>";
    }
       
    
    
}