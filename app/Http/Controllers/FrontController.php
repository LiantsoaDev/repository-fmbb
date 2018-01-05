<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fond1 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut',true)->where(DB::raw('imagefonds.numfond'),'1')->first()->url;
        
        $fond2 = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.statut', true)->where(DB::raw('imagefonds.numfond'),'2')->first()->url;

        /**------------------------------------------------article---------------------------------------- */
       
        $article = Article::where('statut',true)->get();
        
       
            foreach($article as $articles)
        {

            $articles->images_id = DB::table('images')->select('images.urlimage')->where('images.id', $articles->images_id)->first();
        
        }

        /**------------------------------------------------------------------------------------------------ */

        /**----------------------------------------------PUBLICITE----------------------------------------- */

        $pub1 = Publicite::where('statut',true)->where('numpub','1')->get();

        $pub1url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'1')->first(); 


        $pub2 = Publicite::where('statut',true)->where('numpub','2')->get();

        $pub2url = DB::table('publicites')->select('publicites.url')->where('publicites.statut',true)->where(DB::raw('publicites.numpub'),'2')->first();

        /**----------------------------------------------------------------------------------------------- */
        return view('front',compact('article','fond1','fond2','pub1','pub1url','pub2','pub2url'));

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
    public function show($id)
    {
        //
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
