<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicament - Tulip Santé</title>

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
                        <h3><i class="fa-solid fa-cog"></i>&nbsp;&nbsp;Médicament</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Parametrage</li>
                                <li class="breadcrumb-item active" aria-current="page">Médicament</li>
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
                                <h4 class="card-title mb-4"><i class="fa fa-plus"></i> Nouveau Médicament</h4>
                                <div class="">
                                    <div class="ms-3 name">
                                        <form class="form" data-parsley-validate method="POST" action="{{ route('create_medicament') }}" enctype="multipart/form-data">
                                            @csrf
                                            <!-- HIDDEN INPUT -->
                                            <input type="hidden" value="<?php $dt = new datetime();
                                                                        $dates = $dt->format('Y-m-d H:i:s.u');
                                                                        echo substr($dates, 0, 23)  ?>" name="flagTransmis">
                                            <!-- FIN HIDDEN INPUT -->
                                            <div class="col-md-12">
                                                <div class="form-group mandatory">
                                                    <label for="first-name-column" class="form-label">Catégorie Médicament</label>
                                                <select class="form-select" name="idCategorieMedicament" required>
                                                  <option>Selectioné la catégorie</option>
                                                  @foreach($categ as $key => $cat)
                                                        <option value="{{ $cat->idCategorieMedicament }}">{{ $cat->description }}</option>
                                                  @endforeach
                                              </select>
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
                                <h5><i class="fa fa-list"></i>&nbsp;&nbsp;Médicament</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Catégorie</th>
                                            <th>Description</th>
                                            <th style="width:50px">Modifier</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($medicaments as $m)

                                        <tr>
                                            <td>{{$m->idMedicament}}</td>
                                            <td>{{$m->descCateg}}</td>
                                            <td>{{$m->descMedoc}}</td>
                                            <td style="width:50px">
                                                <a href="#" type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal" id="{{$m->idMedicament}}" data-bs-target="#info" onclick="var idMedicament=this.id ;getMedicament(idMedicament)"><i class="fa fa-pencil"></i></a>
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
                            <h5 class="modal-title white" id="myModalLabel130"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Modification du médicament
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" data-parsley-validate method="POST" action="{{ route('update_medicament') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- HIDDEN INPUT -->
                                <input type="hidden" name="idMedicament" id="idMedicament">
                                <input type="hidden" value="<?php $dt = new datetime();$dates = $dt->format('Y-m-d H:i:s.u');echo substr($dates, 0, 23)  ?>" name="flagTransmis">
                                <!-- FIN HIDDEN INPUT -->
                                <div class="col-md-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Catégorie Medicament</label>
                                        <select name="idCategorieMedicament" id="" class="form-select selectCat" >
                                            
                                        </select>
                                     
                                    </div>
                                    <div class="form-group mandatory">
                                        <label for="first-name-column" class="form-label">Description</label>
                                        <input type="text" id="DescMedicament" class="form-control" placeholder="Description" name="description" required>
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
        function getMedicament(idMedicament) {
  
            $.ajax({
                type:"GET",
                url:`/parametrage/edit_medicament/${idMedicament}`,
                dataType:"json",
                success:function(response){
                    console.log(response);
                   
                    $.each(response.medicaments,function(key,value){
                        document.getElementById('idMedicament').value = value.idMedicament;
                      
                        document.getElementById('DescMedicament').value= value.descMedoc;
                    
                        $('.selectCat').append(`

                        <option value="${value.idCategorieMedicament}">( ${value.descCateg} )</option>
                        
                            
                        `);

                    });
                    $.each(response.categorieMedicaments,function(key,value){
                       
                    
                        $('.selectCat').append(`

                        <option value="${value.idCategorieMedicament}">${value.description}</option>
                        
                            
                        `);
                        
                    });
                   
                }
            })
            
        }
    </script>

</body>

</html>