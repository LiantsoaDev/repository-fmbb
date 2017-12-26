<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendrier extends Model
{
    protected $fillable = ['datematch','heurematch','lieumatch'];
}
