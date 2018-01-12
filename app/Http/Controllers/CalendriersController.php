<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Equipe;
use App\Poule;
use App\Http\Controllers\PoulesController;
use App\Http\Controllers\MatchsController;
use App\Http\Controllers\EquipesController;
use Carbon\Carbon;
use App\Point;
use App\Calendrier;
use App\Match;

class CalendriersController extends Controller
{
	private $equipe;
    private $poule;
    private $event;
    private $match;
    private $calendrier;

    public function __construct()
    {
    	$this->equipe = new Equipe();
        $this->poule = new Poule();
        $this->event = new Event();
        $this->match = new Match();
        $this->calendrier = new Calendrier();

    }

    /**
    * Fonction background color Phase
    * @param string phase
    * @return string color
    */
    public function gestionColor($phase)
    {
        switch ($phase) {
            case 'phase de groupe':
                return 'dark';
                break;
            case 'quart de final':
                return 'info';
                break;
            case 'demi final':
                return 'warning';
                break;
            case 'final':
                return 'danger';
                break;
            default:
                return 'default';
                break;
        }
    }

    /**
    * Fonction view Calendrier 
    * @return view page calendrier
    */
    public function showcalendrier(Request $request, $id)
    {
        $request->session()->put('idevent',$id);
        $instancematch = new MatchsController();
        $information = $instancematch->showallmatchsbyEvent( $request );
        // verification poule
        $color = $this->gestionColor($information->encours);
    	return view('admin.calendrier',compact('information','color'));
    }

    /** 
    * Function View update a match (en cours)
    * @param integer idmatch
    * @return Collection Object
    */
    public function showupdatematch($idmatch)
    {
        if( $this->calendrier->verifictionModifiableMatch($idmatch) )
        {
            $rencontre = $this->match->getmatchbyid($idmatch);
            $team1 = new EquipesController($rencontre->EQUIPE_ID1);
            $team2 = new EquipesController($rencontre->EQUIPE_ID2);
            $instancematch = new MatchsController();

            $equipe1 = $team1->equipe;
            $equipe2 = $team2->equipe;

            $main = $instancematch->main($idmatch, $rencontre->EQUIPE_ID1, $rencontre->EQUIPE_ID2);
            if( $main ){
                $equipe1->score = $instancematch->score;
                $equipe2->score = $instancematch->score;
                $period = $instancematch->periode;
                $start = $instancematch->demarrage;
                $affichage = $instancematch->affichage;
            }

            $boucleArray = ['equipe1' => $team1->convertToObject() , 'equipe2' => $team2->convertToObject() ];  
            $boucle[] = json_decode(json_encode($boucleArray));
            return view('admin.showmatch',compact('equipe1','equipe2','period','start','affichage','boucle','idmatch'));
        }
        else
        {
            return back()->with('error','Impossible de modifier le score de ce match ! Le match n\'a pas encore commencé.');
        }
    }

    /** 
    * Function Add nouveau match 
    * @return view ajout nouveau match
    */
    public function addnewmatch(Request $request)
    {
        $hidden = false;
        if($request->get('reference'))
        {
            //match indépendant
            $hidden = true;
            $equipes = Equipe::all();
        }
        else
        {
            $ids = '';
            //listes des equipes participants à l'évenement 
            $listesequipes = $this->poule->listesequipesbypouleEvent($request->session()->get('idevent'));
            foreach ($listesequipes as $listes)
            {
                $ids .= $listes->idequipes . ',';
            }
            $arrayids = explode(',',substr($ids, 0, -1));
            $equipes = $this->equipe->getequipesin($arrayids);
        }
        
        return view('admin.newmatch',compact('hidden','equipes'));
    }
    
