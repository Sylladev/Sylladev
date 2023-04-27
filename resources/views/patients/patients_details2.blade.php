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
                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-md-4">
                        @foreach($patient as $p)
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
                                        <h6 class="text-muted mb-4"><b>Sexe : </b>{{$patient[0]->genrePatient}}</h6>
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