<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	protected $table = "images";
    protected $fillable = ['urlimage','urlvideo'];
    //,'updated_at','created_at'
}
