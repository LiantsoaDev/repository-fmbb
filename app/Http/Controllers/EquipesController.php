<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;
use App\Poule;

class EquipesController extends Controller
{
    public $equipe;
    public $poule;

    public function __construct($idequipe=null)
    {
    	$instance = new Equipe();
    	if( !empty($idequipe) )
    		$this->equipe =  $instance->getinfoequipebyid($idequipe);
    	else
    		$this->equipe = Equipe::all();

    }
}	
