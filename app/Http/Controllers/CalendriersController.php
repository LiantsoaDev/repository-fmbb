<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;
use App\Poule;
use App\Http\Controllers\PoulesController;
use Carbon\Carbon;

class CalendriersController extends Controller
{
	private $equipe;
    private $poule;

    public function __construct()
    {
    	$this->equipe = new Equipe();
        $this->poule = new Poule();
    }
    /**
    * Fonction view Calendrier 
    * @return view page calendrier
    */
    public function showcalendrier(Request $request, $id)
    {
        $request->session()->put('idevent',$id);
    	return view('admin.calendrier');
    }

    /** 
    * Function View update a match (en cours)
    * @param integer idmatch
    * @return Collection Object
    */
    public function showupdatematch()
    {
        echo 'showmatch';
        return view('admin.showmatch');
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
            $hidden = true;
            //match indépendant
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
        dd( $request->post() );
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
            //fonction verfication poule
            $poule = new PoulesController();
            $verification = $poule->verificationpouleequipe( $request );
            if( $verification )
            {
                //insertion dans calendrier 
                $calendrier = [
                    'datematch' => Carbon::instance(new \Datetime($request->post('date')))->format('Y-m-d'),
                    'heurematch' => Carbon::instance(new \Datetime($request->post('heure')))->format('h:m:s'),
                    'lieumatch' => $request->post('terrain')
                ];
                $insertionCalendrier = Calendrier::create($calendrier);
                //insertion dans points
                $point = [
                    ''
                ];
            }
            else
                return back()->with('error','Les deux equipes sont dans le <b>MEME POULE</b> ! <br> Veuillez revérifier votre insertion !');
        }
        else
        {
            return back()->with('error','Les deux equipes sont identiques ! <br> Veuillez revérifier votre insertion !');
        }
    }

}
