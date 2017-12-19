<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;
use App\Poule;

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
        $validation = $this->validate($request,[
            'equipe1' => 'required|max:255',
            'equipe2' => 'required|max:255',
            'phase' => 'required',
            'terrain' => 'required',
            'date' =>  'required',
            'heure' => 'required'
        ]);

       //verification si meme equipe A et B et si meme poule A et B
        
        $matchs = [
            'equipe_id1' => $request->post('equipe1'),
            'equipe_id2' => $request->post('equipe2'),
            'phase' => $request->post('phase')
        ];

        //
    }

}
