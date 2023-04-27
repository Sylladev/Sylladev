<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les Medecins - Tulip Santé</title>

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
                        <h3><i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;Tous les Medecins</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tous les medecins</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('medecin')}}" type="button" class="btn btn-outline-primary"><i class="bi bi-plus"></i> Nouveau</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Prenom & Nom</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Spécialité</th>
                                        <th>Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medecins as $m)

                                    <tr>

                                        <td>
                                            <a href="">
                                                <div class="avatar avatar-xl">
                                                    <img src="{{asset('/uploads')}}/{{ $m->photo }}" alt="medecin">
                                                </div>
                                            </a>
                                        </td>

                                        <td>{{$m->prenomMedecin}} {{$m->nomMedecin}} </td>
                                        <td>{{$m->email}}</td>
                                        <td>{{$m->telephoneContact}}</td>
                                        <td>{{$m->description}}</td>
                                        <td><a href="{{ route('medecin_details',[$m->idMedecin]) }}"><i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a></td>

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
    document.getElementById('mdc').classList.add('active');
    
    </script>

</body>

</html>