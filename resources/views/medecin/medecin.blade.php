<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau medecin - Tulip Santé</title>

    @include('outils.css')

</head>

<body>
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
                        <h3><i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;Nouveau Medecin</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('medecin_liste')}}">Liste</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                            </ol>
                        </nav>
                    </div>
                    @if($message = Session::get('success'))
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <div class="alert alert-success alert-dismissible show fade">
                            <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="page-content">
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Formulaire d'enregistrement</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" data-parsley-validate method="POST" action="{{ route('create_medecin') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="idMedecin" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                                <input type="hidden" name="idAddresse" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                                <input type="hidden" name="idUser" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                                <input type="hidden" name="idContact" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                                <input type="hidden" name="idEmergencyContact" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                                <input type="hidden" name="flagtransmis" value="<?php $dt = new datetime();
                                                                                                $dates = $dt->format('Y-m-d H:i:s.u');
                                                                                                echo substr($dates, 0, 23)  ?>" name="flagtransmis">

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Prénom</label>
                                                        <input type="text" id="first-name-column" class="form-control" placeholder="Prénom" name="prenomMedecin" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="last-name-column" class="form-label">Nom</label>
                                                        <input type="text" id="last-name-column" class="form-control" placeholder="Nom" name="nomMedecin" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column" class="form-label">Date de naissance</label>
                                                        <input type="date" name="dateDeNaissance" required class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Sexe</label>
                                                        <select class="form-select" name="genreMedecin" required>
                                                            <option></option>
                                                            <option value="Masculin">Masculin</option>
                                                            <option value="Feminin">Feminin</option>
                                                            <option value="Autre">Autre</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Situation Matrimoniale</label>
                                                        <select class="form-select" name="statusMatrimonialMedecin" required>
                                                            <option></option>
                                                            <option>Célibataire</option>
                                                            <option>Marié(e)</option>
                                                            <option>Veuf/Veuve</option>
                                                            <option>Divorcé(e)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Identifiant Bracelet</label>
                                                        <input type="text" name="uidMedecin" required class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <hr>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Adresse</label>
                                                        <input type="text" name="premiereAddresse" class="form-control" required placeholder="Adresse du medecin">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Regions</label>
                                                        <select class="form-select" name="idCommune" required>
                                                            <option></option>
                                                            @foreach($commune as $key => $com)
                                                            <option value="{{ $com->idCommune }}">{{ $com->nomCommune }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Departement</label>
                                                        <select class="form-select" name="idDepartement" required>
                                                            <option></option>
                                                            @foreach($departement as $key => $dep)
                                                            <option value="{{ $dep->idDepartement }}">{{ $dep->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Specialité</label>
                                                        <select class="form-select" name="idSpecialite" required>
                                                            <option></option>
                                                            @foreach($specialite as $key => $spe)
                                                            <option value="{{ $spe->idSpecialite }}">{{ $spe->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Téléphone</label>
                                                        <input type="text" name="telephoneContact" class="form-control" required placeholder="Numero de téléphone">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Numero d'urgence</label>
                                                        <input type="text" name="telephoneUrgence" class="form-control">

                                                        <input type="hidden" name="status" value="activer" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control" required placeholder="Adresse email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <hr>
                                                </div>


                                                <div class="form-group">
                                                    <h4 class="font-red">Personne à Contacter en cas d'urgence </h4>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Nom de la personne</label>
                                                        <input type="text" name="nomRelation" class="form-control" required placeholder="Nom et Prenom">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Téléphone</label>
                                                        <input type="text" name="telephoneRelation" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Lien</label>
                                                        <select class="form-select" name="relation" required>
                                                            <option></option>
                                                            <option>Epous(e)</option>
                                                            <option>Parent</option>
                                                            <option>Ami(e)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <hr>
                                                </div>

                                                <div class="form-group">
                                                    <h4 class="txt-success">Informations de Connexion </h4>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Nom d'utilisateur</label>
                                                        <input type="text" name="username" required class="form-control" placeholder="Nom d'utilisateur">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mandatory">
                                                        <label class="form-label">Mot de Passe</label>
                                                        <input type="text" name="password" autocomplete="off" required class="form-control" placeholder="Entrer le mot de passe">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <hr>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">

                                                        <label class="form-label">Photo de Profile</label>
                                                        <input type="file" name="photo"  accept="image/*" class="form-control">

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Effacer</button>
                                                </div>
                                            </div>
                                        </form>
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
    document.getElementById('mdc').classList.add('active');
    
    </script>

</body>

</html>