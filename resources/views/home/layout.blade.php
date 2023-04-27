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

        <!-- LOGO-->
        <div class="col-lg-2 col-md-2 col-sm-12">
            <div id="hs_logo"><img src="{{asset('images/tuliplog.png')}}" alt="" style="width:50px;"> </div>
        </div>
        <!-- FIN LOGO-->
       <!-- MENU -->
        <div class="col-lg-8 col-md-8 col-sm-10">
          <button type="button" class="hs_nav_toggle navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu<i class="fa fa-bars"></i></button>
          <nav>
            <ul class="hs_menu collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <li><a href="{{ route('home') }}">Tableau de Bord</a></li>
              <li><a href="{{route('accueilConfig')}}">Configuration</a></li>
              <li><a href="{{ route('medecin_liste') }}">Medecin</a></li>

             @auth  
              @if (Auth::user()->privilege=='admin')
                <li><a>Utilisateur</a>
                    <ul>
                      <li><a href="{{ route('create') }}"></span> Ajout</a></li> 
                      <li><a  href="{{route('liste_utilisateurs')}}"></span> Liste</a></li> 
                    </ul>
                </li>
              @endif
              @endauth
             
              <li><a>Recherche</a>
                  <ul>
                    <button class="mdl-button  mdl-js-ripple-effect" data-toggle="modal" data-target="#exampleModal">Patient</button>
                  </ul>
              </li>

              <li><a href="{{ route('region') }}">Region</a></li>

          </ul>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="exampleModalLabel"><h4>Rechercher un patient</h4></h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                          <div class="modal-body">
                                <!-- FORMULAIRE -->           
                                <div class="row">
                                    <div class="col-md-12 col-sm-4">
                                        <div class="card card-box">
                                            <div class="card-body " id="bar-parent">
                                                <form  method="POST" action="{{route('indexpat')}}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row" >
                                                      <label class="control-label col-md-0">Critère de recherche</label>
                                                          <hr>
                                                          <div class="col-md-6" >
                                                              <select class="form-control" id="par">
                                                                  <option value="">Select...</option>
                                                                  <option value="nom">Nom</option>
                                                                  <option value="tel">Telephone</option>
                                                              </select>
                                                          </div>
                                                    </div>
                                                    <div class="form-group">
                                                      <input id="tel"  type="text" name="telephoneContact" data-required="1" class="form-control" placeholder="Tel"/>
                                                    </div>
                                                    <div class="form-group" >
                                                      <input id="nom" type="text" name="nomPatient" data-required="1" class="form-control" placeholder="Nom et Prenom"/>
                                                    </div>
                                                    
                                                        <button type="submit"  class="btn btn-circle deepPink-bgcolor btn-sm bouton"><i class="fa fa-find"></i> Rechercher</button>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- FIN FORMULAIRE --> 
                          </div>
                  </div>        
              </div>
          </div>

  
        </div>
        <!-- FIN MENU-->


        <!-- ZONE DE RECHERCHE-->
        <div class="col-lg-2 col-md-3 col-sm-2">
            <div class="row" style="margin-top:8px;">
                    <div class="profile-data" style="color: white; size: 25px" >
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

                          @if (Auth::user()->image=='') 
                             <img class="img-circle " src="{{asset('images/profile.jpg')}}" alt="" style="width: 50px; height :47px"> 
                            @else 
                                <img alt="" class="img-circle " src="{{asset('/uploads')}}/{{ Auth::user()->image }}" style="width: 50px; height :50px" />

                              @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ route('modifCompte',Auth::user()->id) }}"><i class="fa fa-cog"></i> Parametrage </a>
                                </li>
                            </ul>
                             &nbsp;&nbsp;
                               <h8> {{ Auth::user()->prenom }}</h8> 
                            &nbsp;
                             
                          <a  href="{{ route('logout') }}" class="mb-control" data-box="#mb-signout" 

                                  onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit(); " style="color: white;" >
                                          
                                     <i class="fa fa-sign-out"></i>
                          </a>


                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  @csrf</form>
                    </div>
            </div>
        </div>
        <!-- FIN ZONE DE RECHERCHE-->

    </div>
  </div>
</header>




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

    <script>
  $(document).ready(function () {

    var limits=15;
    var id="uiji";
    $('#loader').fadeIn("slow").delay(3000).fadeOut("slow");
    $('#liste_medecin').load("{{ route('medecin_liste_data','') }}/"+limits);

    $('#liste_maladie').load("{{ route('maladie_liste_data','') }}/"+limits);

    $('#liste_story').load("{{ route('medecin_story_data',["+limits+","+id+"]) }}");


    $("#more").click(function(){
      
      $('#loader').fadeIn("slow").delay(3000).fadeOut("slow");
      limits+=10;
        $('#liste_medecin').load("{{ route('medecin_liste_data','') }}/"+limits);
    });


    $("#moremaladie").click(function(){
      $('#loader').fadeIn("slow").delay(3000).fadeOut("slow");
      limits+=10;
        $('#liste_maladie').load("{{ route('maladie_liste_data','') }}/"+limits);
    });

    $("#morestory").click(function(){
      $('#loader').fadeIn("slow").delay(3000).fadeOut("slow");
      limits+=10;
       $('#liste_story').load("{{ route('medecin_story_data',["+limits+","+id+"]) }}");
    });


    
    $("#search").keyup(function(){
        var texte=encodeURIComponent($("#search").val());
        var textes=$("#search").val();

        if(texte==""){
            var limits=15;
            $('#loader').fadeIn("slow").delay(3000).fadeOut("slow");
            $('#liste_medecin').load("{{ route('medecin_liste_data','') }}/"+limits);
        }else{
            $('#loader').fadeIn("slow").delay(3000).fadeOut("slow");
            $('#liste_medecin').load("{{ route('medecin_liste_search','') }}/"+texte);
        }

      
    });

  }); 
</script>


<!-- photo -->
  <script src="{{asset('js/photo.js')}}" ></script>

    <script type="text/javascript">
  $(document).ready(function () {

    $("#nom").hide();
    $("#tel").hide();

     $("#par").change(function(){
          if($("#par").val()=='nom'){
              $("#nom").show();
              $("#tel").hide();
          }else{
              $("#nom").hide();
              $("#tel").show();
          }
      });
  });

</script>

    <!-- VRAI JS --> 
<!-- FIN AUTRE JS -->
</body>

</html>