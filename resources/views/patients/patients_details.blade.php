<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Patient - Tulip Santé</title>

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
                        <h3><i class="fa-solid fa-bed"></i>&nbsp;&nbsp;Profile du Patient</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Patients</li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                <section class="row">
                    <div class="col-md-4">
                        @foreach($pat as $p)
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{asset('/uploads/Patients')}}/{{ $p->idPatient }}/Personal/{{ $p->photoPatient }}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{$p->prenomPatient}} {{$p->nomPatient}}</h5>
                                        <h6 class="text-muted mb-0">{{$p->nationalitePatient}}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">

                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><i class="bi bi-exclamation-circle-fill"></i>&nbsp;&nbsp;Plus d'informations</h5><br>
                                        <h6 class="text-muted mb-4"><b>Identifiant : </b>{{$p->idPatient}}</h6>
                                        <h6 class="text-muted mb-4"><b>Groupe Sanguin : </b>{{$p->groupeSanguinPatient}}</h6>
                                        <h6 class="text-muted mb-4"><b>Sexe : </b>{{$pat[0]->genrePatient}}</h6>
                                        <h6 class="text-muted mb-4"><b>Date de naissance : </b>{{$p->dateNaissancePatient}}</h6>
                                        <h6 class="text-muted mb-4"><b>Situation : </b>{{$p->statusMatrimonialPatient}}</h6>
                                        <h6 class="text-muted mb-4"><b>Adresse : </b>{{$p->premiereAddresse}}</h6>
                                        <h6 class="text-muted mb-4"><b>Telephone : </b>{{$p->telephoneContact}}</h6>
                                        <h6 class="text-muted mb-4"><b>Numero d'urgence : </b>{{$p->telephoneUrgence}}</h6>
                                        <div class="divider">
                                            <div class="divider-text">Contact d'Urgence</div>
                                        </div>
                                        <h6 class="font-bold mb-4">{{$p->nomRelation}} ( {{$p->relation}} )</h6>
                                        <h6 class="text-muted mb-4"><b>Telephone : </b>{{$p->telephoneRelation}}</h6>
                                        <div class="divider">
                                            <div class="divider-text">Allergies</div>
                                        </div>
                                        <div class="row">
                                            @foreach($allergie1 as $a1)
                                            <span class="badge bg-secondary mb-2">{{$a1->description}}</span>
                                            @endforeach
                                            @if(empty($allergie1))
                                            <h5 class="text-muted mb-4">Aucune allergie.</h5>
                                            @endif
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Allergies aux Médicaments</div>
                                        </div>
                                        <div class="row">
                                            @foreach($allergie2 as $a2)
                                            <span class="badge bg-secondary mb-2">{{$a2->description}}</span>
                                            @endforeach
                                            @if(empty($allergie2))
                                            <h5 class="text-muted mb-4">Aucune allergie aux médicaments.</h5>
                                            @endif
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Antécedents</div>
                                        </div>
                                        <div class="row">
                                            @foreach($antecedents as $a)
                                            <span class="badge bg-secondary mb-2">{{$a->description}}</span>
                                            @endforeach
                                            @if(empty($antecedents))
                                            <h5 class="text-muted mb-4">Aucun antecedent.</h5>
                                            @endif
                                        </div>
                                        <div class="divider">
                                            <div class="divider-text">Vices</div>
                                        </div>
                                        <div class="row">
                                            @foreach($vices as $v)
                                            <span class="badge bg-secondary mb-2">{{$v->description}}</span>
                                            @endforeach
                                            @if(empty($vices))
                                            <h5 class="text-muted mb-4">Ce patient n'a pas de vice.</h5>
                                            @endif
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="ms-3 namenrow">
                                        <h5 class="font-bold"><i class="bi bi-view-list"></i>&nbsp;&nbsp;Action</h5><br>
                                        <button class="btn btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#xlarge"><i class="bi bi-pencil"></i> Modifier les informations</button>&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="bi bi-arrow-counterclockwise"></i>&nbsp;&nbsp;Historique des consultations</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Identifiant</th>
                                            <th>Medecin</th>
                                            <th>Date</th>
                                            <th>Détails</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($consultations as $c)

                                        <tr>
                                            <td>{{$c->idConsultation}}</td>
                                            <td><a href="{{ route('medecin_details',[$c->idMedecin]) }}">{{$c->prenomMedecin}} {{$c->nomMedecin}}</a></td>
                                            <td>{{$c->dateConsultation}}</td>
                                            <td><a href="{{route('consultations_details',[$c->idConsultation])}}"><i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a></td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade text-left w-100" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h4 class="modal-title" id="myModalLabel16" style="color:white"><i class="fa fa-user"></i>&nbsp;&nbsp;Modifier les informations</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" data-parsley-validate method="POST" action="{{ route('updatePatient', $pat[0]->idPatient) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="idPatient" value="{{$pat[0]->idPatient}}">
                                            <input type="hidden" name="idAddresse" value="{{$pat[0]->idAddresse}}">
                                            <input type="hidden" name="idPersonne" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                            <input type="hidden" name="idContact" value="{{$pat[0]->idContact}}">
                                            <input type="hidden" name="idEmergencyContact" value="{{$pat[0]->idEmergencyContact}}">
                                            <input type="hidden" name="flagTransmis" value="<?php $dt = new datetime();
                                                                                            $dates = $dt->format('Y-m-d H:i:s.u');
                                                                                            echo substr($dates, 0, 23)  ?>" name="flagTransmis">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label for="first-name-column" class="form-label">Prénom</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Prénom" name="prenomPatient" value="{{$pat[0]->prenomPatient}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label for="last-name-column" class="form-label">Nom</label>
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="Nom" name="nomPatient" value="{{$pat[0]->nomPatient}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column" class="form-label">Date de naissance</label>
                                                    <input type="text" name="dateNaissancePatient" required class="form-control" value="{{date('Y-m-d', strtotime($pat[0]->dateNaissancePatient))}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Sexe</label>
                                                    <select class="form-select" name="genrePatient" required>
                                                        <option value="{{$pat[0]->genrePatient}}">( {{$pat[0]->genrePatient}} )</option>
                                                        <option value="M">Masculin</option>
                                                        <option value="F">Feminin</option>
                                                        <option value="A">Autre</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Situation Matrimoniale</label>
                                                    <select class="form-select" name="statusMatrimonialPatient" required>
                                                        <option value="{{$pat[0]->statusMatrimonialPatient}}">( {{$pat[0]->statusMatrimonialPatient}} )</option>
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
                                                    <input type="text" name="uidPatient" class="form-control" value="{{$pat[0]->uidPatient}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <hr>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Adresse</label>
                                                    <input type="text" name="premiereAddresse" class="form-control" value="{{$pat[0]->premiereAddresse}}" required placeholder="Adresse du medecin">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Commune</label>
                                                    <select class="form-select" name="idCommune" required>
                                                        <option value="{{$pat[0]->idCommune}}">( {{$pat[0]->nomCommune}} )</option>
                                                        @foreach($commune as $key => $com)
                                                        <option value="{{ $com->idCommune }}">{{ $com->nomCommune }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Téléphone</label>
                                                    <input type="text" name="telephoneContact" class="form-control" value="{{$pat[0]->telephoneContact}}" required placeholder="Numero de téléphone">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Numero d'urgence</label>
                                                    <input type="text" name="telephoneUrgence" class="form-control" value="{{$pat[0]->telephoneUrgence}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{$pat[0]->email}}" required placeholder="Adresse email">
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
                                                    <input type="text" name="nomRelation" class="form-control" value="{{$pat[0]->nomRelation}}" required placeholder="Nom et Prenom">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Téléphone</label>
                                                    <input type="text" name="telephoneRelation" value="{{$pat[0]->telephoneRelation}}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mandatory">
                                                    <label class="form-label">Lien</label>
                                                    <select class="form-select" name="relation" required>
                                                        <option value="{{$pat[0]->relation}}">( {{$pat[0]->relation}} )</option>
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
                                                <hr>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer les modifications</button>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Fermer</span>
                                    </button>

                                </div>
                                </form>
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
        document.getElementById('pt').classList.add('active');
    </script>

</body>

</html>