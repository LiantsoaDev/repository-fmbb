@extends('back')

@section('content')

<div class="pad-btm form-inline">
    <div class="row">
        <div class="col-sm-6 table-toolbar-left">
            <div class="btn-group">
            <a class="btn btn-primary btn-labeled fa fa-plus-circle" href="{{ route('create') }}">Ajouter Article</a>
            </div>
            <div class="btn-group">
            <a class="btn btn-info btn-labeled fa fa-plus-circle" href="{{ route('uploadimage') }}">Ajouter Fichier</a>
            </div>
        </div>
    </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif


        <div class="col-sm-6 table-toolbar-right">
            <!--<div class="form-group">
                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                    </div>
                        <div class="btn-group">
                            <button class="btn btn-default"><i class="fa fa fa-cloud-download"></i></button>
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                             <i class="fa fa-cog"></i>
                             <span class="caret"></span>
                            </button>
                                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        <div class="table-responsive">


<table class="table table-striped">
   <thead>
        <tr>
            <th>Réference</th>
            <th>Titre</th>
            <th>tag</th>
            <th>Date d'insertion</th>
            <th>Seo</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td> {{ $article->titre }} </td>
            <td>{{ $article->tag }}</td>
            <td><span class="text-muted"><i class="fa fa-clock-o"></i>{{ $article->created_at }}</span></td>
            <td>{{ $article->seo }}</td>
            <td>
                <div class="label label-table label-success">{{ $article->statut }}</div>
            </td>
            <td>
                <a class="btn btn-info btn-icon icon-lg fa fa-pencil"  href="{{ route('edit',$article->id) }}"></a>
                <a class="btn btn-mint btn-icon icon-lg fa fa-eye" href="{{ route('show',$article->id) }}"></a>
                <a class="btn btn-danger btn-icon icon-lg fa fa-trash" href="{{ route('delete',$article->id) }}"></a>            
                
                
             </td>
             </tr>
@endforeach

         </tbody>
    </table>
    {{ $articles->links() }}                                  

</div>

@endsection