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

                               @if($message = Session::get('message'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-green">Modification effectué </header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif
                               
                        @if($message = Session::get('error'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-red">Mot de pass incorect!</header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif

    <div class="page-content">

        <div class="col-lg-7 col-md-3">
             <div class="row">
                   <div class="col-md-12 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Modification du mot de passe</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form  method="POST" action="{{route('Compteupdate',  Auth::user()->id)}}" class="form-horizontal"  enctype="multipart/form-data">
                                            {{ csrf_field() }}


                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Ancien mot de passe</label>
                                              <input type="password" name="passwordA" required class="form-control">
                                            </div>
                                             
                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Nouveau mot de passe</label>
                                              <input type="password" name="passwordN" required class="form-control">
                                            </div>

                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Confirmer le mot de passe</label>
                                              <input type="password" name="passwordC" required class="form-control">
                                            </div>

                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"><i class="fa fa-plus"></i> Modifier</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                </div>
              </div>
 

     <div class="col-lg-5 col-md-3">
  
        <div class="row">
                   <div class="col-md-12 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Modification de la photo</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form  method="POST" action="{{route('updateimage', Auth::user()->id)}}" class="form-horizontal"  enctype="multipart/form-data">
                                            {{ csrf_field() }}


                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Photo</label>
                                                <input type="file" id="file" class="form-control" name="fichier" accept="image/*"> 
                                               <input value="{{$user[0]->image}}" type="hidden" class="form-control" id="dest" name="image">
                                            </div>
                                          
                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"><i class="fa fa-plus"></i> Modifier</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
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









@endsection














