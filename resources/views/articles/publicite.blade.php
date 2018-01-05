@extends('back')

@section('content')


      <!--========================================== /Upload image/  ========================================================================-->
                            
                                    <!-- Panel heading -->
                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>  
                                    @endif

                                    <div class="panel-heading">
                                        <h3 class="panel-title">PUBLICITE</h3>
                                    </div>
                <form action="{{ route('insertpub') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        
                        
                        
                        
                        <div class="row">
                            <!--Tooltips-->
                            <!--===================================================-->
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Formulation du Publicité :</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label"> Description : </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="description" type="text" placeholder="Titre" data-parsley-range="[4, 10]" data-parsley-group="order" data-parsley-required />
                                        </div>
                                    </div>
    </br></br>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Numéro Pub : </label>
                                        <div class="col-sm-6">
                                        <select class="form-control" name="numpub">
                                              
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                              
                                            </select>
                                        </div>
                                    </div>
    </br></br>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Contenu : </label>
                                        <div class="col-sm-6">
                                        <textarea id="demo-textarea-input" rows="3" class="form-control" name="contenu" placeholder="Contenue..."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    </br></br>
                                        <div class="col-md-12">
                                        </br>
                                                    <input type="file" class="form-control" id="images" name="photos[]" onchange="preview_images();" multiple/>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                                
                                <div class="panel">
                                  
                                </div>
                                
                            </div>
                            <!--===================================================-->
                            <!--POPOVERS-->
                            <!--===================================================-->
                            <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Liste de Publicité</h3>
                                    </div>
                                    <div class="panel-body">
                                       
                                       
                                       <!--========================table de la publicité=======================-->

                                       <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Num Pub</th>
                                                    <th>Titre</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                    <th>Suppr</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        @foreach($pub as $pubs)
                                                <tr>
                                                    <td>Pub N°: {{$pubs->numpub}}</td>
                                                    <td>{{$pubs->description}}</td>

                                                    @if($pubs->statut == 0)
                                                        <td><span class="label label-dark">En attente..</span></td>
                                                        <td><a class="btn btn-primary btn-icon icon-lg fa fa-share"  href="{{ route('publierpub',$pubs->id) }}"></a></td>
                                                    @elseif($pubs->statut == 1)
                                                        <td><span class="label label-mint">Publié</span></td>
                                                        <td><a class="btn btn-info btn-icon icon-lg fa fa-reply"  href="{{ route('publierpub',$pubs->id) }}"></a></td>
                                                    @endif

                                                    <td> <a class="btn btn-danger btn-icon icon-lg fa fa-remove" href="{{ route('supprpub',$pubs->id) }}"></a></td>
                                                </tr>
                        @endforeach                    
                                            </tbody>
                                        </table>

                                       <!--====================================================================-->


                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Aperçue:</h3>
                                    </div>
                                    <div class="panel-body">

                                        <div class="row" id="image_preview"></div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                    
                                    </div>
                                    <div class="panel-body">
                                     
                                <div class="col-lg-12">
                                    <div class="panel">
                                            <div class="panel-heading">
                                                        <button class="btn btn-block btn-success">
                                                            Ajouter Publicité
                                                        </button>
                                            </div>
                                    </div>
                                </div>


                            </div>


                        </div>


                </form>
  <!--========================================== /Fin Upload image/  ========================================================================-->


@endsection