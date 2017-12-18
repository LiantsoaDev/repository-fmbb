@extends('back')

@section('content')

<form class="form-horizontal form-bordered" action="{{ route('update', $id) }}" method="POST">
{!!csrf_field()!!}
<input type="hidden" value="post" name="_method" />


     <!-- Wizard Container 1 -->
        <div class="wizard-title"> Editer Articles </div>
            <div class="wizard-container">
               <div class="form-group">
                    <div class="col-md-12">
                                                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Titre : </label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="titre" value="{{$article->titre}}" data-parsley-range="[4, 10]" data-parsley-group="order" data-parsley-required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Contenu : </label>
                    <div class="col-sm-6">
                      <textarea id="demo-textarea-input" rows="5" class="form-control" name="contenu" value="">{{$article->contenu}}</textarea>
                    </div>
                </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Tag : </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" id="passwordinput" name="tag" value="{{$article->tag}}" data-parsley-minlength="6" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> Slug : </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="slug" value="{{$article->slug}}" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> Seo : </label>
                <div class="col-sm-6">
                    <input class="form-control"  type="text" name="seo" value="{{$article->seo}}" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label"> Images : </label>
                <div class="col-sm-6">
                    <select name="images_id" id="images_id" class="selectpicker" data-style="select-with-trasition" title="{{$article->images_id}}">
                                                            
                        @foreach($classname_array as $data)
                            <option>{{ $data->id }}</option>
                        @endforeach
                                                            
                    </select>
                </div>

            </div>


            <div class="form-group">
                                                    
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-icon icon-lg fa fa-archive">  Valider</button>
                </div>
                                                


                <div class="pull-right">
                    <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>
                </div>
            </div>
        </div>
</form>

@endsection