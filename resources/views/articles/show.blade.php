@extends('back')

@section('content')


<div class="col-md-6">
    <div class="alert alert-dark" role="alert">
        <h2 class="alert-heading">{{$article->titre}}</h2>

        <p>{{$article->contenu}}.</p>
    </div>
</div>


                  <!--===========================SLIDE PHOTO========================-->

<div class="col-md-6">
<!-- Wrapper for slides -->
<!--Panel with Header-->
     <!--===================================================-->
        <div class="panel">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="height:400px;">
            
                    @foreach($image as $key => $images)
                    
                        <div class="item{{$key == 0 ? ' active' : ''}}">
                        
                            <img src="../../app/{{$images->nomfoto}}" alt="...">
                        
                        </div>
                    
                    @endforeach                
            
                    </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
    </div>
    <!--============================FIN SLIDE PHOTO=======================-->
    <!--End Panel with Header-->
    <!-- Controls -->


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>
            </div>
        </div>
    </div>

</div>


@endsection