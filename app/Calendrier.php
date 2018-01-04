<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendrier extends Model
{
    protected $fillable = ['datematch','heurematch','lieumatch'];

    /**
    * Fonction reporting Match par calendrier
    * @param integer idcalendrier , DateTime date, DateTime hour
    * @return Collective Object Calendrier
    */

    public function reportingmatchrequest($idcalendrier,$date,$hour)
    {
    	return self::where('idcalendrier',$idcalendrier)->update(['datematch' => $date, 'heurematch' => $hour]);
    }
}

