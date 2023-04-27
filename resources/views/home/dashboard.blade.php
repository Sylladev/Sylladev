<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Tulip Santé</title>

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
                        <h3><i class="bi bi-grid-fill"></i> Tableau de bord - {{$year}}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first ">

                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                            <select onchange="window.location=this.value;" class="form-select" id="inputGroupSelect01" style="width: 200px;">
                                <option selected=""> Filtre par ans ...</option>
                                @foreach($flag as $key => $f)
                                <option value="{{route('homeFilter',$f->year)}}"><a href="{{route('homeFilter',$f->year)}}">{{$f->year}}</a></option>
                                @endforeach

                            </select>
                        </nav>
                    </div>

                </div>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="fa-solid fa-bed"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Patients</h6>
                                                <h6 class="font-extrabold mb-0">{{$patients}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="fa-sharp fa-solid fa-children"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Enfants</h6>
                                                <h6 class="font-extrabold mb-0">{{$patientsEnfant}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="fa-solid fa-stethoscope"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Consultations</h6>
                                                <h6 class="font-extrabold mb-0">{{$consultations}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="fa-solid fa-user-doctor"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Medecins</h6>
                                                <h6 class="font-extrabold mb-0">{{$medecins}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                       
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><i class="fa-solid fa-chart-simple"></i>&nbsp;&nbsp;Statistique des consultations</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><i class="fa-solid fa-disease"></i>&nbsp;&nbsp;Maladies les plus fréquentes</h4>
                                    </div>
                                    <div class="card-body">
                                        @if(empty($a))
                                        <h5 class="text-muted mb-4">Statistique indisponible...</h5>
                                        @else
                                        <div class="row mb-10">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-circle-dot" style="color:#DE404F"></i>
                                                    <h5 class="mb-0 ms-3">{{$maladie1[0]->description}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="mb-0"><span class="badge bg-secondary">{{$cas1}} Cas</span></h5>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="row mb-10">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-circle-dot" style="color:#5350E9"></i>
                                                    <h5 class="mb-0 ms-3">{{$maladie2[0]->description}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="mb-0"><span class="badge bg-secondary">{{$cas2}} Cas</span></h5>
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="row mb-10">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-circle-dot" style="color:#0A8F7A"></i>
                                                    <h5 class="mb-0 ms-3">{{$maladie3[0]->description}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <h5 class="mb-0"><span class="badge bg-secondary">{{$cas3}} Cas</span></h5>
                                            </div>

                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><i class="fa-solid fa-hospital-user"></i> Patients recents</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Prenom & Nom</th>
                                                        <th>Groupe Sanguin</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($patientsRecents as $p)
                                                    <tr>
                                                        <td class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="{{asset('/uploads/Patients')}}/{{ $p->idPatient }}/Personal/{{ $p->photoPatient }}">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">{{$p->prenomPatient}} {{$p->nomPatient}}</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-3">
                                                            <p class=" mb-0">{{$p->groupeSanguinPatient}}</p>
                                                        </td>
                                                        <td class="col-3">
                                                            <p class=" mb-0">{{$p->statusMatrimonialPatient}}</p>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{asset('/uploads')}}/{{ Auth::user()->image }}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{ Auth::user()->prenom }} {{ Auth::user()->name }}</h5>
                                        <h6 class="text-muted mb-0">{{ Auth::user()->privilege }}</h6><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4> <i class="fa-solid fa-user-doctor"></i>&nbsp;&nbsp;Medecins Connectés</h4>
                            </div>
                            <div class="card-content pb-4">
                                @foreach($medecinsConnecter as $m)
                                
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="{{asset('/uploads')}}/{{ $m->photo }}">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{$m->prenomMedecin}} {{$m->nomMedecin}}</h5>
                                        <h6 class="text-muted mb-0">{{$m->description}}</h6>
                                    </div>
                                </div>
                                @endforeach
                                <div class="px-4">
                                    <a type="button" href="{{ route('medecin_presence') }}" class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'><i class="fa-solid fa-eye"></i>&nbsp;&nbsp;Voir plus</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fa-solid fa-percent"></i>&nbsp;&nbsp;Patients</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
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
        document.getElementById('tb').classList.add('active');
        var jan = '{{$jan}}',
            fev = '{{$fev}}',
            mar = '{{$mar}}',
            avr = '{{$avr}}',
            mai = '{{$mai}}',
            juin = '{{$juil}}',
            juil = '{{$juil}}',
            aout = '{{$aout}}',
            sep = '{{$sep}}',
            oct = '{{$oct}}',
            nov = '{{$nov}}',
            dec = '{{$dec}}';


        //Js des graphes

        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'consultations',
                data: [jan, fev, mar, avr, mai, juin, juil, aout, sep, oct, nov, dec]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["Jan", "Fev", "Mar", "Avr", "Mai", "Juin", "Juil", "Aout", "Sep", "Oct", "Nov", "Dec"],
            },
        }
        var maladeFemale = '{{$maladeFemale}}';
        var maladeMale = '{{$maladeMale}}';
        console.log(maladeMale);
        let optionsVisitorsProfile = {
            series: [parseInt(maladeMale), parseInt(maladeFemale)],
            labels: ['Homme', 'Femme'],
            colors: ['#435ebe', '#55c6e8'],
            chart: {
                type: 'donut',
                width: '100%',
                height: '350px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }

        var optionsEurope = {
            series: [{
                name: 'series1',
                data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605]
            }],
            chart: {
                height: 80,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            colors: ['#5350e9'],
            stroke: {
                width: 2,
            },
            grid: {
                show: false,
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z", "2018-09-19T07:30:00.000Z", "2018-09-19T08:30:00.000Z", "2018-09-19T09:30:00.000Z", "2018-09-19T10:30:00.000Z", "2018-09-19T11:30:00.000Z"],
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false,
                }
            },
            show: false,
            yaxis: {
                labels: {
                    show: false,
                },
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        let optionsAmerica = {
            ...optionsEurope,
            colors: ['#008b75'],
        }
        let optionsIndonesia = {
            ...optionsEurope,
            colors: ['#dc3545'],
        }



        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
        var chartEurope = new ApexCharts(document.querySelector("#chart-europe"), optionsEurope);
        var chartAmerica = new ApexCharts(document.querySelector("#chart-america"), optionsAmerica);
        var chartIndonesia = new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia);

        chartIndonesia.render();
        chartAmerica.render();
        chartEurope.render();
        chartProfileVisit.render();
        chartVisitorsProfile.render()
    </script>

</body>

</html>