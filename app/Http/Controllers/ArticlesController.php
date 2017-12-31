<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Article;
use App\Image;

use File;

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
    
/*
    $this->validate($request, ['photos' => 'image|mines:jpeg,png,jpg,gif,svg|max:10000|nullable']);
  */

  $input=$request->all();
  $images=array();
  
  if($files=$request->file('photos')){
    $i = 0; 
    foreach($files as $file){ 
        $name=$file->getClientOriginalName(); 
        $file->move('app/photos',$name); 
        $images[$i++]=$name; 
    }
  }

  DB::table('images')->insert(array(
    'urlimage'=>  implode("|",$images),
    'urlvideo'=>$request->urlvideo,
    'updated_at' => date('Y-m-d H:i:s'),
    'created_at' => date('Y-m-d H:i:s')
  ));
}
/*    'updated_at' => date('Y-m-d H:i:s')
    'created_at' => date('Y-m-d H:i:s') */
/*---------------------------------------------------------------------------------------------------------*/

/*---------------------------------------------PUBLICATION--------------------------------------------------*/

public function publication(Request $request,$id)
{

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

         $input=$request->all();
         $images=array();
         
         if($files=$request->file('photos')){
           $i = 0; 
           foreach($files as $file){ 
               $name=$file->getClientOriginalName(); 
               $file->move('app/photos',$name); 
               $images[$i++]=$name; 
           }
         }
       
         DB::table('images')->insert(array(
            'urlimage'=>  implode("|",$images),
           'urlvideo'=>$request->urlvideo,
           'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
         ));

         
         $img = Image::where('urlimage',implode("|",$images))->first();
         
    
         /*------------------Fin insertion----------------------- */

         $insert=$this->validate($request,[
            'titre'=>'required',
            'contenu'=>'required',
            'tag'=>'required',
            'slug'=>'required',
            'seo'=>'required',
            'administrateurs_id'=>'required'
        ]);

        

        $insert["images_id"] = $img->id;
        $insert["statut"] = false;
        $insert["archive"] = false;

        Article::create($insert);  
        
        return redirect()->route('index')->with('success','article créer avec succes');
        
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

        $images = Image::where('id',$article->images_id)->first();

        return view('articles.show',compact('article','images','id'));

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

        $images = Image::where('id',$article->images_id)->first();

        return view('articles.edit',compact('article','images','id'));

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
            ->select('images.urlimage')
            ->where('images.id',$article->images_id)->get();

/**--------------------debut update image--------------------------- */

                $input=$request->all();
                $images=array();

                if($files=$request->file('photos')){
                    $i = 0; 
                    foreach($files as $file){ 
                        $name=$file->getClientOriginalName(); 
                        $file->move('app/photos',$name); 
                        $images[$i++]=$name; 
                    }
                }

            $photo = Image::find($article->images_id);
            $photo->$image = $request->$images;
            $photo->save();


            

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
    
    
    
     public function destroy(Request $request,$id)
    {

        $article = Article::find($id);
        $article->archive = true;
        $article->save();
        
        return redirect()->route('index')->with('success','Article supprimé et Archivé');

    }



}
