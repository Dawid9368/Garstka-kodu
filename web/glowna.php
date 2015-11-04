<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
       
        require_once 'Strona.inc';
        
      

      class Katalog extends Strona {
          
          
          
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
        require_once 'katalog/index.php';
        katalogPlyt();
        echo "</div>\n";
        $this->WyswietlStopke();
        echo "</body>\n</html>";
    }
          
      }
        
        

        $glowna= new Katalog();
      
        $glowna->przyciski;
       
    
        
        $glowna->Wyswietl();
        
        
        ?>
        
