<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use App\Equipe;
use App\Region;
use App\Point;
use App\Event;
use App\Http\Controllers\EquipesController;

class MatchsController extends Controller
{
    private $match;
    private $equipe;
    private $region;
    private $point;

    public $score;
    public $periode;
    public $demarrage;
    public $affichage = true;

    public function __construct()
    {
    	$this->match = new Match();
    	$this->equipe = new Equipe();
        $this->region = new Region();
        $this->point = new Point();

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

            $evenement = new Event();
            $brt->statutencours = $evenement->scopeStatutEvent($brt->datematch, $brt->datematch);
    	}
    	return $brute;
    }

    /** 
    * Fonction main rencontre match 
    * @param integer idmatch
    * @return array 
    */
    public function main($idmatch, $id1, $id2)
    {
        //initial
        $main = $this->initialiserMatch($idmatch);
        if( $main )
            return true;
        else
        {
            if( $this->getstart($idmatch) )
                return true;
            else
                return redirect()->route('admin.show-update-match',$idmatch)->with('error','Une erreur s\'est produite ! Veuillez réessayer ultérieurement ! ');
        }
        
    }

    /**
    * Fonction initialiser un match
    * @param null
    * @return null 
    */
    public function initialiserMatch($idmatch)
    {
        $verification = $this->match->getmatchbyid($idmatch);
        if( is_null($verification->IDPOINT) )
        {
            $this->score = '00';
            $this->periode = '<button class="btn btn-default btn-labeled fa fa-thumbs-o-up">Prêt</button>';
            $this->demarrage = ' <a href='. route('admin.declencheur',$idmatch).' class="btn btn-success btn-labeled fa fa-play-circle">Jouer le match</a>';
            $this->affichage = false;
            
            return true;
        }
    }

    /** 
    * Fonction declencheur debut match
    * @param integer idmatch
    * @return array tableau
    */
    public function declencheurMatch(Request $request,$idmatch)
    {
       // creer l'idpoint dans point
        $equipes = $this->match->getmatchbyid($idmatch);
        $idequipes = [ $equipes->EQUIPE_ID1, $equipes->EQUIPE_ID2 ];
        for($i=0 ; $i<count($idequipes); $i++ )
        {
            $insertion = $this->point->createPoint(['idequipe' => $idequipes[$i], 'idmatch' => $idmatch]);
            //mettre à jour l'idpoint dans match
            $update = $this->match->updateMatch($idmatch, ['idpoint' => $insertion->id ]);
        }
        
        return redirect()->route('admin.show-update-match',$idmatch)->with('success','Le match est joué et déclenché dans le système ! ');
    }

    /**
    * Fonction debut du match
    * @param integer idmatch
    * @return 
    */
    public function getstart($idmatch)
    {
        $verifQuartOne = $this->point->getAllQuarts($idmatch,'idmatch');
        if( is_null($verifQuartOne->quart1) ) //->first()
        {
             $this->periode = '<button class="btn btn-primary btn-labeled fa fa-clock-o">Quart temps 1</button>';
            $this->demarrage = '<button class="btn btn-success btn-labeled fa fa-spinner">En cours</button>';
            $this->score = '00';
            return true;
        }
        else
            return false;
       
    }

    /**
    * Fonction ajout Score
    * @param Request $request
    * @return null
    */
    public function setScore(Request $request)
    {
        $validation = $this->validate($request,[
            'one' => 'required|numeric',
            'two' => 'required|numeric',
            'matchref' => 'required|numeric',
            'scoreTeam1' => 'required|numeric',
            'scoreTeam2' => 'required|numeric'
        ]);

        //verifier que superieur ou egal précedent score 
        $listes = [ $request->post('one') , $request->post('two') ];
        $periodes = ['quart1','quart2','quart3','quart4'];
        $scores = [ $request->post('scoreTeam1') , $request->post('scoreTeam2') ];

        $scorepoint = Point::where('idequipe', $request->post('one') )->first();
        $q1team1 = $scorepoint->quart1;

        if( is_null($q1team1) )
        {
            for( $i=0; $i<count($listes); $i++ )
            {
               $this->point->updatePoint( $request->post('matchref') , $listes[$i] , ['quart1' => $scores[$i] ] );
            }   
        }
        else
        {
            for( $a=0; $a<count($listes); $a++ )
            {
                $array = $this->point->getAllQuarts( $request->post('matchref') ,'idmatch');
                for( $b=0; $a<count($array); $b++ )
                {
                    if( is_null($array[$b]) )
                        $array[$b] = $scores[$a];
                }
            }
             //inserer dans Point ( 2 Teams )
             $this->point->updatePoint( $request->post('matchref') , $listes[$i] , $array );
        }
         //verification quart4 

        //afficher les scores du match de chaque periode
        for( $c=0; $c<count($listes); $c++ )
        {
            $quarts[$c] = $this->point->getAllQuarts($listes[$c],'idequipe');
            $boucleInArray[] = $this->affichageInObjectUpdateMatch( json_decode(json_encode($quarts[$c]),true), $listes[$c] , $c+1 );
        }
        
        $boucleInObject = json_decode(json_encode($boucleInArray), false);

        $equipeOne = new EquipesController($request->post('one'));
        $equipeTwo = new EquipesController($request->post('two'));
        $instancematch = new MatchsController();
        $period = $instancematch->periode;
        $start = $instancematch->demarrage;
        $affichage = $instancematch->affichage;
        $boucle = $boucleInObject;
        $equipe1 = json_decode(json_encode($equipeOne),false)->equipe;
        $equipe2 = json_decode(json_encode($equipeTwo),false)->equipe;

        $equipe1->score = $this->point->getTotalbyId( $request->post('matchref') );
        
        return view('admin.showmatch',compact('equipe1','equipe2','period','start','affichage','boucle','idmatch'));
    }

    /**
    * Fonction affichage de la boucle en tant qu'Object 
    * @param Array $arrays : tableau contenant listes des quarts ; integer equipe : id equipe ; 
    * @return Object 
    */
    public function affichageInObjectUpdateMatch($arrays, $equipe, $indice)
    {
        if( is_array($arrays) )
        {
            for( $e=0; $e<count($arrays); $e++ )
            {
                //boucle->equipe1->logo
                $indicequart = $e+1;
                if( !is_null( $arrays['quart'.$indicequart] ) ){
                    $boucle['equipe'.$indice]['logo'] = $this->equipe->findequipe($equipe)->LOGOURL;
                    $boucle['equipe'.$indice]['sigle'] = $this->equipe->findequipe($equipe)->SIGLE;
                    $boucle['equipe'.$indice]['genre'] = $this->equipe->findequipe($equipe)->SEXE;
                    $boucle['equipe'.$indice]['score'] = $arrays['quart'.$indicequart];
                }
            }
        }
        return $boucle;
    }

}
