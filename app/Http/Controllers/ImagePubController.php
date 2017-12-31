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
use App\Http\Controllers\Controller;

class ImagePubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function fond()
    {
        
        $image =Imagefond::paginate(5);

        return view('articles.imagefond',compact('image'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function insertimages(Request $request)
    {
        //$this->validate($request, ['photos' => 'image|mines:jpeg,png,jpg,gif,svg|max:10000|nullable']);
      
        $input=$request->all();
        $files1=$request->file('photos1');
        $files2=$request->file('photos2');
        
        if(!empty($files1) && empty($files2))
        {

              $name1=$files1->getClientOriginalName(); 
              $file->move('app/photos',$name1); 

              DB::table('imagefonds')->insert(array(
                'numpub'=>null,
                'numfond'=>'1',
                'statut'=>false,
                'url'=> $name1,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
              ));
              
        }
        
        elseif(empty($files1) && !empty($files2))
        {

              $name2=$files2->getClientOriginalName(); 
              $file->move('app/photos',$name2); 


              DB::table('imagefonds')->insert(array(
                'numpub'=>null,
                'numfond'=>'2',
                'statut'=>false,
                'url'=> $name2,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
              ));
        }
        
        else
        {

              $name1=$files1->getClientOriginalName(); 
              $name2=$files2->getClientOriginalName(); 
              $file1->move('app/photos',$name1); 
              $file2->move('app/photos',$name2); 


              DB::table('imagefonds')->insert(array(
                'numpub'=>null,
                'numfond'=>'1',
                'statut'=>false,
                'url'=> $name1,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
              ));

              DB::table('imagefonds')->insert(array(
                'numpub'=>null,
                'numfond'=>'2',
                'statut'=>false,
                'url'=> $name2,
                'updated_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
              ));
        }


        return redirect()->route('fond')->with('success','Image inseré!! ');
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
