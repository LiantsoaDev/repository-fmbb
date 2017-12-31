<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    protected $fillable = [
        'titre','contenu','tag','slug','seo','statut','administrateurs_id','images_id','archive'
    ];
}
