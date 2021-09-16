<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    public function personnage()
    {
        return $this->hasOne('App\Models\Personnage','race_id');
    }

}
