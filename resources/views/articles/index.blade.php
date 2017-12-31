@extends('back')

@section('content')


            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <div class="btn-group">
                        <a class="btn btn-primary btn-labeled fa fa-plus-circle" href="{{ route('create') }}">Ajouter Article</a>
                        </div>
                    </div>
                </div>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif


                    <div class="col-sm-6 table-toolbar-right">
                    
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
                        <th>Seo</th>
                        <th>Date d'insertion</th>
                        <th>Statuts</th>
                        <th>Publication</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)

                    @if($article->archive == 0)
                        <tr>
                            <td>{{ $article->id }}</td>
                            
                            <td> {{ $article->titre }} </td>
                            
                            <td>{{ $article->tag }}</td>
                            
                            <td>{{ $article->seo }}</td>
                            
                            <td><span class="text-muted"><i class="fa fa-clock-o"> </i>  {{ $article->created_at->format('d-m-Y') }}</span></td>
                            
                            <td>
                                
                                <div>
                                    @if($article->statut == 1)
                                    <span class="label label-table label-mint">Publié</span>
                                    @elseif($article->statut == 0)
                                    <span class="label label-table label-dark">En attente..</span>
                                    @endif
                                </div>

                            </td>
                            
                            <td>
                                @if($article->statut == 0)
                                    <a class="label label-table label-success" href="{{ route('publication',$article->id) }}">Publier</a>
                                @elseif($article->statut == 1)
                                <span class="label label-table label-default">Publier</span>
                                @endif
                            </td>

                            <td>
                                <a class="btn btn-info btn-icon icon-lg fa fa-pencil"  href="{{ route('edit',$article->id) }}"></a>
                                <a class="btn btn-mint btn-icon icon-lg fa fa-eye" href="{{ route('show',$article->id) }}"></a>
                                <a class="btn btn-danger btn-icon icon-lg fa fa-trash" href="{{ route('delete',$article->id) }}"></a>                    
                            </td>
                            
                        </tr>
                    @else
                    
                    @endif

                     @endforeach

                    </tbody>
                </table>
                {{ $articles->links() }}                                  

            </div>
        
        <!--========================================================Fin Article=========================================================-->

@endsection