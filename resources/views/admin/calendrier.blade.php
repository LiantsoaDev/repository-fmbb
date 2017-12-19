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
             <div class="panel-body">

                    <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-danger">
                                        <img src="{{LINK}}/img/av1.png" alt="avatar">
                                        <div class="name osLight"> Sam Smith </div>
                                         <div class="col-sm-3 pull-right"><h1>100<small>pts</small></h1></div>
                                    </div>
                                    <div class="title"> Web Designer </div>
                                    <div class="address"> Los Angeles, CA, USA </div>
                                    <ul class="fullstats">
                                        <li> <span>280</span>Followers </li>
                                        <li> <span>345</span>Following </li>
                                        <li> <span>36</span>Posts </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-mint">
                                        <img src="{{LINK}}/img/av2.png" alt="avatar">
                                        <div class="name osLight"> Jani Samual </div>
                                         <div class="col-sm-3 pull-right"><h1>89<small>pts</small></h1></div>
                                    </div>
                                    <div class="title"> Web Designer </div>
                                    <div class="address"> Los Angeles, CA, USA </div>
                                    <ul class="fullstats">
                                        <li> <span>280</span>Followers </li>
                                        <li> <span>345</span>Following </li>
                                        <li> <span>36</span>Posts </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
					</div>

					 <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel">
                                <div class="panel-body pad-ver-5">
                                    <h4> Quick Stats </h4>
                                    <ul class="nav nav-section nav-justified">
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Sales <i class="fa fa-caret-up text-success"></i></h5>
                                                <p class="text-left"> 1250 </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Visits <i class="fa fa-caret-down text-danger"></i></h5>
                                                <p class="text-left"> 15K+ </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Registrations <i class="fa fa-caret-up text-success"></i></h5>
                                                <p class="text-left"> 3500 </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Tickets <i class="fa fa-caret-up text-success"></i></h5>
                                                <p class="text-left"> 450 </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="progress progress-striped progress-xs">
                                        <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar"> <span class="sr-only">60% Complete</span> </div>
                                    </div>
                                    <p class="text-left">Health: <span class="text-success">Good</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="panel">
                                <div class="panel-body pad-ver-5">
                                    <h4> Quick Stats </h4>
                                    <ul class="nav nav-section nav-justified">
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Sales <i class="fa fa-caret-up text-success"></i></h5>
                                                <p class="text-left"> 1250 </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Visits <i class="fa fa-caret-down text-danger"></i></h5>
                                                <p class="text-left"> 15K+ </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Registrations <i class="fa fa-caret-up text-success"></i></h5>
                                                <p class="text-left"> 3500 </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="section">
                                                <h5 class="text-left"> Tickets <i class="fa fa-caret-up text-success"></i></h5>
                                                <p class="text-left"> 450 </p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="progress progress-striped progress-xs">
                                        <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar"> <span class="sr-only">60% Complete</span> </div>
                                    </div>
                                    <p class="text-left">Health: <span class="text-success">Good</span></p>
                                </div>
                            </div>
                            <button class="btn btn-success btn-labeled fa fa-check">En cours</button>
                            <button class="btn btn-default btn-labeled fa fa-exclamation-triangle">Terminer</button>
                            <button class="btn btn-warning btn-labeled fa fa-times">Reporter</button>
                            <button class="btn btn-mint btn-rounded btn-labeled fa fa-pencil">Score</button>
                        </div>
                    </div>
                 </div><!-- panel-bofy -->
             </div><!-- panel -->   
	</div><!-- col-md-8 -->


</div>     

@include('admin.footer-match')