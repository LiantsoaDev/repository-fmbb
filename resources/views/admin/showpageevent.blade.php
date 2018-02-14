@include('admin.header-match')

<section id="page-content">
	<!-- ajouter nouveau match -->
	<div class="col-md-8">

        @include('admin.notification')

		<div class="panel">
	        <div class="panel-heading">
	            <h3 class="panel-title">Ajout d'un nouveau événement/Compétition </h3>
	        </div>
	        <div class="panel-body">
	        <!--Dismissible popover-->
	        <a href="{{ route('add.event') }}" class="btn btn-default btn-labeled fa fa-plus add-popover" data-original-title="Bootstrap Popover" data-content="Ajout d'un nouveau évenement de basketball dans le système" data-placement="top" data-trigger="focus" data-toggle="popover">Ajouter un évenement</a>
            <a href="{{ route('admin.addmatch') }}" class="btn btn-default btn-labeled fa fa-folder-o add-popover pull-right" data-original-title="Bootstrap Popover" data-content="Ajout d'un nouveau match de basketball dans le système" data-placement="top" data-trigger="focus" data-toggle="popover">Ajouter un match indépendant</a>
	        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	        </div>
	    </div>
	</div>
	<!-- end evenement -->
	
    <div class="row">
                            <div class="col-md-10">
                                <div class="panel">
                                    <div class="panel-body np">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base mar-no">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> Championnat </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2"> Coupe </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-3"> Ligue</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">Logo Evenement</th>
                                                                <th>Evenement</th>
                                                                <th>Date de début</th>
                                                                <th>Date fin</th>
                                                                <th>Statut</th>
                                                                <th>Détails</th>
                                                                <th>Calendrier</th>
                                                                <th>Modification</th>
                                                                <th class="hidden-xs">Progression</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $tab = ['primary','success','info','warning','danger'];
                                                            @endphp
                                                            @foreach($Championnat as $chmps)
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="media-object center"> <img src="../images/{{$chmps->urlogoevent}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{{ $chmps->libellevent }}</td>
                                                                <td>{{ date('d M Y',strtotime($chmps->startday)) }}</td>
                                                                <td>{{ date('d M Y',strtotime($chmps->endday)) }}</td>
                                                                <td>
                                                                    <div class="label label-table label-{{$tab[rand(0,4)]}}"> {{ $chmps->statut }} </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('event.detail',$chmps->id)}}" class="btn btn-primary btn-labeled fa fa-eye">Voir Détail</a>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('admin.calendrier',$chmps->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Matchs</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('event.showupdate',$chmps->id)}}" class="btn btn-default btn-labeled fa fa-pencil">Modifier</a>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: {{$chmps->progression}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                                    <!--Hover Rows-->
                                                    @if(is_null($Coupe))
                                                        <div class="alert alert-danger" role="alert">
                                                          <h4 class="alert-heading">Notification!</h4>
                                                          <p>Aucun événement de type <code>COUPE</code>n'a été inséré ou assigné dans la base de donnée cette saison !<br>Commencer d'abord par insérer une compétition de type Coupe. Merci ! </p>
                                                        </div>
                                                    @else
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">Logo Coupe</th>
                                                                <th>Coupe</th>
                                                                <th>Date de début</th>
                                                                <th>Date fin</th>
                                                                <th>Statut</th>
                                                                <th>Détails</th>
                                                                <th>Calendrier</th>
                                                                <th>Modification</th>
                                                                <th class="hidden-xs">Progression</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $tab = ['primary','success','info','warning','danger'];
                                                            @endphp

                                                            @foreach($Coupe as $cup)
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="media-object center"> <img src="../images/{{$cup->urlogoevent}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{{ $cup->libellevent }}</td>
                                                                <td>{{ date('d M Y',strtotime($cup->startday)) }}</td>
                                                                <td>{{ date('d M Y',strtotime($cup->endday)) }}</td>
                                                                <td>
                                                                    <div class="label label-table label-{{$tab[rand(0,4)]}}"> {{ $cup->statut }} </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('event.detail',$cup->id)}}" class="btn btn-primary btn-labeled fa fa-eye">Voir Détail</a>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('admin.calendrier',$cup->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Matchs</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('event.showupdate',$cup->id)}}" class="btn btn-default btn-labeled fa fa-pencil">Modifier</a>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: {{$cup->progression}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <!--===================================================-->
                                                <!--End Hover Rows-->
                                                <div id="demo-lft-tab-3" class="tab-pane fade">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">Logo Ligue</th>
                                                                <th>ligue</th>
                                                                <th>Date de début</th>
                                                                <th>Date fin</th>
                                                                <th>Statut</th>
                                                                <th>Détails</th>
                                                                <th>Calendrier</th>
                                                                <th>Modification</th>
                                                                <th class="hidden-xs">Progression</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $tab = ['primary','success','info','warning','danger'];
                                                            @endphp
                                                            @foreach($Ligue as $league)
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="media-object center"> <img src="../images/{{$league->urlogoevent}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{{ $league->libellevent }}</td>
                                                                <td>{{ date('d M Y',strtotime($league->startday)) }}</td>
                                                                <td>{{ date('d M Y',strtotime($league->endday)) }}</td>
                                                                <td>
                                                                    <div class="label label-table label-{{$tab[rand(0,4)]}}"> {{ $league->statut }} </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('event.detail',$league->id)}}" class="btn btn-primary btn-labeled fa fa-eye">Voir Détail</a>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('admin.calendrier',$league->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Matchs</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('event.showupdate',$league->id)}}" class="btn btn-default btn-labeled fa fa-pencil">Modifier</a>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: {{$league->progression}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            </div>
                        </div>

</section>

@include('admin.footer-match')