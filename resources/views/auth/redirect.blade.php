<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from radixtouch.in/templates/admin/sunray/source/light/lock_screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jan 2019 18:25:34 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Sunray | Bootstrap Responsive Hospital Admin Template</title>
     <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
  <!-- icons -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <!-- <link rel="stylesheet" href="../assets/plugins/iconic/css/material-design-iconic-font.min.css"> -->
  <link rel="stylesheet" href="../../../../../../cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!-- bootstrap -->
  <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
  <!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/sunray/source/assets/img/favicon.ico" /> 
</head>
<body>
    <div class="limiter" >
    <div class="container-login100 page-background">
      <div class="wrap-login100" style="width: 400px;">
        <form class="login100-form validate-form" >
          <span class="login100-form-logo">
            <img src="{{URL::to('/')}}/uploads/{{ Auth::user()->image }}" style="height: 105px;width: 105px;" class="imgroundcorners" >
          </span>
          <span class="login100-form-title  p-t-27">
           {{ Auth::user()->name }} {{ Auth::user()->prenom }}
          </span>
          <p class="text-center txt-locked">
          {{ Auth::user()->privilege }}
          </p>
          <div class="container-login100-form-btn">
       <a style="color: black;"  id="vers" href="{{url('home') }}">Continuer en tant que  {{ Auth::user()->name }} {{ Auth::user()->prenom}}</a>
           
          </div>
          <div class="text-center p-t-27">
          
          </div>
        </form>
      </div>
    </div>
  </div>
    <!-- start js include path -->
     <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}" ></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('assets/js/pages/extra_pages/extra_pages.js')}}"></script>
    <!-- end js include path -->
</body>

<!-- Mirrored from radixtouch.in/templates/admin/sunray/source/light/lock_screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jan 2019 18:25:36 GMT -->
</html>














