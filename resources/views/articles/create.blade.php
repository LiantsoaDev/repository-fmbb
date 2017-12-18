@extends('back')

@section('content')


<form class="form-horizontal form-bordered" action="{{ route('store') }}" id="wizard-validate" method="POST">

<input type="hidden" value="{!!csrf_token()!!}" name="_token" />

                                    <!-- Panel heading -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ajout Articles</h3>
                                    </div>
                                    <div class="panel-body">
                                            <!-- Wizard Container 1 -->
                                        
                                            <!--<div class="wizard-container">-->
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Titre : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="titre" type="text" placeholder="Titre" data-parsley-range="[4, 10]" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Contenu : </label>
                                                    <div class="col-sm-6">
                                                    <textarea id="demo-textarea-input" rows="5" class="form-control" name="contenu" placeholder="contenu ici.."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Tag : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="tag" type="text" id="passwordinput" placeholder="Tag" data-parsley-minlength="6" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Slug : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="slug" type="text" placeholder="Slug.." data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Seo : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="seo" type="text" placeholder="Seo" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>

                                                <!--<div class="form-group">
                                                    <label class="col-sm-2 control-label"> Statut de l'article : </label>
                                                    <div class="col-sm-6">-->
                                                        <!-- Default Bootstrap Select -->
                                                        <!--===================================================-->
                                                       <!-- <select class="form-control selectpicker" data-style="btn-purple">
                                                            <option>En cours...</option>
                                                            <option>Publié</option>
                                                        </select>-->
                                                        <!--===================================================-->
                                                   <!-- </div>
                                                </div>-->

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Administrateur : </label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control" name="administrateurs_id" type="text" placeholder="Admin" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Images : </label>
                                                    <!--<div class="col-sm-6">
                                                        <input class="form-control" name="images_id" type="text" placeholder="Image" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                                                    </div>-->
                                                    <div class="col-sm-6">

                                                        <select name="images_id" id="images_id" class="selectpicker" data-style="select-with-trasition" title="Selectionner Image">
                                                        
                                                            @foreach($classname_array as $data)
                                                                <option >{{ $data->id }}</option>
                                                            @endforeach
                                                        
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    
                                                    <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success btn-icon  icon-lg fa fa-save">  Enregistrer</button>
                                                    </div>

                                                    <div class="pull-right">
                                                        <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>
                                                    </div>
                                                </div>
                                        
                                        <div class="panel-body">
                                                
                                        </div>
                                        


</form>



@endsection