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
        <!-- LOGO-->
     

      
        <!-- 
   <div class="input-group col-md-4">
                <div style="height:50px; background-color: white; width: 300px; border-radius: 30px; display: flex; align-items: center; justify-content: space-around;">
                    <span class="input-group-append">
                    <button class="" type="button" style="border: none; background: none;">
                          <i class="fa fa-search"></i>
                    </button>
                    <input type="text" placeholder="Rechercher de l'aide " style="border: none">
                  </span>
           </div>
                
      </div>
        FIN LOGO-->
       <!-- MENU -->
       
        <!-- FIN ZONE DE RECHERCHE-->
    </div>
  </div>
</header>
</br></br>
  <div style="display: flex; justify-content: center;">
    <h1 style="color: #294060;">HEALTH SUPPORT</h1> 
  </div>

  </br></br>

<div style="display: flex; justify-content: center;">
<div class="card" style="width: 18rem;" style="margin-right: 250px;">
  <div class="card-body">
    <h1 class="card-title">Medicament</h1>
    <a  style="background-color: #294060; width:150px;  border-radius: 25px;" href="{{asset('assets/css/medicament.pdf')}}" type="button" ><h5 style="color:white; text-align:center;">Voir</h5></a>
  </div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="card" style="width: 18rem;" style="margin-right: 250px;">
  <div class="card-body">
    <h1 class="card-title">Maladie</h1>
    <a  style="background-color: #294060; width:150px; border-radius: 25px;" href="{{route('listeMaladie')}}" type="button"><h5 style="color:white; text-align:center;">Voir</h5></a>
  </div>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="card" style="width: 18rem;">
  <div class="card-body">
   <h1 class="card-title">Symptome</h1>
    <a   style="background-color: #294060; width:150px;  border-radius: 25px;" href="{{route('listeSymptome')}}" type="button"><h5 style="color:white; text-align:center;">Voir</h5></a>
  </div>
</div>
</div>

</br></br>
<!--
<div style="display: none; justify-content: center;" id="plus">
	<div class="card" style="width: 18rem;" style="margin-right: 250px;">
	  <div class="card-body">
	    <h5 class="card-title">Special title treatment</h5>
	    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
	    <a href="#" class="btn btn-primary">Go somewhere</a>
	  </div>
	</div>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div class="card" style="width: 18rem;" style="margin-right: 250px;">
	  <div class="card-body">
	    <h5 class="card-title">Special title treatment</h5>
	    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
	    <a href="#" class="btn btn-primary">Go somewhere</a>
	  </div>
	</div>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">Special title treatment</h5>
	    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
	    <a href="#" class="btn btn-primary">Go somewhere</a>
	  </div>
	</div>
</div>

 <a href='#tabs-1' id="voir"><h1 style="display: flex; justify-content: center; align-items: center;">Voir plus</h1></a>

-->
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