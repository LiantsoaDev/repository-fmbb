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
                                        <h3 class="panel-title">Ajout Image de Publicité</h3>
                                    </div>
                                    <form action="{{ route('uploades') }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="nom">Description du/des Fichiers:</label>
                                                    <input type="text" name="urlvideo" placeholder="" />
                                                </div>

                                                <div class="col-md-6">
                                                    <input type="file" class="form-control" id="images" name="photos[]" onchange="preview_images();" multiple/>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="submit" class="btn btn-primary" name='submit_image' value="Uploader Image"/>
                                                </div>
                                                <div class="row" id="image_preview"></div>
                                        </div>
                                        <div class="pull-right">
                                           <!-- <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>-->
                                        </div>  
                                    </form>
  <!--========================================== /Fin Upload image/  ========================================================================-->


@endsection