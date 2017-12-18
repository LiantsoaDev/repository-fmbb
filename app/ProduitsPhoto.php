<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduitsPhoto extends Model
{
    protected $fillable = ['photo_id', 'nomfoto'];
    
       public function product()
       {
           return $this->belongsTo('App\Image');
       }
}
