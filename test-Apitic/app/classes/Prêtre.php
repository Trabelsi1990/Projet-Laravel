<?php

namespace  App\Classes;

class Prêtre 
{
    private $color= "#FFFFFF";
    private $armor= "cuir";
    private $life_point= 160;
    private $method= "soin préféré";
    private $properties= "Hymne divin";
    private $perso;
    private $icon = "icone-classes/pretre-sacre.jpeg";
    private $icon2 = "icone-classes/pretre-discipline.jpeg";
    private $icon3 = "icone-classes/pretre-ombre.jpeg";


    public function __construct($personnage)
    {
        $this->perso= $personnage;
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
       if($this->perso->specialisation->nom_specialisation == 'Sacré'){
        return "<img src=\"".$this->icon."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > je suis un prêtre et mon ".$this->method." est ".$this->properties;
       }
       if($this->perso->specialisation->nom_specialisation == 'Discipline'){
        return "<img src=\"".$this->icon2."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > je suis un prêtre et mon ".$this->method." est ".$this->properties;
       }
       if($this->perso->specialisation->nom_specialisation == 'Ombre'){
        return "<img src=\"".$this->icon3."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > je suis un prêtre et mon ".$this->method." est ".$this->properties;
       }
    }

    public function hymne_divin()
    {
        return "je suis un prêtre de type ".$this->perso->specialisation->nom_specialisation;
    }
}