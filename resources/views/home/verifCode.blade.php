
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification -Tulip Santé</title>
    <link rel="stylesheet" href="{{asset('assets/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/assets/css/pages/auth.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/assets/images/ic_launcher.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/assets/images/ic_launcher.png')}}" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-6 col-12">
        <div id="auth-left">
            <!-- <div class="auth-logo" style="text-align:center">
            <h4 class=""><img src="{{asset('assets/assets/images/ic_launcher.png')}}" style="height: 70px;" alt="Logo"> Tulip Santé</h4>
            </div> -->
            <h2 class="auth-title"><i class="bi bi-check"></i>  Confirmation du code</h2>
            <p class="auth-subtitle mb-5">Entrez le code qui vous a été envoyer sur votre mail !</p>

            <form action="{{route('confirmCode')}}" method="POST">
                 @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl"  name="code"  placeholder="Code" required>
                    <input  type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email}}" required  autofocus placeholder="Code">

                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                        @error('email_usr_pm')
                        <span class="focus-input100" >
                             <p style="color:red">{{ $message }}</p>
                        </span>
                         @enderror
                </div>
             
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="">Valider</button>
            </form>
          
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right"  style="background-image:url('/assets/assets/images/doc_image3.jpg');background-size:cover; height:100%" >

            <div class="auth-logo" style="text-align:left" >
            <h4 class="" style="padding-bottom:0px"><img src="{{asset('assets/assets/images/ic_launcher.png')}}" style="height: 80px;" alt="Logo"> <b style="color:white">TULIP SANTÉ</b></h4>
            </div>

        </div>
    </div>
</div>

    </div>
</body>

</html>
