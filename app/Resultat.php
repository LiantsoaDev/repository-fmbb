<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resultat extends Model
{
    protected $fillable = ['idequipe','pouleid','v','d','points','scoreencaisse','scorecumule','differencepoint'];

    /**
    * Fonction get resultat match 
    * @param integer idequipe, integer idpoule
    * @return boolean true : pas vide , false : vide
    */
    public function getresultat($idequipe, $idpoule)
    {
    	$data = self::where('idequipe',$idequipe)->where('pouleid',$idpoule)->first();
    	if( !empty($data) )
    		return true;
    	else
    		return false;
    }

    /**
    * fonction inserer la premiere resultat dans Resultat
    * @param integer idequipe , integer idpoule, integer score
    * @return Collection Object Resultat 
    */
    public function insertResultat(array $datas)
    {
    	return self::create($datas);
    }

    /**
    * fonction mise à jour des resultats 
    * @param integer idequipe, integer idpoule, integer score
    * @return Collection Object Resultat
    */
    public function updateResultat($idequipe, $idpoule, array $datas)
    {
    	if( is_array($datas) )
    		return self::where('idequipe',$idequipe)->where('pouleid',$idpoule)->update($datas);
    }

    /**
    * fonction recuperer resultat by idequipe , idpoule
    * @param integer idequipe, integer idpoule
    * @return Collection Object Resultat
    */
    public function recupereResultat($idequipe,$idpoule)
    {
    	return self::where('idequipe',$idequipe)->where('pouleid',$idpoule)->get(['v','d','points','scoreencaisse','scorecumule','differencepoint']);
    }
}
