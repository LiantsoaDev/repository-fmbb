@include('admin.header-match')

<div id="page-content">
<!-- ajouter nouveau match -->
<div class="col-md-8">
	<div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Ajout d'un nouveau match</h3>
        </div>
        <div class="panel-body">
        <!--Dismissible popover-->
        <a href="{{ route('admin.addmatch') }}" class="btn btn-md btn-warning add-popover" data-original-title="Bootstrap Popover" data-content="Ajout d\'un nouveau match de basketball dans le système" data-placement="top" data-trigger="focus" data-toggle="popover">Ajouter un match</a>
        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        </div>
    </div>
</div>
<!-- end ajout nouveau match -->      

<div class="col-md-8">
         <div class="panel">
             <div class="panel-heading">
                 <h3 class="panel-title"> <b>{{ucfirst($information->encours)}}</b> </h3>
             </div>

             @foreach($information as $info)

             <div class="panel-body">
                    <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-{{$color}}">
                                        <img src="{{LINK}}/images/{{$info->teamA->LOGOURL}}" alt="avatar">
                                        <div class="name osLight"> {{$info->teamA->SIGLE}} </div>
                                         <div class="col-sm-3 pull-right"><h1>100<small>pts</small></h1></div>
                                    </div>
                                    <div class="title"> {!!$info->teamA->NAME!!} </div>
                                    <div class="address"> {{$info->teamA->REGION}} </div>
                                    <ul class="fullstats">
                                        <li> <span>0</span>Victoires </li>
                                        <li> <span>0</span>Défaites </li>
                                        <li> <span>0</span>Points </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-{{$color}}">
                                        <img src="{{LINK}}/images/{{$info->teamB->LOGOURL}}" alt="avatar">
                                        <div class="name osLight"> {{$info->teamB->SIGLE}} </div>
                                         <div class="col-sm-3 pull-right"><h1>89<small>pts</small></h1></div>
                                    </div>
                                    <div class="title"> {!!$info->teamB->NAME!!} </div>
                                    <div class="address"> {{$info->teamB->REGION}} </div>
                                    <ul class="fullstats">
                                        <li> <span>0</span>Victoires </li>
                                        <li> <span>0</span>Défaites </li>
                                        <li> <span>0</span>Points </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
					</div>

                    <div class="row">
                         <div class="text-semibold pad-hor">
                            <h4>
                                <i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d-m-Y',strtotime($info->datematch)) }} - 
                                <i class="fa fa-clock-o"></i> {{ $info->heurematch }} - 
                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $info->lieumatch }}
                            </h4> 
                        </div>
                    </div>

					 <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button class="btn btn-warning btn-labeled fa fa-share">Reporter</button>
                            <button class="btn btn-mint btn-rounded btn-labeled fa fa-pencil">Mettre à jour score</button>
                        </div>
                    </div>



                 </div><!-- panel-body -->

            @endforeach

             </div><!-- panel -->   
	</div><!-- col-md-8 -->

    <div class="col-md-4 sticky-top">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"> Listes des phases de l'événement </h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <a href="#" class="list-group-item list-group-item-success disabled"><h5>Phase de Poule/Groupe</h5></a>
                    <a href="#" class="list-group-item list-group-item-info"><h5>Quart de finale</h5></a>
                    <a href="#" class="list-group-item list-group-item-warning"><h5>Demi finale</h5></a>
                    <a href="#" class="list-group-item list-group-item-danger"><h5>Final</h5></a>
                </ul>
            </div>
        </div>
    </div>


</div>     

@include('admin.footer-match')