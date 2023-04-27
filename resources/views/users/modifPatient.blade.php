@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Patients</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->

<div class="container hs_header">
  <div class="page-content">


                    <!-- wizard with validation-->
              <div class="col-md-12 col-sm-12">

                <!-- MESSAGE D'ALERTE -->                           
                        @if($message = Session::get('edit'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-green">Modification effectuée</header>
                                  </div>
                                </div>
                                &nbsp;                                  
                        @endif          
                       <!-- FIN MESSAGE D'ALERTE -->
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Informations du Patient</header>
                                </div>
                                <div class="card-body " id="bar-parent2">
                                <form  method="POST" action="{{ route('updatePatient', $pat[0]->idPatient) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">

                                  <input type="hidden" name="flagTransmis" value="<?php $dt= new datetime();$dates=$dt->format('Y-m-d H:i:s.u'); echo substr($dates, 0,23)  ?>" name="flagTransmis">


                                      <!-- Left  -->
                                      <div class="col-md-6 col-sm-6">

                                              <div class="form-group">
                                                  <label>Nom</label>
                                                  <input type="text" name="nomPatient" class="form-control" value="{{$pat[0]->nomPatient}}" required >
                                              </div>

                                              <div class="form-group">
                                                  <label>Date de naissance</label>
                                                  <input type="date" name="dateNaissancePatient" required class="form-control" value="{{date('Y-m-d', strtotime($pat[0]->dateNaissancePatient))}}">
                                              </div>

                                              <div class="form-group">
                                                  <label>Commune</label>
                                                  <select class="form-control" name="idCommune" required>
                                                      <option value="{{ $pat[0]->idCommune }}">{{ $pat[0]->nomCommune }}</option>
                                                      @foreach($commune as $key => $com)
                                                            <option value="{{ $com->idCommune }}">{{ $com->nomCommune }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>


                                              <div class="form-group">
                                                  <label>Email</label>
                                                  <input type="text" name="email" class="form-control" required value="{{$pat[0]->email}}">
                                              </div>

                                              <div class="form-group">
                                                  <label>Numero d'urgence</label>
                                                  <input type="number" name="telephoneUrgence" required class="form-control" value="{{$pat[0]->telephoneUrgence}}">
                                              </div>

                                              <div class="form-group">
                                                  <h4 class="font-red">Personne à Contacter en cas d'urgence </h4>
                                                  <hr>
                                              </div>

                                              <div class="form-group">
                                                  <label>Nom du Contact </label>
                                                  <input type="text" name="nomRelation" class="form-control" required value="{{$pat[0]->nomRelation}}">
                                              </div>

                                              <div class="form-group">
                                                  <label>Téléphone</label>
                                                  <input type="number" name="telephoneRelation" required class="form-control" value="{{$pat[0]->telephoneRelation}}">
                                              </div>

                                              <div class="form-group">
                                                  <button type="submit" class="btn btn-circle btn-primary btn-sm bouton"><i class="fa fa-pencil"></i> Modifier les informations</button>
                                              </div>                           


                                      </div>
                                      <!-- End Left  -->




                                      <!-- Right  -->
                                      <div class="col-md-6 col-sm-6">

                                              <div class="form-group">
                                                    <label>Prenom</label>
                                                    <input type="text" name="prenomPatient" class="form-control" required  value="{{$pat[0]->prenomPatient}}">
                                              </div>


                                              <div class="form-group">
                                                    <label>Adresse</label>
                                                    <input type="text" name="premiereAddresse" class="form-control" required value="{{$pat[0]->premiereAddresse}}" >
                                              </div>


                                              <div class="form-group">
                                                    <label>Téléphone</label>
                                                    <input type="number" name="telephoneContact" class="form-control" required value="{{$pat[0]->telephoneContact}}">
                                              </div>

                                              <div class="form-group">
                                                  <label>Situation Matrimoniale</label>
                                                  <input type="text" name="statusMatrimonialPatient" required class="form-control" value="{{$pat[0]->statusMatrimonialPatient}}">
                                              </div>


                                              <div class="form-group">
                                                  <label>Identifiant Bracelet</label>
                                                  <input type="text" name="uidPatient" required class="form-control" value="{{$pat[0]->uidPatient}}">
                                              </div>

                                              <div class="form-group">
                                                  <h4 class="font-red">&nbsp; </h4>
                                                  <hr>
                                              </div>


                                              <div class="form-group">
                                                  <label>Lien</label>
                                                  <select class="form-control" name="relation" required value="{{$pat[0]->relation}}">
                                                      <option>{{$pat[0]->relation}}</option>
                                                      <option>Epous(e)</option>
                                                      <option>Parent</option>
                                                      <option>Ami(e)</option>
                                                  </select>
                                              </div>


                                      </div>
                                      <!-- End Left  -->



                                      <div class="col-md-12 col-sm-6">


                                      </div>





                                </div>
                                </form>
                                </div>
                            </div>
                        </div>



  </div>
</div>



@endsection