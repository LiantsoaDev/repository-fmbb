<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = ['nomequipe','urlogo','sexe','sigle'];
    
    /** 
    * Fonction listes des équipes d'une categorie ou plusieurs categories 
    * @param integer id ou IN(ids)
    * @return Collection Object equipe
    */
    public function listesequipespercategorie($listesid)
    {
    	if(is_array($listesid))
    	{
    		return self::whereIn('idcategorie', $listesid )->get();
    	}
    	else
    		return null;
    }

    /**
    * Fonction listes equipes by IN()
    * @param string IN()
    * @return Collection Object
    */
    public function getequipesin($in)
    {
        if( is_array($in) )
            return self::whereIn('idequipe',$in)->get();
        else
            return null;
    }

    public function getLogourlAttribute($value)
    {
        if(is_null($value))
            return 'default.png';
        else
            return $value;
    }

    public function getNameAttribute($value)
    {
        if(is_null($value))
            return '<small>Aucun nom n\'est attribué<small>';
        else
            return $value;
    }

}
