<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imagefond;
use App\Article;
use App\Image;

use File;

use App\Http\Requests\UploadRequest;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ImagePubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

/**------------------------------------------------------FOND DU SITE--------------------------------------------------- */
    public function fond()
    {
        
        $image =Imagefond::paginate(4);

        return view('articles.imagefond',compact('image'))->with('i', (request()->input('page', 1) - 1) * 4);

    }

    public function insertimages(Request $request)
    {
        
        
        
        $files1=Input::file('photos1');
        $files2=Input::file('photos2');
        
        if(!is_null($files1))
        {

              $name1=$files1->getClientOriginalName(); 
              $files1->move('app/photos',$name1); 
              //$desc = $request->description1;

              DB::table('imagefonds')->insert(array(
                'description'=>$request->description1,
                'numfond'=>'1',
                'statut'=>false,
                'url'=> $name1,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')

              ));
            return redirect()->route('fond')->with('success','Image inseré!! ');              
        }
        
        if(!is_null($files2))
        {

              $name2=$files2->getClientOriginalName(); 
              $files2->move('app/photos',$name2); 


              DB::table('imagefonds')->insert(array(
                'description'=>$request->description2,
                'numfond'=>'2',
                'statut'=>false,
                'url'=> $name2,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
              ));
              return redirect()->route('fond')->with('success','Image inseré!! ');
        }
        
        else 
        {
            return redirect()->route('fond')->with('warning','pas d\'Image selectionné!! ');
        }


        return redirect()->route('fond')->with('success','Image inseré!! ');
    }


    public function publication(Request $request, $id)
    {
        
        $img = Imagefond::find($id);

        $fn2 = DB::table('imagefonds')->select('numfond')->where('numfond','2')->get()->count();
        $fn1 = DB::table('imagefonds')->select('numfond')->where('numfond','1')->get()->count();

        $statm = DB::table('imagefonds')->select('statut')->where('statut',true)->get()->count();
        $statf = DB::table('imagefonds')->select('statut')->where('statut',false)->get()->count();
        //dd($img);
        
        if($img->statut == false)
        {
            $img->statut = true;
            $img->save();
            return redirect()->route('fond')->with('success','L\'image est publié');
        }
        else
        {
            $img->statut = false;
            $img->save();
        }
        
        
        
        return redirect()->route('fond');
    }



    public function destroy($id)
    {
        $imdel = Imagefond::find($id);
        $image = DB::table('imagefonds')->select('imagefonds.url')->where('imagefonds.id',$id)->first()->url;
        
        File::delete("../../app/photos/$image");
        
        Imagefond::destroy($id);


                
        return redirect()->route('fond')->with('warning','Image supprimée!');

    }


/**------------------------------------------------------FIN FOND DU SITE--------------------------------------------------- */


}
