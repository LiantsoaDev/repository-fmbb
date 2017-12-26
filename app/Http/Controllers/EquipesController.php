<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;
use App\Poule;

class EquipesController extends Controller
{
    private $equipe;
    private $poule;

    public function __construct()
    {
    	$this->equipe = new Equipe();
    	$this->poule = new Poule();
    }

    /** 
    * fonction verifiant que les 2 equipes sont pas identiques
    


}	
