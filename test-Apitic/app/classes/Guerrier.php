<?php
namespace  App\Classes;
use App\Models\Personnage;

class Guerrier
{
    private $color = "#A52A2A";
    private $armor = "métal";
    private $life_point = 150;
    private $method = "coup préféré"; // enlever les accents.
    private $properties = "cri de guerre";
    private $perso;
    private $icon  = "/icone-classes/guerrier-arme.jpg";
    private $icon2  = "icone-classes/guerrier-fureur.jpeg";
    private $icon3  = "/icone-classes/guerrier-protection.jpeg";



    public function __construct($personnage) // faut changé avk le perso
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
        if($this->perso->specialisation->nom_specialisation == 'Arme'){
           return  "<img src=\"".$this->icon."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > Je suis un guerrier et mon ".$this->method." est ".$this->properties; 
        }  
        if($this->perso->specialisation->nom_specialisation == 'Fureur'){
            return  "<img src=\"".$this->icon2."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > Je suis un guerrier et mon ".$this->method." est ".$this->properties; 
         } 
         if($this->perso->specialisation->nom_specialisation == 'Protection'){
            return  "<img src=\"".$this->icon3."\" style: height = 80rem, class= \"rounded mx-auto d-block\"  > Je suis un guerrier et mon ".$this->method." est ".$this->properties; 
         } 
    }
    
    public function cri_de_guerre()
    {
        return "je suis un gurrier avec la spécialisation ".$this->perso->specialisation->nom_specialisation;
    }
    
}


