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
                 <h3 class="panel-title">Tooltips on Text</h3>
             </div>

             @foreach($information as $info)

             <div class="panel-body">
                    <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-mint">
                                        <img src="{{LINK}}/images/{{$info->logoequipeA}}" alt="avatar">
                                        <div class="name osLight"> {{$info->sigleA}} </div>
                                         <div class="col-sm-3 pull-right"><h1>100<small>pts</small></h1></div>
                                    </div>
                                    <div class="title"> {!!$info->nomequipeA!!} </div>
                                    <div class="address"> Los Angeles, CA, USA </div>
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
                                    <div class="avatar bg-mint">
                                        <img src="{{LINK}}/images/{{$info->logoequipeB}}" alt="avatar">
                                        <div class="name osLight"> {{$info->sigleB}} </div>
                                         <div class="col-sm-3 pull-right"><h1>89<small>pts</small></h1></div>
                                    </div>
                                    <div class="title"> {!!$info->nomequipeB!!} </div>
                                    <div class="address"> Los Angeles, CA, USA </div>
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
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button class="btn btn-success btn-labeled fa fa-check">En cours</button>
                            <button class="btn btn-default btn-labeled fa fa-exclamation-triangle">Terminer</button>
                            <button class="btn btn-warning btn-labeled fa fa-times">Reporter</button>
                            <button class="btn btn-mint btn-rounded btn-labeled fa fa-pencil">Score</button>
                        </div>
                    </div>
                 </div><!-- panel-bofy -->

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
                    <a href="#" class="list-group-item list-group-item-success disabled">Phase de Poule/Groupe</a>
                    <a href="#" class="list-group-item list-group-item-info">Quart de finale</a>
                    <a href="#" class="list-group-item list-group-item-warning">Demi finale</a>
                    <a href="#" class="list-group-item list-group-item-danger">Final</a>
                </ul>
            </div>
        </div>
    </div>


</div>     

@include('admin.footer-match')