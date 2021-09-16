<?php 
 function couleur($pseudo){
    $lettres = str_split ($pseudo);
    foreach ($lettres as $lettre) {
    $style = "rgb(".rand(0,255).",".rand(0,255).",".rand(0,255).")";
        echo "<b style=\"color:".$style."\">".$lettre."</b>";
    } 
}
