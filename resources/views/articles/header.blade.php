<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>fmbb</title>

  <!--========================PERSONNEL=========================-->
     
  <!--=====================FIN PERSONNEL============================-->

        <link rel="shortcut icon" href="../../back/img/favicon.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="../../back/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="../../back/css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="../../back/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="../../back/plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="../../back/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <link href="../../back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
        <!--Jquery Tag It [ OPTIONAL ]-->
        <link href="../../back/plugins/tag-it/jquery.tagit.css" rel="stylesheet">
        <!--Ion.RangeSlider [ OPTIONAL ]-->
        <link href="../../back/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet">
        <link href="../../back/plugins/ion-rangeslider/ion.rangeSlider.skinNice.css" rel="stylesheet">
        <!--Chosen [ OPTIONAL ]-->
        <link href="../../back/plugins/chosen/chosen.min.css" rel="stylesheet">
        <!--noUiSlider [ OPTIONAL ]-->
        <link href="../../back/plugins/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
        <link href="../../back/plugins/noUiSlider/jquery.nouislider.pips.min.css" rel="stylesheet">
        <!--Bootstrap Timepicker [ OPTIONAL ]-->
        <link href="../../back/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <!--Bootstrap Datepicker [ OPTIONAL ]-->
        <link href="../../back/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
        <!--Dropzone [ OPTIONAL ]-->
        <link href="../../back/plugins/dropzone/dropzone.css" rel="stylesheet">
        <!--Summernote [ OPTIONAL ]-->
        <link href="../../back/plugins/summernote/summernote.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="../../back/css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="../../back/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="../../back/plugins/pace/pace.min.js"></script>
        <!--SCRIPT-->
        <!--========================http://www.expertphp.in/js/jquery.form.js=========================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <!--<link href="../../back/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="../../back/plugins/pace/pace.min.js"></script>
        <script src="../../back/js/dropzone.js"></script>
        <script type="text/javascript" src="../../back/js/jquery.form.js"></script>
    	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>-->
  <script>
         
  </script>
  
<script>
        jQuery(document).ready(function($){
              $('.deleteGroup').on('submit',function(e){
        if(!confirm('Do you want to delete this item?')){
              e.preventDefault();
        }
      });
});
</script>

<style>
    
    #formdiv {
  text-align: center;
}
#file {
  color: green;
  padding: 5px;
  border: 1px dashed #123456;
  background-color: #f9ffe5;
}
#img {
  width: 17px;
  border: none;
  height: 17px;
  margin-left: -20px;
  margin-bottom: 191px;
}
.upload {
  width: 100%;
  height: 30px;
}
.previewBox {
  text-align: center;
  position: relative;
  width: 150px;
  height: 150px;
  margin-right: 10px;
  margin-bottom: 20px;
  float: left;
}
.previewBox img {
  height: 150px;
  width: 150px;
  padding: 5px;
  border: 1px solid rgb(232, 222, 189);
}
.delete {
  color: red;
  font-weight: bold;
  position: absolute;
  top: 0;
  cursor: pointer;
  width: 20px;
  height:  20px;
  border-radius: 50%;
  background: #ccc;
}



/*---------------------565------- scroll -----------------*/

#slider-thumbs {
    height: 400px;
    overflow-y: scroll;
    white-space: nowrap;
} 
    
    </style>

    </head>



    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        
                        <ul class="nav navbar-top-links pull-right">
                            <!--Profile toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Profile toogle button-->
                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"> <img class="img-circle img-user media-object" src="../../back/img/tahiry.jpg" alt="Profile Picture"> </span>
                                    <div class="username hidden-xs">Jersam</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <li>
                                            <a href="#"> <i class="fa fa-user fa-fw fa-lg"></i> Profile </a>
                                        </li>
                                        <li>
                                            <a href="#">  <i class="fa fa-envelope fa-fw fa-lg"></i> Messages </a>
                                        </li>
                                        <li>
                                            <a href="#">  <i class="fa fa-gear fa-fw fa-lg"></i> Modification </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}"> <i class="fa fa-sign-out fa-fw"></i> Deconnection </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->