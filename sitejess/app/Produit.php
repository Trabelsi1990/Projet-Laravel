<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function getPrice(){
        $price = $this->price /100;
        return number_format($price,2,',',''). ' €';
    }
}
