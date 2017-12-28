<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Calendrier;
use App\Point;
use App\Equipe;

class MatchsController extends Controller
{
    private $match;
    private $calendrier;
    private $point;
    private $equipe;

    public function __construct()
    {
    	$this->match = new Match();
    	$this->calendrier = new Calendrier();
    	$this->point = new Point();
    	$this->equipe = new Equipe();
    }

    /**
    * fonction listes des rencontres par evenement
    * @param integer idevent , string phase 
    * @return lists
    */
    public function showallmatchsbyEvent(Request $request , $phase='phase de groupe')
    {
    	$brute = $this->match->getMatchsbyEvents( $request->session()->get('idevent') , $phase );
    	foreach($brute as $brt)
    	{
    		$brt->teamA =  $this->equipe->findequipe($brt->equipeA)->NAME;
    		$brt->teamB = $this->equipe->findequipe($brt->equipeB);
    	}
    	dd($brute);
    	return $brute;
    }

}
