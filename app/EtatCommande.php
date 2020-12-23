<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtatCommande extends Model
{
    protected $fillable = [
        'libelle',
    
    ]; 
    
    public function commandes()
    {
        return $this->hasMany('App\Commande');
    }
}
