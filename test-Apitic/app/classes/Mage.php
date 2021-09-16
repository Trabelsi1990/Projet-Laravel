<?php

namespace  App\Classes;

class Mage 
{
    private $color = "rgb(135,206,235)";
    private $armor = "cuir";
    private $life_point = "200";
    private $method = "Sort préféré";
    private $properties = "Murmur de magie";
    private $perso;
    private $icon  = "/icone-classes/mage-givre.jpeg";
    private $icon2  = "/icone-classes/mage-feu.jpeg";
    private $icon3  = "/icone-classes/mage-arkane.jpeg";

    
    public function __construct($personnage)
    {
       return $this->perso = $personnage;
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
         
        
        if($this->perso->specialisation->nom_specialisation == 'Arcane')
        {
        return "<img src=\"".$this->icon3."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > Je suis un mage et mon ".$this->method." est ".$this->properties;
        }  
        if($this->perso->specialisation->nom_specialisation == 'Givre')
        {
        return "<img src=\"".$this->icon."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > Je suis un mage et mon ".$this->method." est ".$this->properties;
        } 

         if($this->perso->specialisation->nom_specialisation == 'Feu')
        {
        return "<img src=\"".$this->icon2."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > Je suis un mage et mon ".$this->method." est ".$this->properties;
        }

        
    }

    public function murmur_de_magie()
    {
       return "Je suis un mage avec la spécialisation ".$this->perso->specialisation->nom_specialisation; 
    }
}