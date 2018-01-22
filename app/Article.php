<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;
class Article extends Model
{
    use Taggable;

    protected $table = 'articles';
    
    protected $fillable = [
        'titre','contenu','tag','slug','seo','categorie','statut','administrateurs_id','images_id','archive'
    ];
    
}
