<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
use App\Article;
use App\Image;
use App\ImageFond;
use App\Publicite;

use File;

use App\Http\Requests\UploadRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    private $image;

    public function __construct()
    {
        $this->image = new Image();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fond1 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut',true)->where(DB::raw('imagefonds.numfond'),'1')->first()->url;
        
        $fond2 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut', true)->where(DB::raw('imagefonds.numfond'),'2')->first()->url;

        /**------------------------------------------------ARTICLES---------------------------------------- */
       
        //pour les anciennent articles
        $count = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('articles.statut',true)->where('articles.archive',false)->orderBy('created_at', 'desc')->count();
      
        $article = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('articles.statut',true)->where('articles.archive',false)->orderBy('created_at', 'desc')->limit(4,$count)->offset(4)->get();
       
        foreach($article as $url)
                        {
                            $ty = explode('|',$url->urlimage);
                            $url->urlimage = $ty[0];
                        }
                        
        //fin pour les anciennent articles


        $select = DB::table('articles')->where('statut',true)->where('archive',false)->orderBy('created_at', 'desc')->get()->toArray();

/*Pour 4 nouvelles affichages------------------------------------- */

            $article4 = DB::table('articles')
                        ->join('images','articles.images_id','=','images.id')
                        ->select('articles.*', 'images.urlimage')
                        ->where('articles.statut',true)
                        ->where('articles.archive',false)
                        ->orderBy('created_at', 'desc')
                        ->limit(4)->get();


                        foreach($article4 as $url)
                        {
                            $ty = explode('|',$url->urlimage);
                            $url->urlimage = $ty[0];
                        }

/*Fin Pour 4 nouvelles affichages------------------------------------- */


/*Debut Article du mois-----------------------------------------------*/

                    $currentMonth = date('m');
                    $i=0;
                        $artMois = DB::table('articles')->join('images','articles.images_id','=','images.id')
                        ->select('articles.*', 'images.urlimage')
                        ->where('articles.statut',true)
                        ->where('articles.archive',false)
                        ->whereRaw('MONTH(articles.created_at) = ?',[$currentMonth])
                        ->orderBy('created_at', 'asc')
                        
                        ->get();

                        foreach($artMois as $url)
                        {
                            $ty = explode('|',$url->urlimage);
                            $url->urlimage = $ty[0];
                        }
  

/*Fin Article du mois-----------------------------------------------*/

            

//affichage du premier image
        $slt = DB::table('articles')->where('statut',true)->where('archive',false)->orderBy('created_at', 'desc')->limit(4)->get();
        
        foreach($slt as $imageids)
        {
            $arrayid[] = $imageids->images_id;
        }
        
        $getimage = $this->image->getimagebyArrayId($arrayid);

        foreach($getimage as $get)
        {
            $prime = explode('|',$get->urlimage);
            $img1[] = $prime[0];
        }
     

        //Fin Quatre premiers articles du journaux

            foreach($article as $articles)
        {

            $articles->images_id = DB::table('images')->select('images.urlimage')->where('images.id', $articles->images_id)->first();
        
        }

        /**--------------------------------------------Fin ARTICLES----------------------------------------- */




        /**----------------------------------------------PUBLICITE----------------------------------------- */

        $pub1 = Publicite::where('statut',true)->where('numpub','1')->get();

        $pub1url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'1')->first(); 


        $pub2 = Publicite::where('statut',true)->where('numpub','2')->get();

        $pub2url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'2')->first();

        /**----------------------------------------------------------------------------------------------- */
        return view('frontjers.pages.front',compact('article','fond1','fond2','pub1','pub1url','pub2','pub2url','select'
        ,'img1','slt','article4','artMois'
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showarticles($id)
    {
        
        $article = Article::find($id);
        $images = Image::where('id',$article->images_id)->first();
       
        //article tout sur affichage
            $artout = DB::table('articles')->join('images','articles.images_id','=','images.id')->select('articles.*', 'images.urlimage')->where('articles.statut',true)->where('articles.archive',false)->orderBy('created_at', 'asc')->get();

            foreach($artout as $url)
            {
                $ty = explode('|',$url->urlimage);
                $url->urlimage = $ty[0];
            }
        //Fin article tout sur affichage
        
        $fond1 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut',true)->where(DB::raw('imagefonds.numfond'),'1')->first()->url;
        $fond2 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut', true)->where(DB::raw('imagefonds.numfond'),'2')->first()->url;

        return view('frontjers.pages.articleshow',compact('fond2','fond1','article','images','id','artout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