    /**
    * Fonction inserer un nouveau match selon évenement
    * @param POST
    * @return redirect listes matchs
    */
    public function insertnewmatch(Request $request)
    {

        $validation = $this->validate($request,[
            'equipe1' => 'required|max:255',
            'equipe2' => 'required|max:255',
            'phase' => 'required',
            'terrain' => 'required',
            'date' =>  'required',
            'heure' => 'required'
        ]);
        //verification si les 2 equipes sont identiques
        if( $request->post('equipe1') != $request->post('equipe2'))
        {
            //verification si match independant
            if( $request->session()->has('matchIndependant') )
            {
                if( $this->insertionrencontre( $request ) ){
                    $request->session()->forget('matchIndependant');
                    return redirect()->route('admin.addmatch')->with('success',$request->session()->get('message'));
                }
            }    

            //fonction verfication poule
            $poule = new PoulesController();
            $verification = $poule->verificationpouleequipe( $request );

            if( $verification )
            {
                //insertion rencontre : calendrier + match 
               if( $this->insertionrencontre( $request, $verification) )
                    return redirect()->route('admin.calendrier',$request->session()->get('idevent'))->with('success',$request->session()->get('message'));
            }
            else
                return redirect()->route('admin.addmatch')->with('error','Les deux equipes <b>NE</b> sont <b>PAS</b> dans le <b>MEME POULE</b> ! <br> En phase de <code>Poule</code> les équipes qui se rencontrent, doivent être dans une même poule !');
        }
        else
        {
            return redirect()->route('admin.addmatch')->with('error','Les deux equipes sont identiques ! <br> Veuillez revérifier votre insertion !');
        }
    }

    /**
    * fonction insertionrencontre regroupant calendrier + match
    * @param Object Request $request, sinteger idpoule
    * @return null
    */
    public function insertionrencontre(Request $request, $idpoule=null)
    {
        //insertion dans calendrier 
                $calendrier = [
                    'datematch' => Carbon::instance(new \Datetime($request->post('date')))->format('Y-m-d'),
                    'heurematch' => Carbon::instance(new \Datetime($request->post('heure')))->format('H:i:s'),
                    'lieumatch' => $request->post('terrain')
                ];
               $insertionCalendrier = Calendrier::create($calendrier);

                //insertion dans match 
                $match = [
                    'idevent' => $request->session()->get('idevent',null),
                    'idcalendrier' => $insertionCalendrier->id,
                    'idpoule' => $idpoule,
                    'equipe_id1' => $request->get('equipe_id1'),
                    'equipe_id2' => $request->get('equipe_id2'),
                    'phase' => $request->post('phase')
                ];
               if( $this->match->insertionMatchwithoutPoint($match) )
               {
                    $request->session()->flash('message','Le match entre <b>'. $request->post('equipe1') .'</b> et <b>'. $request->post('equipe2') .'</b> a été bien enregistré pour le <b>'.date('d-m-Y',strtotime($calendrier['datematch'])).'</b> à <b>'. $calendrier['heurematch'].'</b> !');
                    return true;
               }
    }

    /**
    * fonction permet de reporter un match 
    * @param integer idmatch
    * @return null
    */
    public function reportingmatch(Request $request)
    {   
        $validation = $this->validate($request,[
            'numeromatch' => 'required',
            'newdate' => 'required',
            'newheure' => 'date_format:"H:i"|required'
        ]);

        $idcalendrier = Match::where('idmatch',intval($request->post('numeromatch')))->first()->IDCALENDRIER;
        $date = Carbon::instance(new \Datetime($request->post('newdate')))->format('Y-m-d');
        $hour = Carbon::instance(new \Datetime($request->post('newheure')))->format('H:i:s');

      if( $date >= Carbon::today() && Carbon::createFromFormat('H:i:s', $hour )->toDateTimeString() )
      {
            $update = $this->calendrier->reportingmatchrequest( $idcalendrier, $date , $hour );
            return back()->with('success','Le match a été reporté le '. date('d-m-Y',strtotime($date)) . ' à ' . $hour . ' !');
      }  
      else
            return back()->with('error','La date ou l\'heure n\'est pas valide. Le match n\'a pas été reporté ! ');
    }

}
