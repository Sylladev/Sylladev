@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Informations du Medecin</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->

<div class="container hs_header">
  <div class="page-content">


                      <!-- MESSAGE D'ALERTE -->
                       @if($message = Session::get('success'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-green">Enregistrement effectué </header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif


                       @if($message = Session::get('delete'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-red">Suppression effectuée</header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif
                             
                        @if($message = Session::get('edit'))
                                <div class="row">
                                    <div class="col-md-12 col-sm-6">
                                          <header class="panel-heading panel-heading-yellow">Modification effectuée</header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif          
                       <!-- FIN MESSAGE D'ALERTE -->



                  <div class="col-md-12 col-sm-12">
                       <div class="profile-tab-box">
                            <div class="p-l-20">
                                <ul class="nav ">
                                    <li class="nav-item tab-all"><a class="nav-link active show" href="#tab1" data-toggle="tab">About Me</a></li>
                                    <li class="nav-item tab-all p-l-20"><a class="nav-link active show" href="#tab2" data-toggle="tab">Activity</a></li>
                                    <li class="nav-item tab-all p-l-20"><a class="nav-link active show" href="#tab3" data-toggle="tab">Settings</a></li>
                                </ul>
                            </div>
                        </div>
                  </div>


                  <div class="col-md-5 col-sm-12">
                    <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="profile-userpic">
                                                <img src="{{URL::to('/')}}/public/uploads/{{$medecin[0]->photo}}" style="height:100px;width:100px;" class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name"> Dr. {{$medecin[0]->nomMedecin}} {{$medecin[0]->prenomMedecin}} </div>
                                            <div class="profile-usertitle-job"> {{$medecin[0]->departement}} </div>
                                        </div>
                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Followers</b> <a class="pull-right">1,200</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Following</b> <a class="pull-right">750</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Friends</b> <a class="pull-right">11,172</a>
                                            </li>
                                        </ul>
                                        <!-- END SIDEBAR USER TITLE -->
                                        <!-- SIDEBAR BUTTONS -->
                                        <div class="profile-userbuttons">
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary" data-upgraded=",MaterialButton,MaterialRipple">Follow<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink" data-upgraded=",MaterialButton,MaterialRipple">Message<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
                                        </div>
                                        <!-- END SIDEBAR BUTTONS -->
                                    </div>
                      </div>
                    </div>



                    <!-- wizard with validation-->
                    <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Compte du Medecin</header>
                                </div>
                                <div class="card-body " id="bar-parent2">
                                <form  method="POST" action="{{ route('create_medecin') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                  <div class="row">

                                  <input type="hidden" name="idMedecin" value="<?php echo substr(md5(uniqid().rand(0,10000)),0,7);  ?>">
                                  <input type="hidden" name="idAddresse" value="<?php echo substr(md5(uniqid().rand(0,10000)),0,7);  ?>">
                                  <input type="hidden" name="idUser" value="<?php echo substr(md5(uniqid().rand(0,10000)),0,7);  ?>">
                                  <input type="hidden" name="idContact" value="<?php echo substr(md5(uniqid().rand(0,10000)),0,7);  ?>">
                                  <input type="hidden" name="idEmergencyContact" value="<?php echo substr(md5(uniqid().rand(0,10000)),0,7);  ?>">
                                  <input type="hidden" name="flagTransmis" value="<?php $dt= new datetime();$dates=$dt->format('Y-m-d H:i:s.u'); echo substr($dates, 0,23)  ?>" name="flagTransmis">

                                      <!-- GAUCHE -->
                                      <div class="col-md-6 col-sm-6">

                                        <div class="form-group">
                                              <h4 class="txt-success">Informations du Medecin </h4>
                                          </div>
                                          
                                          <div class="form-group">
                                              <label>Nom</label>
                                              <input type="text" name="nomMedecin" class="form-control" required placeholder="Entrer le nom">
                                          </div>


                                          <div class="form-group">
                                              <label>Date de naissance</label>
                                              <input type="text" name="dateDeNaissance" required class="form-control">
                                          </div>

                                          <div class="form-group">
                                              <label>Situation Matrimoniale</label>
                                              <select class="form-control" name="statusMatrimonialMedecin" required>
                                                  <option></option>
                                                  <option>Célibataire</option>
                                                  <option>Marié(e)</option>
                                                  <option>Veuf/Veuve</option>
                                                  <option>Divorcé(e)</option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <label>Adresse</label>
                                              <input type="text" name="premiereAddresse" class="form-control" required placeholder="Adresse du medecin">
                                          </div>


                                          <div class="form-group">
                                              <label>Departement</label>
                                              <select class="form-control" name="idDepartement" required>
                                                  <option></option>
                                                        <option value=""></option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <label>Téléphone</label>
                                              <input type="text" name="telephoneContact" class="form-control" required placeholder="Numero de téléphone">
                                          </div>


                                          <div class="form-group">
                                              <label>Email</label>
                                              <input type="text" name="email" class="form-control" required placeholder="Adresse email">
                                          </div>

                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <h4 class="font-red">Personne à Contacter en cas d'urgence </h4>
                                          </div>


                                          <div class="form-group">
                                              <label>Nom de la personne</label>
                                              <input type="text" name="nomRelation" class="form-control" required placeholder="Nom et Prenom">
                                          </div>


                                          <div class="form-group">
                                              <label>Lien</label>
                                              <select class="form-control" name="relation" required>
                                                  <option></option>
                                                  <option>Epous(e)</option>
                                                  <option>Parent</option>
                                                  <option>Ami(e)</option>
                                              </select>
                                          </div>









                                          <div class="form-group">
                                              <hr>
                                          </div>

                                          <div class="form-group">
                                              <h4 class="txt-success">Informations de Connexion </h4>
                                          </div>


                                          <div class="form-group">
                                              <label>Nom d'utilisateur</label>
                                              <input type="text" name="username" required class="form-control" placeholder="Nom d'utilisateur">
                                          </div>

                                          <div class="form-group">
                                                <div class="compose-editor">
                                                <label>Photo de Profil</label>
                                                  <input type="file" name="photo" class="default" accept="image/*">
                                              </div>
                                            </div>


                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"><i class="fa fa-plus"></i> Ajouter</button>
                                          </div>

                                      </div>
                                      <!-- FIN GAUCHE -->




                                      <!-- DROITE -->
                                      <div class="col-md-6 col-sm-6">

                                          <div class="form-group">
                                              <h4 class="txt-success">&nbsp; </h4>
                                          </div>

                                          <div class="form-group">
                                              <label>Prenom</label>
                                              <input type="text" name="prenomMedecin" required class="form-control" placeholder="Entrer le prenom">
                                          </div>

                                          <div class="form-group">
                                              <label>Sexe</label>
                                              <select class="form-control" name="genreMedecin" required>
                                                  <option></option>
                                                  <option value="Masculin">Masculin</option>
                                                  <option value="Feminin">Feminin</option>
                                                  <option value="Autre">Autre</option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <label>Identifiant Bracelet</label>
                                              <input type="text" name="uidMedecin" required class="form-control">
                                          </div>

                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <label>Commune</label>
                                              <select class="form-control" name="idCommune" required>
                                                  <option></option>
                                                        <option value=""></option>
                                              </select>
                                          </div>


                                          <div class="form-group">
                                              <label>Specialité</label>
                                              <select class="form-control" name="idSpecialite" required>
                                                  <option></option>
                                                        <option value=""></option>
                                              </select>
                                          </div>

                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <label>Numero d'urgence</label>
                                              <input type="text" name="telephoneUrgence" required class="form-control">
                                          </div>


                                          <div class="form-group">
                                              <label>&nbsp;</label>
                                               <label class="form-control" style="border:none;">&nbsp;</label>
                                          </div>



                                          <div class="form-group">
                                              <hr>
                                          </div>


                                          <div class="form-group">
                                              <h4 class="txt-success">&nbsp; </h4>
                                          </div>

                                          <div class="form-group">
                                              <label>Téléphone</label>
                                              <input type="text" name="telephoneRelation" required class="form-control">
                                          </div>

                                          <div class="form-group">
                                              <label>&nbsp;</label>
                                               <label class="form-control" style="border:none;">&nbsp;</label>
                                          </div>


                                          





                                          <div class="form-group">
                                              <hr>
                                          </div>

                                          <div class="form-group">
                                              <h4 class="txt-success">&nbsp; </h4>
                                          </div>

                                          <div class="form-group">
                                              <label>Mot de Passe</label>
                                              <input type="password" name="password" autocomplete="off" required class="form-control" placeholder="Entrer le mot de passe">
                                          </div>


                                      </div>
                                      <!-- FIN DROITE -->



                                  </div>
                                  </form>
                                </div>
                            </div>
                        </div>



  </div>
</div>



@endsection