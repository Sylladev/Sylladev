<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modification - Tulip Santé</title>

  @include('outils.css')

</head>

<body>
  <script>
    function escapeRegExp(str) {
      return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }
  </script>
  <div id="app">
    @include('outils.sidebar')
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3><i class="fa-solid fa-user"></i>&nbsp;&nbsp;Modification du profile</h3>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modification</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      @if($message = Session::get('success'))
      <div class="col-12 col-md-6 order-md-2 order-first">
        <div class="alert alert-success alert-dismissible show fade">
          <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif
      @if($message = Session::get('error'))
      <div class="col-12 col-md-6 order-md-2 order-first">
        <div class="alert alert-danger alert-dismissible show fade">
          <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif
      <div class="page-content">
        <section id="multiple-column-form">
          <div class="row match-height">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Formulaire de modification</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form method="POST" action="{{route('update', Auth::user()->id)}}" class="form-horizontal" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="first-name-column">Prénom</label>
                            <input type="text" id="first-name-column" class="form-control" placeholder="Prénom" value="{{$user[0]->prenom}}" name="prenom">
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="last-name-column">Nom</label>
                            <input type="text" id="last-name-column" class="form-control" placeholder="Nom" value="{{$user[0]->name}}" name="name">
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="city-column">Email</label>
                            <input type="email" id="city-column" class="form-control" placeholder="Email" name="email" value="{{$user[0]->email}}">
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="country-floating">Privilège</label>
                            <select class="form-select" id="inputGroupSelect01" name="privilege">
                              <option value="{{$user[0]->privilege}}">( {{$user[0]->privilege}} )</option>
                              <option value="admin">Admin</option>
                              <option value="user">Utilisateur</option>
                            </select>
                          </div>
                        </div>
                        <hr>
                        <p><b>NB:</b> Laisser les champs mot de passes vide si vous desirez pas changer de mot de passe.</p>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="company-column">Ancien mot de passe</label>
                            <input type="password" class="form-control" name="passwordA" placeholder="Ancien mot de passe">
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="company-column">Nouveau mot de passe </label>
                            <input type="password" class="form-control" name="passwordN" placeholder="Mot de passe" oninput="form.confirm.pattern = escapeRegExp(this.value)">
                          </div>
                        </div>
                        <div class="col-md-6 col-12">
                          <div class="form-group">
                            <label for="email-id-column">Confirmer le mot de passe</label>
                            <input type="hidden" name="mdpbcrypt" value="{{$user[0]->password}}">
                            <input type="password" class="form-control" name="passwordC" placeholder="Saisissez encore le mot de passe" title="Les deux Mot de Passe doivent correspondre" id="confirm">
                          </div>
                        </div>
                        <input type="hidden" value="<?php $dt = new datetime();
                                                    $dates = $dt->format('Y-m-d H:i:s.u');
                                                    echo substr($dates, 0, 23)  ?>" name="flagtransmis">

                        <div class="form-group col-6">
                          <label for="email-id-column">Changer la photo de profile</label>
                          <input type="file" class="form-control" id="file" name="fichier" accept="image/*">
                          <input type="hidden" class="form-control" id="dest" name="image">

                        </div>
                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer les modifications</button>
                        </div>
                      </div>
                    </form>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="" class="mb-2">
                          <h4>Privilèges Administrateur</h4>
                        </label>
                        <div style="border:0.3rem solid; padding-top:15px;">

                          <ul>
                            <li>Tableau de bord &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Gestion medecins &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Gestion patients &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Consultations &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Prescriptions &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Examens médicaux &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Paramètre de base &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Régions &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Utilisateurs &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="mb-2">
                          <h4>Privilèges Utilisateur</h4>
                        </label>
                        <div style="border:0.3rem solid; padding-top:15px;">

                          <ul>
                            <li>Tableau de bord &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Gestion medecins &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Gestion patients &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Consultations &nbsp;&nbsp;<i class="bi bi-x-octagon" style="color:red"></i></li>
                            <li>Prescriptions &nbsp;&nbsp;<i class="bi bi-x-octagon" style="color:red"></i></li>
                            <li>Examens médicaux &nbsp;&nbsp;<i class="bi bi-x-octagon" style="color:red"></i></li>
                            <li>Paramètre de base &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Régions &nbsp;&nbsp;<i class="bi bi-check" style="color:green"></i></li>
                            <li>Utilisateurs &nbsp;&nbsp;<i class="bi bi-x-octagon" style="color:red"></i></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      @include('outils.footer')
    </div>
  </div>
  @include('outils.js')

  <script>
    // ajouter une classe
    document.getElementById('usr').classList.add('active');
  </script>

</body>

</html>