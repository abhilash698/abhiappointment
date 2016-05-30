<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Shakshii - Management Software</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="/pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/pages/ico/152.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
    <link href="/assets/plugins/jquery-datatable/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/pages/css/pages-icons.css" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="/pages/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" media="screen">
    <link class="main-stylesheet" href="/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 9]>
        <link href="pages/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="/pages/css/windows.chrome.fix.css" />'
    }
    </script>
  </head>
  <body class="fixed-header menu-pin">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
      <div class="sidebar-overlay-slide from-top" id="appMenu">
        <div class="row">
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-40"><img src="/assets/img/demo/social_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 no-padding">
            <a href="#" class="p-l-10"><img src="/assets/img/demo/email_app.svg" alt="socail">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-40"><img src="/assets/img/demo/calendar_app.svg" alt="socail">
            </a>
          </div>
          <div class="col-xs-6 m-t-20 no-padding">
            <a href="#" class="p-l-10"><img src="/assets/img/demo/add_more.svg" alt="socail">
            </a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="/assets/img/logo.png" alt="logo" class="brand" data-src="/assets/img/logo.png" data-src-retina="/assets/img/logo.png" width="110" >
         
      </div>
      <!-- END SIDEBAR MENU HEADER-->
      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="/admin/dashboard" class="detailed">
              <span class="title">Appointments</span>
            </a>
            <span class="icon-thumbnail bg-success"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="/admin/calendar" class="detailed">
              <span class="title">Calendar</span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-calendar"></i></span>
          </li>

          <li class="">
            <a href="/admin/customers" class="detailed">
              <span class="title">Customers</span>
            </a>
            <span class="icon-thumbnail "><i class="fa fa-users"></i></span>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container full-height">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE CONTROLS -->
        <!-- LEFT SIDE -->
        <div class="pull-left full-height visible-sm visible-xs">
          <!-- START ACTION BAR -->
          <div class="sm-action-bar">
            <a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
              <span class="icon-set menu-hambuger"></span>
            </a>
          </div>
          <!-- END ACTION BAR -->
        </div>
        <!-- RIGHT SIDE -->
        <div class="pull-right full-height visible-sm visible-xs">
          <!-- START ACTION BAR -->
          <div class="sm-action-bar">
            <a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
              <span class="icon-set menu-hambuger-plus"></span>
            </a>
          </div>
          <!-- END ACTION BAR -->
        </div>
        <!-- END MOBILE CONTROLS -->
        <div class=" pull-left sm-table">
          <div class="header-inner">
            <div class="brand inline">
              <img src="/assets/img/logo.png" alt="logo" data-src="/assets/img/logo.png" data-src-retina="/assets/img/logo.png" width="110" height="22">
            </div>
             
            <!-- END NOTIFICATIONS LIST -->
            <a href="#" class="search-link" data-toggle="search"><h4>{{$tab}}</h4></a> </div>
        </div>
        <div class=" pull-right">
          <div class="header-inner">
             
          </div>
        </div>
        <div class=" pull-right">
          <!-- START User Info-->
          <div class="visible-lg visible-md m-t-10">
            <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              <span class="semi-bold">{{ Auth::user()->name }}
            </div>
            <div class="dropdown pull-right">
              <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="thumbnail-wrapper d32 circular inline m-t-5">
                <img src="/assets/img/profiles/avatar.jpg" alt="" data-src="/assets/img/profiles/bc.jpg" data-src-retina="/assets/img/profiles/bc.jpg" width="32" height="32">
            </span>
              </button>
              <ul class="dropdown-menu profile-dropdown" role="menu">
                <!-- <li><a href="#"><i class="pg-settings_small"></i> Settings</a>
                </li>
                <li><a href="#"><i class="pg-outdent"></i> Feedback</a>
                </li>
                <li><a href="#"><i class="pg-signals"></i> Help</a>
                </li> -->
                <li class="bg-master-lighter">
                  <a href="/logout" class="clearfix">
                    <span class="pull-left">Logout</span>
                    <span class="pull-right"><i class="pg-power"></i></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper" id="plainContent">
        <!-- START PAGE CONTENT -->

        
        @yield('content')

        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg footer">
          <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
              <span class="hint-text">Copyright © 2014 </span>
              <span class="font-montserrat">Shakshii</span>.
              <span class="hint-text">All rights reserved. </span>
              <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
              <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper content-builder" id="parallaxCoverpage">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron page-cover" data-pages="parallax">
            <div class="container-fluid container-fixed-lg">
              <div class="inner">
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                  <li>
                    <a href="#">Home</a>
                  </li>
                  <li><a href="#" class="active">Parrallax</a>
                  </li>
                </ul>
                <!-- END BREADCRUMB -->
                <div class="container-md-height m-b-20">
                  <div class="row row-md-height">
                    <div class="col-lg-7 col-md-6 col-md-height col-middle bg-white">
                      <!-- START PANEL -->
                      <div class="full-height">
                        <div class="panel-body text-center">
                          <img class="image-responsive-height demo-mw-500" src="/assets/img/demo/typography_hero.gif" alt="Typograpy Hero">
                        </div>
                      </div>
                      <!-- END PANEL -->
                    </div>
                    <div class="col-lg-5 col-md-height col-md-6 col-top">
                      <!-- START PANEL -->
                      <div class="panel panel-transparent">
                        <div class="panel-heading">
                          <div class="panel-title">Getting started
                          </div>
                        </div>
                        <div class="panel-body">
                          <h3>One of the most underestimated elements of design is typography. However, it’s critical in both print and web media. We Made it Perfect in both.</h3>
                          <p>Color can be a wonderful tool for making your dashboard less stressful and more calming — and it can have a significant impact on your mood and well-being, We made it with you in mind</p>
                          <br>
                          <div>
                            <div class="profile-img-wrapper m-t-5 inline">
                              <img width="35" height="35" src="/assets/img/profiles/avatar_small.jpg" alt="Avatar" data-src="/assets/img/profiles/avatar_small.jpg" data-src-retina="/assets/img/profiles/avatar_small2x.jpg">
                              <div class="chat-status available">
                              </div>
                            </div>
                            <div class="inline m-l-10">
                              <p class="small hint-text">VIA senior product manage
                                <br> for fonts and typography at REVOX</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END PANEL -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <div class="container-fluid container-fixed-lg demo-container">
            <!-- PLEASE REMOVE demo-container CLASS FROM THIS DIV, ITS ONLY FOR DEMO PUPPOSE
                    TO SHOW THE PARRALAX EFFECT
                  -->
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper content-builder full-height" id="fullheightParallax">
        <!-- START PAGE CONTENT -->
        <div class="content full-height">
          <!-- START JUMBOTRON -->
          <div class="jumbotron full-height no-padding" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20 full-height">
              <div class="inner full-height">
                <div class="container-xs-height full-height">
                  <div class="col-xs-height col-middle text-center">
                    <div class="col-md-6 col-md-offset-3 text-center">
                      <h2 class="text-center">        
                                    <img src="/assets/img/logo.png" alt="logo">     
                                        makes it super-easy to create your
                                        dashboard Without a designer.
                                    </h2>
                      <button class="btn btn-success btn-rounded">Live Preview</button>
                      <button class="btn btn-link text-white">Watch Video</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <div class="container-fluid container-fixed-lg demo-container">
            <!-- PLEASE REMOVE THE HEIGHT STYLE FROM THIS DIV, ITS ONLY FOR DEMO PUPPOSE
                        TO SHOW THE PARRALAX EFFECT
                      -->
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT -->
      <!-- END PAGE CONTENT WRAPPER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper content-builder full-height" id="titleParallax">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron  no-margin" data-pages="parallax">
            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
              <div class="inner">
                <h3 class="">Page Title</h3>
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <div class="container-fluid container-fixed-lg demo-container">
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
              <li>
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#" class="active">Parallax for page title</a>
              </li>
            </ul>
            <!-- END BREADCRUMB -->
            <!-- PLEASE REMOVE demo-container CLASS ABOVE, ITS ONLY FOR DEMO PUPPOSE
                    TO SHOW THE PARRALAX EFFECT
                  -->
          </div>
        </div>
        <!-- END PAGE CONTENT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper content-builder full-height" id="columns-3-9">
        <!-- START PAGE CONTENT -->
        <div class="content full-height">
          <div class="container-fluid full-height no-padding">
            <div class="row full-height no-margin">
              <div class="col-md-3 no-padding b-r b-grey sm-b-b full-height">
                <div class="bg-white full-height">
                  <!-- YOU CAN REMOVE FULL-HEIGHT IN ALL PARENT ELEMENTS TO EXPEND TO CONTENT HEIGHT
                           YOU CAN ALSO CHANGE THE BACKGROUN COLOR BY ADDING THE BG CLASSES
                           EXAMPLE : bg-success
                         -->
                </div>
              </div>
              <div class="col-md-9 no-padding full-height">
                <div class="placeholder full-height">
                  <!-- YOU CAN REMOVE FULL-HEIGHT IN ALL PARENT ELEMENTS TO EXPEND TO CONTENT HEIGHT
                           YOU CAN ALSO CHANGE THE BACKGROUN COLOR BY ADDING THE BG CLASSES
                           EXAMPLE : bg-success
                         -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg footer">
          <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
              <span class="hint-text">Copyright © 2014 </span>
              <span class="font-montserrat">Shakshii</span>.
              <span class="hint-text">All rights reserved. </span>
              <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
              <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->      
    </div>
    <!-- END PAGE CONTAINER -->
    <!--START QUICKVIEW -->
    <div id="quickview" class="quickview-wrapper" data-pages="quickview">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs">
        <li class="">
          <a href="#quickview-notes" data-toggle="tab">Notes</a>
        </li>
        <li>
          <a href="#quickview-alerts" data-toggle="tab">Alerts</a>
        </li>
        <li class="active">
          <a href="#quickview-chat" data-toggle="tab">Chat</a>
        </li>
      </ul>
      <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-close"></i></a>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- END Alerts !-->
        <div class="tab-pane fade in active no-padding" id="quickview-chat">
          <div class="view-port clearfix" id="chat">
            <div class="view bg-white">
              <!-- BEGIN View Header !-->
              <div class="navbar navbar-default">
                <div class="navbar-inner">
                  <!-- BEGIN Header Controler !-->
                  <a href="javascript:;" class="inline action p-l-10 link text-master" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
                    <i class="pg-plus"></i>
                  </a>
                  <!-- END Header Controler !-->
                  <div class="view-heading">
                    Chat List
                    <div class="fs-11">Show All</div>
                  </div>
                  <!-- BEGIN Header Controler !-->
                  <a href="#" class="inline action p-r-10 pull-right link text-master">
                    <i class="pg-more"></i>
                  </a>
                  <!-- END Header Controler !-->
                </div>
              </div>
              <!-- END View Header !-->
              <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">
                    a</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="col-xs-height col-middle">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="/assets/img/profiles/1x.jpg" data-src="/assets/img/profiles/1.jpg" src="/assets/img/profiles/1x.jpg" class="col-top">
                        </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">ava flores</span>
                          <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
                <div class="list-view-group-container">
                  <div class="list-view-group-header text-uppercase">b</div>
                  <ul>
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="col-xs-height col-middle">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="/assets/img/profiles/2x.jpg" data-src="/assets/img/profiles/2.jpg" src="/assets/img/profiles/2x.jpg" class="col-top">
                        </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">bella mccoy</span>
                          <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                    <!-- BEGIN Chat User List Item  !-->
                    <li class="chat-user-list clearfix">
                      <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                        <span class="col-xs-height col-middle">
                        <span class="thumbnail-wrapper d32 circular bg-success">
                            <img width="34" height="34" alt="" data-src-retina="/assets/img/profiles/3x.jpg" data-src="/assets/img/profiles/3.jpg" src="/assets/img/profiles/3x.jpg" class="col-top">
                        </span>
                        </span>
                        <p class="p-l-10 col-xs-height col-middle col-xs-12">
                          <span class="text-master">bob stephens</span>
                          <span class="block text-master hint-text fs-12">Hello there</span>
                        </p>
                      </a>
                    </li>
                    <!-- END Chat User List Item  !-->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BEGIN VENDOR JS -->
    <script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap-select2/select2.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/classie/classie.js"></script>
    <script src="/assets/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="/assets/plugins/moment/moment.min.js"></script>
    <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="/pages/js/pages.min.js"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="/assets/js/demo.js" type="text/javascript"></script>
    <script src="/assets/js/datatables.js" type="text/javascript"></script>
    <script src="/assets/js/scripts.js" type="text/javascript"></script>
    <script src="/assets/js/custom.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
  </body>
</html>