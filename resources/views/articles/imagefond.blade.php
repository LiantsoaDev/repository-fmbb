@extends('back')

@section('content')

            <div class="row">
                        <div class="col-md-12">                    
                          <div class="panel">
                            <div class="panel-heading">
                                
                                <h3 class="panel-title">Liste de Fond existant</h3>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="panel-body">
                                <!-- Inline Form  -->
                                <!--===================================================-->
                                <form class="form-inline">
                                
                                
                                    <table class="table table-striped">
                                    <thead>
                                            <tr>
                                                <th>Réference</th>
                                                <th>Emplacement</th>
                                                <th>Date d'insertion</th>
                                                <th>Statuts</th>
                                                <th>Publication</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($image as $images)
                        
                                           
                                                <tr>
                                                    <td>{{ $images->id }}</td>
                                                    
                                                    @if($images->numfond == 1)
                                                    <td> Avant </td>
                                                    @elseif($images->numfond == 0)
                                                    <td> Derrière </td>
                                                    @endif

                                                    <td><span class="text-muted"><i class="fa fa-clock-o"> </i>  {{ $images->created_at->format('M j, Y') }}</span></td>
                                                    
                                                    <td>
                                                        
                                                        <div>
                                                            @if($images->statut == 1)
                                                            <span class="label label-table label-mint">Affiché</span>
                                                            @elseif($images->statut == 0)
                                                            <span class="label label-table label-dark">Non affiché..</span>
                                                            @endif
                                                        </div>
                        
                                                    </td>
                                                    
                                                    <td>
                                                        @if($images->statut == 0)
                                                            <a class="label label-table label-success" href="{{ route('publication',$images->id) }}">Publier</a>
                                                        @elseif($images->statut == 1)
                                                        <span class="label label-table label-default">Publier</span>
                                                        @endif
                                                    </td>
                        
                                                    <td>

                                                        <a class="btn btn-danger btn-icon icon-lg fa fa-trash" href="{{ route('delete',$images->id) }}"></a>                    
                                                    </td>
                                                    
                                                </tr>
                                           
                        
                                            @endforeach
                        
                                            </tbody>
                                        </table>
                                        {{ $image->links() }}                                  
                    
                                
                                </form>
                                <!--===================================================-->
                                <!-- End Inline Form  -->
                            </div>
                         </div>
                       </div>
                     </div>
                        <div class="row">
                            <div class="eq-height">
                                <div class="col-sm-6 eq-box-sm">
                                    <div class="panel">
                                        <div class="panel-heading">
                                           
                                            <h3 class="panel-title">Image Du Devant</h3>
                                        </div>
                                        <!--Block Styled Form -->
                                        <!--===================================================-->
                                        <form action="{{ route('insertimgpub') }}" method="post">
                                        <div class="form-horizontal">  
                                            {{ csrf_field() }}
                                            <div class="panel-body">
                                          
                                                    <div class="col-md-12">
                                                        <input type="file" class="form-control" id="images" name="photos1" onchange="preview_images();"/>
                                                    </div>

                                            </div>
                                            <div class="pull-right">
                                            <!-- <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>-->
                                            </div>
                                            </div>  
                                        <!--===================================================-->
                                        <!--End Block Styled Form -->
                                    </div>
                                </div>
                                <div class="col-sm-6 eq-box-sm">
                                    <div class="panel">
                                        <div class="panel-heading">

                                            <h3 class="panel-title">Image du Derrière</h3>
                                        </div>
                                        <!--Horizontal Form-->
                                        <!--===================================================-->
                                        <div class="form-horizontal">
                                            <div class="panel-body">
                                          
                                            <div class="col-md-12">
                                                <input type="file" class="form-control" id="images" name="photos2" onchange="preview_images();" />
                                            </div>
                                          
                                        </div>
                                        <div class="pull-right">
                                        <!-- <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>-->
                                        </div>
                                    </div>
                                    

                                        <!--===================================================-->
                                        <!--End Horizontal Form-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="form-inline">      
                                <div class="row" id="image_preview"></div>
                                        <div class="col-md-16">
                                                    <input type="submit" class="btn btn-primary" name='submit_image' value="Uploader Image"/>
                                        </div>
                                </div>        
                        </div>
                    </form>
@endsection