@include('admin.header-match')

<div id="page-content">
    <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-danger">
                                        <img src="../img/av1.png" alt="avatar">
                                        <div class="name osLight"> Sam Smith </div>
                                        <div class="col-sm-3 pull-right"><h1>89 pts</h1></div>
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
                            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-mint">
                                        <img src="../img/av2.png" alt="avatar">
                                        <div class="name osLight"> Jani Samual </div>
                                        <div class="col-sm-3 pull-right"><h1>69 pts</h1></div>
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
            <div class="col-lg-8">
                                <div class="panel">
                                    <!-- Panel heading -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Form Validation</h3>
                                    </div>
                                    <!-- Panel body -->
                                    <form id="registrationForm" class="form-horizontal">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-xs-2 control-label">Full name</label>
                                                <div class="col-xs-4">
                                                    <input type="text" class="form-control" name="firstName" placeholder="First name" />
                                                </div>
                                                <div class="col-xs-4">
                                                    <input type="text" class="form-control" name="lastName" placeholder="Last name" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="form-group">
                                                <div class="col-xs-9 col-xs-offset-10">
                                                    <button type="submit" class="btn btn-info btn-lg" name="signup" value="Sign up">
                                                    Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                                <!--Default Accordion-->
                                <!--===================================================-->
                                <div class="panel-group accordion" id="accordion">
                                    <div class="panel">
                                        <!--Accordion title-->
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-parent="#accordion" data-toggle="collapse" href="#collapseOne">Ajouter tous les quarts</a>
                                            </h4>
                                        </div>
                                        <!--Accordion content-->
                                        <div class="panel-collapse collapse" id="collapseOne">
                                            <form>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Firstname</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Lastname</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Email</label>
                                                            <input type="email" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Website</label>
                                                            <input type="url" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Firstname</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Lastname</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Firstname</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Lastname</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-footer text-right">
                                                <button class="btn btn-info" type="submit">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--End Default Accordion-->
                            </div>
        </div>

        <div class="row">
                            <div class="col-md-8">
                                <div class="panel">
                                    <div class="panel-body np">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base mar-no">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> Top Selling </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2">Most Viewed</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">#</th>
                                                                <th>Project</th>
                                                                <th>Project Deadline</th>
                                                                <th>Status</th>
                                                                <th>Clients</th>
                                                                <th class="hidden-xs">Progress</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="hidden-xs">1</td>
                                                                <td>IT Help Desk</td>
                                                                <td>11 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-info">Block</div>
                                                                </td>
                                                                <td>Semantha Armstrong</td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: 25%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">2</td>
                                                                <td>Product Dev</td>
                                                                <td>15 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-danger">On Hold</div>
                                                                </td>
                                                                <td>Jonathan Smith</td>
                                                                <td></td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-success" style="width: 35%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">3</td>
                                                                <td>Website Redesign</td>
                                                                <td>19 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-success">Approved</div>
                                                                </td>
                                                                <td>Jacob Armstrong</td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-info" style="width: 85%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">4</td>
                                                                <td>Local Ad</td>
                                                                <td>25 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td>Sandra Smith</td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-warning" style="width: 45%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">5</td>
                                                                <td>Design new theme</td>
                                                                <td>28 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td>Will DeBrandon</td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-danger" style="width: 55%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">6</td>
                                                                <td>Mockup Testing</td>
                                                                <td>31 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td>Alexander Flynn</td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-success" style="width: 75%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="hidden-xs">7</td>
                                                                <td>Testing</td>
                                                                <td>31 May 2016</td>
                                                                <td>
                                                                    <div class="label label-table label-warning">Pending</div>
                                                                </td>
                                                                <td>Alexander Flynn</td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-success" style="width: 75%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
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
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            </div>
        </div>
 </div>


@include('admin.footer-match')