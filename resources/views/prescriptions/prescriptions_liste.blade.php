<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions - Tulip Santé</title>

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
                        <h3><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Toutes les prescriptions</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Prescriptions</li>
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
                                        <th>No</th>
                                        <th>Date de prescription</th>
                                        <th>Note de prescription</th>
                                        <th>Medicaments</th>
                                        <th>Consultations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($prescriptions as $p)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$p->datePrescription}}</td>
                                        <td>{{$p->description}}</td>
                                        <td>{{$p->medicament}}</td>
                                        <td><a href="{{route('consultations_details',[$p->idConsultation])}}">Voir la consultation <i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a></td>

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
        document.getElementById('pct').classList.add('active');
    </script>

</body>

</html> 