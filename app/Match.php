<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['idpoint','idcalendrier','idpoule','equipe_id1','equipe_id2','statut'];
}
