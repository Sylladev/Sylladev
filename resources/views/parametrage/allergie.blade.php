<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>allergie - Tulip Santé</title>

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
                        <h3><i class="fa-solid fa-cog"></i>&nbsp;&nbsp;Allergie</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Parametrage</li>
                                <li class="breadcrumb-item active" aria-current="page">Allergie</li>
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
                <section class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <h4 class="card-title mb-4"><i class="fa fa-plus"></i> Nouvelle allergie</h4>
                                <div class="">
                                    <div class="ms-3 name">
                                        <form class="form" data-parsley-validate method="POST" action="{{ route('create_allergie') }}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- HIDDEN INPUT -->
                                            <input type="hidden" name="idAllergie" value="<?php echo substr(md5(uniqid() . rand(0, 10000)), 0, 7);  ?>">
                                            <input type="hidden" value="<?php $dt = new datetime();
                                                                        $dates = $dt->format('Y-m-d H:i:s.u');
                                                                        echo substr($dates, 0, 23)  ?>" name="flagTransmis">
                                            <!-- FIN HIDDEN INPUT -->
                                            <div class="col-md-12">
                                                <div class="form-group mandatory">
                                                    <label for="first-name-column" class="form-label">Type</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Type" name="type" required>
                                                </div>
                                                <div class="form-group mandatory">
                                                    <label for="first-name-column" class="form-label">Description</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Description" name="description" required>
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


                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5><i class="fa fa-list"></i>&nbsp;&nbsp;Allergie</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                           
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th style="width:50px">Modifier</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allergies as $a)

                                        <tr>
                                            <td>{{$a->type}}</td>
                                            <td>{{$a->description}}</td>
                                            <td style="width:50px">
                                                <a href="#" type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" id="{{$a->idAllergie}}" data-bs-target="#info" onclick="var idAllergie=this.id ;getAllergie(idAllergie)"><i class="fa fa-pencil"></i></a>
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!--info theme Modal -->
            <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel130" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title white" id="myModalLabel130"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Modification de l'Allergie
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" data-parsley-validate method="POST" action="{{ route('update_allergie') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- HIDDEN INPUT -->
                                <input type="hidden" name="idAllergie" id="idAllergie">
                                <input type="hidden" value="<?php $dt = new datetime();$dates = $dt->format('Y-m-d H:i:s.u');echo substr($dates, 0, 23)  ?>" name="flagTransmis">
                                <!-- FIN HIDDEN INPUT -->
                                <div class="col-md-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Type</label>
                                        <input type="text" id="TypeAllergie" class="form-control" placeholder="Type"  name="type" required>
                                    </div>
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Description</label>
                                        <input type="text" id="DescAllergie" class="form-control" placeholder="Description" name="description" required>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Enregistrer les modifications</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Fermer</span>
                            </button>
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
        document.getElementById('prm').classList.add('active');

        //Trouver l'allergie
        function getAllergie(idAllergie) {
  
            $.ajax({
                type:"GET",
                url:`/configuration/edit_allergie/${idAllergie}`,
                dataType:"json",
                success:function(response){
                   
                    $.each(response.allergie,function(key,value){
                        document.getElementById('idAllergie').value = idAllergie;
                        document.getElementById('TypeAllergie').value =value.type;
                        document.getElementById('DescAllergie').value= value.description;
                    })
                   
                }
            })
            
        }
    </script>

</body>

</html>