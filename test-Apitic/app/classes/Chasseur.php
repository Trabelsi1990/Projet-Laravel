<?php

namespace  App\Classes;

class Chasseur 
{
    private $color= "#008000";
    private $armor= "tissu";
    private $life_point= "210";
    private $method= "coup préféré";
    private $properties= "hurlement de la bête";
    private $perso;
    private $icon= "icone-classes/chasseur-precision.jpeg";
    private $icon2= "icone-classes/chasseur-maitrise-des-betes.jpeg";
    private $icon3= "icone-classes/chasseur-survie.jpeg";


    public function __construct($personnage)
    {
        $this->perso = $personnage;
    }

    /**
     * getteurs to display the color
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * getteurs to display the armor
     */
    public function getArmor()
    {
        return $this->armor;
    }
   
    /**
     * getteur to display life points
     */
    public function getLife_point()
    {
        return $this->life_point;
    }
    
    /**
     * getteurs to display the method
     */
    public function getMethod()
    {
        return $this->method;
    }
 
    /**
     * getteurs to display properties
     */
    public function getProperties()
    {
        return $this->properties;
    }

    
    public function detail()
    {   
        if($this->perso->specialisation->nom_specialisation == 'Précision'){
            return "<img src=\"".$this->icon."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > je suis un chasseur et mon ".$this->method." est ".$this->properties;
        }
        if($this->perso->specialisation->nom_specialisation == 'Maîtrise des bêtes'){
            return "<img src=\"".$this->icon2."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > je suis un chasseur et mon ".$this->method." est ".$this->properties;
        }
        if($this->perso->specialisation->nom_specialisation == 'Survie'){
            return "<img src=\"".$this->icon3."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > je suis un chasseur et mon ".$this->method." est ".$this->properties;
        }
    }

    public function hurlement_de_la_bete()
    {
        return "je suis un chasseur de type ".$this->perso->specialisation->nom_specialisation;
    }
}