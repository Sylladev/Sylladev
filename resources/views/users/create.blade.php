@extends('home.layout')
@section('content')
<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Utilisateur</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->
<div class="container hs_header">
  <div class="page-content">
<script>
    function escapeRegExp(str) {
      return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
    }
</script> 
                     @if($message =Session::get('message'))
                               <div  class="alert alert-info">
                                 <p>{{$message}}</p>
                               </div>
                            @endif
                             @if($error =Session::get('error'))
                               <div  class="alert alert-info">
                                 <p>{{$error}}</p>
                               </div>
                            @endif
                <div class="row" style="background-color: white;">
                        <div class="col-md-12 col-sm-12">  
                                <div class="card-head">
                                    <header>ENREGISTREMENT</header>
                                    <button id = "panel-button1" 
                                   class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
                                   data-upgraded = ",MaterialButton">
                                </button> 
                                </div>
                                <div class="card-body" id="bar-parent1">
                                    <form method="POST" action="{{route('create_user')}}" class="form-horizontal"  enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-body">

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Nom
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="name" data-required="1" class="form-control" placeholder="Nom"/> </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Prenom
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" name="prenom" data-required="1" class="form-control" placeholder="Prenom" /> </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Email
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                       
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email"> </div>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Image
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                     <input type="file" id="file"  name="fichier" accept="image/*"> 
                                                      <input type="hidden" class="form-control" id="dest" name="image">                                             
                                                   
                                            </div>
                                            </div>
                                         </div>

                                        <div class="col-md-6">
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Mot de passe
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe" oninput="form.confirm.pattern = escapeRegExp(this.value)"> </div>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Confirmer
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control" name="password" placeholder="Confirmer le mot de passe"  title="Les deux Mot de Passe doivent correspondre" id="confirm" required autocomplete="new-password"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Privilege
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="privilege">
                                                        <option value="">Select...</option>
                                                        <option value="admin">admin</option>
                                                        <option value="user">user</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?php $dt= new datetime();$dates=$dt->format('Y-m-d H:i:s.u'); echo substr($dates, 0,23)  ?>" name="flagTransmis" >
                                        </div>
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;

                                          <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"><i class="fa fa-plus"></i> Ajouter</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    

                                      <div class="modal-body">
                                        Modal body text goes here.
                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                </div>
                          </div>
                    </div>
  </div>
</div>

@endsection