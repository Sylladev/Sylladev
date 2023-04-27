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
    <script>
        function escapeRegExp(str) {
            return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
        }
    </script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo" style="text-align:center">
            <h4 class=""><img src="{{asset('assets/assets/images/ic_launcher.png')}}" style="height: 70px;" alt="Logo"> Tulip Santé</h4>
            </div> -->
                    <h2 class="auth-title"><i class="bi bi-shield-lock"></i> Nouveau compte administrateur</h2>
                    <p class="auth-subtitle mb-5">Veuillez remplir le formulaire pour enregistrer le premier administrateur</p>

                    <form method="POST" action="{{route('createuserAdmin')}}" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Prenom</label>
                                    <input type="text" id="first-name-column" class="form-control" placeholder="Prénom" name="prenom">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last-name-column">Nom</label>
                                    <input type="text" id="last-name-column" class="form-control" placeholder="Nom" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city-column">Email</label>
                                    <input type="email" id="city-column" class="form-control" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country-floating">Privilège</label>
                                    <select class="form-select" id="inputGroupSelect01" name="privilege">
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="company-column">Mot de passe</label>
                                    <input type="password"  class="form-control" name="password" placeholder="Mot de passe" oninput="form.confirm.pattern = escapeRegExp(this.value)">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email-id-column">Confirmer le mot de passe</label>
                                    <input type="password"  class="form-control" name="password" placeholder="Saisissez encore le mot de passe" title="Les deux Mot de Passe doivent correspondre" id="confirm">
                                </div>
                            </div>
                            <input type="hidden" value="<?php $dt = new datetime();
                                                        $dates = $dt->format('Y-m-d H:i:s.u');
                                                        echo substr($dates, 0, 23)  ?>" name="flagtransmis">

                            <div class="form-group col-6">
                                <label for="email-id-column">Importer une photo de profile</label>
                                <input type="file" class="form-control" id="file" name="fichier" accept="image/*" required>
                                <input type="hidden" class="form-control" id="dest" name="image">

                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Effacer</button>
                            </div>
                        </div>
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
    @include('outils.js')
</body>

</html>