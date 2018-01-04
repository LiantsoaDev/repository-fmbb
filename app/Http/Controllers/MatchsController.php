<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Calendrier;
use App\Point;
use App\Equipe;
use App\Region;

class MatchsController extends Controller
{
    private $match;
    private $calendrier;
    private $point;
    private $equipe;
    private $region;

    public function __construct()
    {
    	$this->match = new Match();
    	$this->calendrier = new Calendrier();
    	$this->point = new Point();
    	$this->equipe = new Equipe();
        $this->region = new Region();

    }

    /**
    * fonction listes des rencontres par evenement
    * @param integer idevent , string phase 
    * @return lists
    */
    public function showallmatchsbyEvent(Request $request , $phase='phase de groupe')
    {
    	$brute = $this->match->getMatchsbyEvents( $request->session()->get('idevent') , $phase );

        if( !empty($phase) )
            $brute->encours = $phase;

    	foreach($brute as $brt)
    	{
    		$brt->teamA =  $this->equipe->findequipe($brt->equipeA);
            $brt->teamA->REGION = $this->region->getregion($brt->teamA->IDREGION)->LIBELLE;
    		$brt->teamB = $this->equipe->findequipe($brt->equipeB);
            $brt->teamB->REGION = $this->region->getregion($brt->teamB->IDREGION)->LIBELLE;
    	}
    	return $brute;
    }

    /**
    * Fonction Main tous les matchs 
    * @param Request $request
    * @return boolean 
    */
    public function mainMatch()
    {
        dd($request->all());
    }

}
