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
                                                                     <a href="{{route('admin.calendrier',$chmps->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Calendrier</a>
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
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice</th>
                                                                <th>Name</th>
                                                                <th class="text-center">Value</th>
                                                                <th class="hidden-xs">Delivery date</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Desktop</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 4,234k</small>
                                                                </td>
                                                                <td class="text-center">$250</td>
                                                                <td class="hidden-xs">2012/04/25</td>
                                                                <td>
                                                                    <div class="label label-table label-info">On Process</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Laptop</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 3,876k</small>
                                                                </td>
                                                                <td class="text-center">$350</td>
                                                                <td class="hidden-xs">2012/04/25</td>
                                                                <td>
                                                                    <div class="label label-table label-danger">Cancelled</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Tablet</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 45,678k</small>
                                                                </td>
                                                                <td class="text-center">$325</td>
                                                                <td class="hidden-xs">2012/04/25</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Shipped</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Order #53451</td>
                                                                <td>
                                                                    <span class="text-semibold">Smartphone</span>
                                                                    <br>
                                                                    <small class="text-muted">Last 7 days : 34,553k</small>
                                                                </td>
                                                                <td class="text-center">$250</td>
                                                                <td class="hidden-xs">2012/04/25</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--===================================================-->
                                                <!--End Hover Rows-->
                                                <div id="demo-lft-tab-3" class="tab-pane fade">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">&nbsp;</th>
                                                                <th>User ID</th>
                                                                <th>Date</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th class="hidden-xs">Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td> Semantha Armstrong </td>
                                                                <td>3 Jan, 2013</td>
                                                                <td>$239.85</td>
                                                                <td>
                                                                    <div class="label label-table label-info">Block</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td> Jonathan Smith </td>
                                                                <td>3 Jan, 2013</td>
                                                                <td>$239.85</td>
                                                                <td>
                                                                    <div class="label label-table label-danger">On Hold</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td> Jacob Armstrong </td>
                                                                <td>3 Jan, 2013</td>
                                                                <td>$1395.85</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Approved</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td> Sandra Smith </td>
                                                                <td>3 Jan, 2013</td>
                                                                <td>$125.85</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="checkbox">
                                                                        <label class="form-checkbox form-icon active">
                                                                        <input type="checkbox">
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                                <td> Sandra </td>
                                                                <td>3 Jan, 2013</td>
                                                                <td>$239.85</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <!--Split Buttons Dropdown--> 
                                                                    <!--===================================================-->
                                                                    <div class="btn-group btn-group-xs">
                                                                        <button class="btn btn-danger">Download</button>
                                                                        <button class="btn btn-danger dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button"> 
                                                                        <i class="dropdown-caret fa fa-caret-down"></i> 
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">Action</a> </li>
                                                                            <li><a href="#">Another action</a> </li>
                                                                            <li><a href="#">Something else here</a> </li>
                                                                            <li class="divider"></li>
                                                                            <li><a href="#">Separated link</a> </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!--===================================================-->
                                                                </td>
                                                            </tr>
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