
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification-Tulip Santé</title>
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
            <h2 class="auth-title"><i class="bi bi-shield-lock"></i> Authentification</h2>
            <p class="auth-subtitle mb-5">Connectez-vous à l'aide de l'email et le mot de passe administrateur.</p>

            <form action="{{ route('login') }}" method="POST">
                 @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" required>
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                       
                </div>
                
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Mot de passe" required>
                    <div class="form-control-icon">
                        <i class="bi bi-key"></i>
                    </div>
                
                </div>
                @error('email')
                <span class="focus-input100" >
                        <p style="color:red"><i class="bi bi-exclamation-circle-fill"></i> Email ou mot de passe incorrect.</p>
                </span>
                @enderror
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Se rappeler de moi.
                    </label>
                </div>

                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="">Se connecter</button>
            </form>
            
            <div class="text-center mt-5 text-lg fs-4">
                <p><a class="font-bold" href="{{ route('verifEmail') }}">Mot de passe oublié ?</a></p>
            </div>
           
        </div>
    </div>
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right" style="background-image:url('assets/assets/images/steplist.jpg');background-size:cover; height:100%">

            <div class="auth-logo" style="text-align:left">
            <h4 class="" style="padding-bottom:0px"><img src="{{asset('assets/assets/images/ic_launcher.png')}}" style="height: 80px;" alt="Logo"> <b>TULIP SANTÉ</b></h4>
            </div>

        </div>
    </div>
</div>

    </div>
</body>

</html>
