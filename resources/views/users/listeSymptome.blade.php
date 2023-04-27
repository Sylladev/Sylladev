<!DOCTYPE html>
<html lang="en">
<head>
  <!-- page title-->
    <title>Tulip Health</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Health Care, health" />
    <meta name="description" content="Health Care HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="{{asset('css/animate.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/jquery.bxslider.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" media="screen"/>
    <link rel="stylesheet" id="theme-color" type="text/css" href="#"/>
    <link rel="shortcut icon" type="image/png" href="favicon.ico"> 


      <!-- AUTRE TEMPLATE -->
      <link href="{{asset('assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/plugins/material/material.min.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/material_style.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/pages/formlayout.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/theme-color.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('assets/css/pages/formlayout.css')}}" rel="stylesheet" type="text/css" />
      <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/sunray/source/assets/img/favicon.ico" />
      <link rel="stylesheet" href="{{asset('assets/css/pages/steps.css')}}"> 
      <link href="{{asset('assets/css/pages/typography.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{asset('assets/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
      <!-- FIN AUTRE TEMPLATE -->
  
      <!-- SCRIPT  LOADER --> 
      <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-35935151-8', 'auto');
            ga('send', 'pageview');
      </script>
      <!-- FIN  SCRIPT  LOADER --> 


      <style type="text/css">
          .bouton {
            height: 29px;
          }
      </style>

      <style type="text/css">
          .bouton2 {
            height: 35px;
          }
      </style>

</head>
<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white dark-color logo-dark">
<!-- HEADER-->
<header id="hs_header" style="background-color:#294060;">
  <div class="container" >
    <div class="row">

     <div class="col-lg-2 col-md-2 col-sm-12">
            <div id="hs_logo"><a href="index-2.html"><img src="{{asset('images/tuliplog.png')}}" alt="" style="width:50px;"> </a></div>

        </div>
  <h3 style="color:white;">TULIP HEALTH</h3>
    </div>
  </div>
</header>
</br></br>
<!-- FIN ENTETE IMAGE-->
<div class="container hs_header">
  <div class="page-content">
        
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                    <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('help') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                                      </ol>
                                    </nav>
                                        <div class="card-head">
                                            <header>Liste des Symptomes</header>
                                            <div class="tools">
                                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                          <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                          <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                        <div class="table-responsive">
                                            <table class="table table-striped custom-table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Symptome</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                             @foreach($symptome as $key => $symptom)
                                            <tr>
                                                    <td> {{$symptom->description}} </td>
                                            </tr>
                                             @endforeach 
                                                </tbody>
                                            </table>
                                            <?php echo $symptome->render(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                      

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    

                                      <div class="modal-body">
                                        Modal body text goes here.
                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                </div>
                          </div>
                    </div>
  </div>
</div>
</div>

    @yield('content')
<!-- SEPARATEUR -->
<div class="hs_margin_30"></div>
<!-- FIN SEPARATEUR -->
<footer id="hs_footer" style="background-color:#294060;">
  <div class="container">
    <div class="hs_footer_content">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="row">
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <h4 class="hs_heading">&nbsp;</h4>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="hs_copyright"  style="background-color:#294060;">Powered by TULIP INDUSTRIES LTD</div> 
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jquery.bxslider.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jquery.mixitup.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/single-0.1.0.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/popper/popper.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/counterup/jquery.waypoints.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/counterup/jquery.counterup.min.js')}}" ></script>
    <script src="{{asset('assets/js/app.js')}}" ></script>
    <script src="{{asset('assets/js/layout.js')}}" ></script>
    <script src="{{asset('assets/js/theme-color.js')}}" ></script>

    <script src="{{asset('assets/plugins/material/material.min.js')}}"></script>
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/morris/raphael-min.js')}}" ></script>
    <script src="{{asset('assets/js/pages/chart/morris/morris-home-data.js')}}" ></script>

    <!-- VRAI JS --> 
<!-- FIN AUTRE JS -->

<script type="text/javascript">
  var voir_plus = document.getElementById('voir');
  var plus = document.getElementById('plus');
  voir_plus.addEventListener('click', function(){
    plus.style.display = "flex";
  });
</script>

   

</body>

</html>