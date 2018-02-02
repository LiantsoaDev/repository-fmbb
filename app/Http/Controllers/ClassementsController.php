<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;
use App\Resultat;

class ClassementsController extends Controller
{
	protected $point;
	protected $result;

    public function __construct()
    {
    	$this->result = new Resultat();
    	$this->point = new Point();
    }

    /**
    * fonction verification et insertion dans classement des équipes
    * @param Array $idEquipes , Array $score
    * @return Boolean 
    */
    public function insertionClassement($idequipe,$idpoule,$score)
    {
    	$designationScore = $this->classificationScore($idequipe,$score);
    	$resultat =  $this->result->getresultat($idequipe, $idpoule);
    	if( $resultat == false )
    	{
    		$this->result->insertResultat([
    			'idequipe' => $idequipe,
    			'pouleid' => $idpoule,
    			'v' => intval(00),
    			'd' => intval(00),
    			'points' => intval(00),
    			'scoreencaisse' => $designationScore['encaisse'],
    			'scorecumule' => $designationScore['cumule'],
    			'differencepoint' => $designationScore['differencepoint']
    		]);
    	}
    	else
    	{
    		$assignation_statut = $this->calculdespoints($score,$idpoule);
    	}
    }

    /**
    * fonction calcul des points et victoires ainsi que défaites 
    * @param Array $score, integer $idpoule
    * @return boolean true
    */
    public function calculdespoints(array $score, $idpoule)
    {
    	foreach ($score as $key => $value)
    	{
    		$equipe1 = array('id' => $key , 'score' => $value);
    		$equipe1Object = json_decode(json_encode($equipe1),false);
    		break;
    	}
    	foreach ($score as $cle => $valeur)
    	{
    		if( $cle != $equipe1['id'] ){
    			$equipe2 = array('id' => $cle, 'score' => $valeur );
    			$equipe2Object = json_decode(json_encode($equipe2),false);
    		}
    	}
    	if( $equipe1Object->score > $equipe2Object->score)
    		$updateScore = $this->updateVictoireOuDefaite($equipe1Object,$equipe2Object,$idpoule);
    	if( $equipe1Object->score < $equipe2Object->score)
    		$updateScore = $this->updateVictoireOuDefaite($equipe2Object,$equipe1Object,$idpoule);
    }

    /**
    * fonction insertion victoire ou defaite d'une équipe
    * @param Object $idequipe victoire , Object $idequipe Defaite, integer $idpoule
    * @return boolean true
    */
    public function updateVictoireOuDefaite($equipeVictoire,$equipeDefaite,$idpoule)
    {
    	//getresultat Equipe Victorieux :  victoire, defaite, points, scoreencaisse, scorecumule, differencepoint
    	$dataScore = $this->result->recupereResultat($equipeVictoire->id,$idpoule);
    	foreach ($dataScore as $datas )
    	{
    		$getV = $datas->v;
    		$getD = $datas->d;
    		$getPoints = $datas->points;
    		$getEncaisse = $datas->scoreencaisse;
    		$getCumule = $datas->scorecumule;
    		$getDifference = $datas->differencepoint;
    	}
    	$updateQueryData = [
    		'v' => intval($getV) + 1,
    		'points' => intval($getPoints) + 3,
    		'scoreencaisse' => $equipeDefaite->score,
    		'scorecumule' => $equipeVictoire->score,
    		'differencepoint' => intval($equipeVictoire->score) - intval($equipeDefaite->score) 
    	];
    	
    	$this->result->updateResultat($equipeVictoire->id, $idpoule, $updateQueryData);

    	//getresultat Equipe Defaite 
    	$dataDefaite = $this->result->recupereResultat($equipeDefaite->id,$idpoule);
    	foreach ($dataDefaite as $defaite)
    	{
    		$getV = $defaite->v;
    		$getD = $defaite->d;
    		$getPoints = $defaite->points;
    		$getEncaisse = $defaite->scoreencaisse;
    		$getCumule = $defaite->scorecumule;
    		$getDifference = $defaite->differencepoint;
    	}
    	$updateQueryDefaite = [
    		'd' => intval($getV) + 1,
    		'points' => intval($getPoints) + 1,
    		'scoreencaisse' => $equipeVictoire->score,
    		'scorecumule' => $equipeDefaite->score,
    		'differencepoint' => intval($equipeDefaite->score) - intval($equipeVictoire->score)
    	];
    	$this->result->updateResultat($equipeDefaite->id, $idpoule, $updateQueryDefaite);
    	return true;
    }
    /** 
    * fonction affichage des positionnements par Poule
    * @param null
    * @return null
    */

    //... code ...

    /**
    * fonction classification score de deux equipes
    * @param integer idequipe , string requete
    * @return Array
    */
    public function classificationScore($idequipe, array $tableauScore)
    {
    	$score = [];
    	if( array_key_exists($idequipe, $tableauScore) )
    	{
    		$score['cumule'] = $tableauScore[$idequipe];
    	}
    	foreach( $tableauScore as $key => $valeur )
    	{
    		if( $key != $idequipe )
    			$score['encaisse'] = $valeur;
    	}
    	$score['differencepoint'] = $score['cumule'] - $score['encaisse'];
    	return $score;
    }

}
