<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hopital - Tulip Santé</title>

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
                        <h3><i class="fa-solid fa-hospital"></i>&nbsp;&nbsp;Paramètre de l'Hopital</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hopital</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        @if($message = Session::get('success'))
                        <div class="col-12 col-md-12 order-md-2 order-first">
                            <div class="alert alert-success alert-dismissible show fade">
                                <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        @if($message = Session::get('error'))
                        <div class="col-12 col-md-12 order-md-2 order-first">
                            <div class="alert alert-danger alert-dismissible show fade">
                                <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        @if(empty($hopital))
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <h4 class="card-title mb-4"><i class="fa fa-plus"></i> Informations de l'Hopital</h4>
                                <div class="alert alert-warning alert-dismissible show fade">
                                    <i class="bi bi-info-circle"></i>&nbsp;&nbsp;Attention une fois que ces informations sont insérées , vous ne pourrez plus les modifiées sauf pour un nouveau hopital.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="">
                                    <div class="ms-3 name">
                                        <form class="form" data-parsley-validate method="POST" action="{{route('create_hopital')}}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- HIDDEN INPUT -->
                                            <input type="hidden" value="<?php $dt = new datetime();
                                                                        $dates = $dt->format('Y-m-d H:i:s.u');
                                                                        echo substr($dates, 0, 23)  ?>" name="flagtransmis">
                                            <!-- FIN HIDDEN INPUT -->
                                            <div class="col-md-12">
                                                <div class="form-group mandatory">
                                                    <label for="first-name-column" class="form-label">Nom de l'Hopital</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Saisissez un nom " name="nomHopital" required>
                                                </div>
                                                <div class="form-group mandatory">

                                                    <label for="first-name-column" class="form-label">Pays</label>
                                                    <select class="form-select selectVille" name="premiereAddresse" required id="pays" onchange="getVille()">
                                                        <option selected="">Choisissez le pays</option>
                                                        @foreach($pays as $key => $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <input type="hidden" id="idCommune" name="idCommune" required>
                                                <div class="form-group mandatory">

                                                    <label for="first-name-column" class="form-label">Villes</label>
                                                    <select class="form-select selectVille" name="idAddresse" id="ville" onchange=" document.getElementById('idCommune').value=this.value" required>
                                                        <option selected="">Choisissez une ville</option>

                                                    </select>

                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Effacer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <h4 class="card-title mb-4" style="color:gray"><i class="fa fa-plus"></i> Informations de l'Hopital</h4>
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <i class="bi bi-info-circle"></i>&nbsp;&nbsp;Aucune modification n'est autorisée désormais !
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <div class="">
                                    <div class="ms-3 name">
                                        <form class="form" data-parsley-validate method="POST" action="{{route('create_hopital')}}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- HIDDEN INPUT -->
                                            <input type="hidden" value="<?php $dt = new datetime();
                                                                        $dates = $dt->format('Y-m-d H:i:s.u');
                                                                        echo substr($dates, 0, 23)  ?>" name="flagtransmis">
                                            <!-- FIN HIDDEN INPUT -->
                                            <div class="col-md-12">
                                                <div class="form-group mandatory">
                                                    <label for="first-name-column" class="form-label">Nom de l'Hopital</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Saisissez un nom " value="{{$hopital[0]->nomHopital}}" name="nomHopital" disabled required>
                                                </div>
                                                <div class="form-group mandatory">

                                                    <label for="first-name-column" class="form-label">Pays</label>
                                                    <select class="form-select selectVille" name="premiereAddresse" required id="pays" onchange="getVille()" disabled>
                                                        <option selected="">{{$hopital[0]->pays}}</option>
                                                     
                                                    </select>

                                                </div>
                                                <input type="hidden" id="idCommune" name="idCommune" required>
                                                <div class="form-group mandatory">

                                                    <label for="first-name-column" class="form-label">Villes</label>
                                                    <select class="form-select selectVille" name="idAddresse" id="ville" onchange=" document.getElementById('idCommune').value=this.value" disabled required>
                                                        <option selected="">{{$hopital[0]->ville}}</option>

                                                    </select>

                                                </div>

                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1 disabled">Enregistrer</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1 disabled">Effacer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="col-md-4"></div>
                </section>
            </div>
            @include('outils.footer')
        </div>
    </div>
    @include('outils.js')

    <script>
        // ajouter une classe
        document.getElementById('hpt').classList.add('active');

        function getVille() {

            document.getElementById("ville").innerHTML = "";
            var idPays = document.getElementById('pays').value;

            $.ajax({
                type: "GET",
                url: `/configuration/getVille/${idPays}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);


                    $.each(response.villes, function(key, value) {


                        $('.selectVille').append(`

                        
                        <option value="${value.id}">${value.name}</option>
                            
                        `);

                    });

                }
            })
        }
    </script>

</body>

</html>