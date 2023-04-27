
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
            <h2 class="auth-title mb-5" style="text-align: center;"> <i class="bi bi-lock"></i>&nbsp;Créer un nouveau mot de passe</h2>

            <form action="{{route('confirmPassword')}}" method="POST">
                 @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input  type="password" class="form-control @error('email') is-invalid @enderror" name="passwordN"   autofocus placeholder="Mot de passe" required="true" autocomplete="off" oninput="form.confirm.pattern = escapeRegExp(this.value)">
                                    
                    <input  type="hidden" value="{{$email}}" class="form-control @error('email') is-invalid @enderror" name="email" required  autofocus placeholder="password">

                    <input  type="hidden" value="{{$code}}" class="form-control @error('email') is-invalid @enderror" name="code" required  autofocus placeholder="password">

                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                        @error('email_usr_pm')
                        <span class="focus-input100" >
                             <p style="color:red">{{ $message }}</p>
                        </span>
                         @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                <input  type="password" class="form-control @error('email') is-invalid @enderror"  name="passwordC"  autofocus placeholder="Confirmer le mot de passe" title="Les deux Mot de Passe doivent correspondre" id="confirm" required autocomplete="new-password">


                    <div class="form-control-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                     
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
