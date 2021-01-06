<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    protected $fillable = [
        'typereglement',
    
    ]; 
    public function commandes()
    {
        return $this->hasMany('App\Commande');
    }
}
