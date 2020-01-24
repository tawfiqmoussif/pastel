<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    public function produit(){
        return $this->belongsTo('App\Produit', 'produits_id','id');
    }
}
