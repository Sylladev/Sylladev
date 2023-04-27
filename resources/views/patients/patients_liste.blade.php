<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients - Tulip Santé</title>

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
                        <h3> <i class="fa-solid fa-bed"></i>&nbsp;&nbsp;Tous les Patients</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Patients</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="section">
                    <div class="card">

                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Prenom & Nom</th>
                                        <th>Contact</th>
                                        <th>Adresse</th>
                                        <th>Groupe Sanguin</th>
                                        <th>Date d'Enregistrement</th>
                                        <th>Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($patients as $p)

                                    <tr>

                                        <td>
                                            <a href="">
                                                <div class="avatar avatar-xl">
                                                    <img src="{{asset('/uploads/Patients')}}/{{ $p->idPatient }}/Personal/{{ $p->photoPatient }}" alt="medecin">
                                                </div>
                                            </a>
                                        </td>

                                        <td>{{$p->prenomPatient}} {{$p->nomPatient}} </td>
                                        <td>{{$p->telephoneContact}}</td>
                                        <td>{{$p->premiereAddresse}}</td>
                                        <td>{{$p->groupeSanguinPatient}}</td>
                                        <td>{{$p->dateRegistration}}</td>
                                        <td><a href="{{ route('patient_details',[$p->idPatient]) }}"><i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
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