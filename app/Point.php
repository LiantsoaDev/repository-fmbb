<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['id','idequipe','idmatch','quart1','quart2','quart3','quart4','total'];
}
