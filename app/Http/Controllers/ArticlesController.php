<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Article;
use App\Image;
use App\ProduitsPhoto;
//use DB;

use App\Http\Requests\UploadRequest;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function ind()
    {
        
        return view('welcome');
            
    }

    public function upload(Request $request){
    	$files = $request->file('file');

    	if(!empty($files)):

    		foreach($files as $file):
    			Article::put($file->getClientOriginalName(), file_get_contents($file));
    		endforeach;

    	endif;

    	return \Response::json(array('success' => true));
    }


/**----------------------------------------------poir l'insert fichier --------------------------------*/

public function uploadForm()
{
    return view('articles.imageupload');
}

public function uploadSubmit(Request $request)
{
    $produit = Image::create($request->all());
    foreach ($request->photos as $photo) {
        $filename = $photo->store('photos');
        ProduitsPhoto::create([
            'photo_id' => $produit->id,
            'nomfoto' => $filename
        ]);
    }

}

/*---------------------------------------------------------------------------------------------------------*/

/*---------------------------------------------PUBLICATION--------------------------------------------------*/

public function publication(Request $request,$id)
{
    //dd($id);
    $article = Article::find($id);
    $article->statut = true;
    $article->save();
    
    return redirect()->route('index')->with('success','L\'article est publié');
}


/*------------------------------------------FIN PUBLICATION------------------------------------------------*/




    
     public function index()
    {
        $articles = Article::paginate(5);
        
        return view('articles.index',compact('articles'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    
     public function create()
    {
        return view('articles.create');
        
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {

         /*------------------insertion d'image---------------------*/
         
         $produit = Image::create($request->all());
         foreach ($request->photos as $photo) {
             $filename = $photo->store('photos');
             ProduitsPhoto::create([
                 'photo_id' => $produit->id,
                 'nomfoto' => $filename
             ]);
         }    
         /*------------------Fin insertion----------------------- */
     
         $insert=$this->validate($request,[
            'titre'=>'required',
            'contenu'=>'required',
            'tag'=>'required',
            'slug'=>'required',
            'seo'=>'required',
            
            'administrateurs_id'=>'required'
        ]);
        
        $insert["images_id"] = $produit->id ;
        

        Article::create($insert);  
        return redirect()->route('index')
        ->with('success','article créer avec succes');
    }

    
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
     public function show($id)
    {
        $article = Article::find($id);
        
        $image = DB::table('images')
                    ->select('produits_photos.nomfoto')
                    ->join('produits_photos','images.id','=','produits_photos.photo_id')
                    ->where('images.id',$article->images_id)->get();

       
        
        return view('articles.show',compact('article','image'));

    }

    
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
     public function edit($id)
    {
        $article = Article::find($id);

        $image = DB::table('images')->select('produits_photos.nomfoto')->join('produits_photos','images.id','=','produits_photos.photo_id')->where('images.id',$article->images_id)->get();

        $img = DB::table('images')->select('urlimage')->where('images.id',$article->images_id)->get();
        $images = Image::find($article->images_id);

        return view('articles.edit',compact('article','image','images','img','id'));
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

        $article = Article::find($id);

        $image = DB::table('images')
            ->select('produits_photos.nomfoto')
            ->join('produits_photos','images.id','=','produits_photos.photo_id')
            ->where('images.id',$article->images_id)->get();

/**--------------------debut update image--------------------------- */

            $photo = Image::find($article->images_id);
            $photo->urlimage = $request->urlimage;
            $photo->save();


            $nbr=count($image);
            $articleim=count($article->photos);
            if($nbr < $articleim)
            {

                $produit = Image::create($request->all());
                foreach ($request->photos as $photo) {
                    $filename = $photo->store('photos');
                    ProduitsPhoto::create([
                        'photo_id' => $produit->id,
                        'nomfoto' => $filename
                    ]);
                }


            }

/**--------------------fin update image-------------------- */

        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->tag = $request->tag;
        $article->slug = $request->slug;
        $article->seo = $request->seo;
        
        $photo->id = $request->images_id;

        $article->save();
        
        return redirect()->route('index')->with('success','Article modifié avec succes');
        
    }

    
    
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
     public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->route('index')->with('success','Article supprimé');
        
    }



}
