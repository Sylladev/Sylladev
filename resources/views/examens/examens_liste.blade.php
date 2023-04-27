<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examens - Tulip Santé</title>

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
                        <h3> <i class="fa fa-suitcase-medical"></i>&nbsp;&nbsp;Tous les Examens / Ekg</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Examens</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="page-content">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Examens sans imageries</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type d'examen</th>
                                        <th>Date</th>
                                        <th style="text-align: center;">Détails de l'Examen</th>
                                        <th>Consultations</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($examensDetails as $e)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$e->typeExamens }}</td>
                                        <td>{{$e->flagTransmis }}</td>
                                        <td style="text-align: center;"><a href="#" class="btn icon btn-primary" data-bs-toggle="modal" id="{{$e->idExamen}}" data-bs-target="#galleryModal" onclick="var idExamen=this.id;var categ='examenDetail' ;getExamen(idExamen,categ)"><i class="bi bi-eye"></i></a></td>

                                        <td><a href="{{route('consultations_details',[$e->idConsultation])}}">Voir la consultation <i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a></td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </section>
                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Examens avec imageries</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row gallery">
                                        @foreach($examens as $e)
                                        <div class="col-6 col-sm-6 col-lg-3 mt-5 row">
                                            <a href="#">
                                                <img class="w-100 active" src="{{asset('/uploads/Patients')}}/{{ $e->valeur }}"  data-bs-toggle="modal"  data-bs-target="#galleryModal" data-bs-slide-to="{{ $loop->iteration }}" onclick="var idExamen=this.id;var categ='examen' ;getExamen(idExamen,categ)" id="{{$e->idExamen}}">
                                            </a>
                                        </div>

                                        @endforeach

                                    </div>
                                    <nav aria-label="Page navigation example" style="margin-top: 30px;">
                                        <ul class="pagination pagination-primary">
                                            <li class="page-item"><a class="page-link" href="#">
                                                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                                                </a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">
                                                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                                                </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">EKG</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row gallery">
                                        @foreach($ekg as $e)
                                        <div class="col-6 col-sm-6 col-lg-3 mt-5 row">
                                            <a href="#">
                                                <img class="w-100 active" src="{{asset('/uploads/Patients')}}/{{ $e->filePath }}"  data-bs-toggle="modal"  data-bs-target="#galleryModal" data-bs-slide-to="{{ $loop->iteration }}" onclick="var idEkg=this.id ;getEkg(idEkg)" id="{{$e->idEkgFichier}}">
                                            </a>
                                        </div>

                                        @endforeach

                                    </div>
                                    <nav aria-label="Page navigation example" style="margin-top: 30px;">
                                        <ul class="pagination pagination-primary">
                                            <li class="page-item"><a class="page-link" href="#">
                                                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                                                </a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">
                                                    <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                                                </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal modal-xl fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="galleryModalTitle"><i class="fa fa-info-circle"></i>&nbsp; Plus d'informations </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="galleryContent">


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
            @include('outils.footer')
        </div>
    </div>
    @include('outils.js')

    <script>
        // ajouter une classe
        document.getElementById('exm').classList.add('active');


        function getExamen(idExamen,categ) {
            document.getElementById("galleryContent").innerHTML = '';
            if (categ =='examen') {
              
                $.ajax({
                type: "GET",
                url: `/examen/gallery/${idExamen}`,
                dataType: "json",
                success: function(response) {
                    $.each(response.examen, function(key, value) {
                        $('#galleryContent').append(`

                             <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                </div>
                                <div class="carousel-inner">
                                    <h5>Type d'Examen: <span class="badge bg-secondary">${value.typeExamens}</span>&nbsp;/&nbsp;Fait le :<span class="badge bg-secondary">${value.flagTransmis}</span></h5>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="/uploads/Patients/${value.valeur}">
                                    </div>

                                </div>
                                <a href="/Consultations/consultations_details/${value.idConsultation}">Voir la consultation <i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a>

                            </div>

                        `);
                    })

                }
            })
            }

            if(categ =='examenDetail'){
                
                    $.ajax({
                    type: "GET",
                    url: `/examenDetails/gallery/${idExamen}`,
                    dataType: "json",
                    success: function(response) {
                    
                        $('#galleryContent').append(`

                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Resultat</th>
                                    <th>Niveau</th>
                                </tr>
                            </thead>
                            <tbody id="listApp">

                            </tbody>
                        </table>
                        `);
                        $.each(response.examen, function(key, value) {
                            $('#listApp').append(`<tr>
                                    <td>${value.description}</td>
                                    <td>${value.resultat}</td>
                                    <td>${value.niveauNormaux}</td>
                                </tr>`);
                                
                            })

                    }
                })
            }
             
        }

        function getEkg(idEkg) {
                document.getElementById("galleryContent").innerHTML = '';
         

                $.ajax({
                    type: "GET",
                    url: `/getEkg/gallery/${idEkg}`,
                    dataType: "json",
                    success: function(response) {
                        $.each(response.ekg, function(key, value) {
                            $('#galleryContent').append(`

                                <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#Gallerycarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        Fait le :<span class="badge bg-secondary">${value.flagTransmis}</span></h5>
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="/uploads/Patients/${value.filePath}">
                                        </div>

                                    </div>
                                    <a href="/Consultations/consultations_details/${value.idConsultation}">Voir la consultation <i class="bi bi-arrow-right-circle" style="font-size:25px"></i></a>

                                </div>

                            `);
                        })

                    }
                })
   
            }
    </script>


</body>

</html>