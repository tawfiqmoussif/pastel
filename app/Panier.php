<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Panier extends Model
{
    //use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function client(){
        return $this->belongsTo('App\Client', 'client_id','id');
    }
    public function couleur(){
        return $this->belongsTo('App\Couleur', 'couleur_id','id');
    }

}
