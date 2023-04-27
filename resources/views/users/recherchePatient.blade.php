@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Recherche</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->
<div class="container hs_header">
  <div class="page-content">
                           @if($error =Session::get('error'))
                               <div  class="alert alert-danger">
                                 <p>{{$error}}</p>
                               </div>
                            @endif
        <!-- FORMULAIRE -->           
          <div class="row">
              <div class="col-md-12 col-sm-4">
                            <div class="card card-box">
                                <div class="card-body " id="bar-parent">
                                    <form  method="POST" action="{{route('indexpat')}}">
                                          {{ csrf_field() }}
                                        <h4>Rechercher un patient</h4>
                                           <div class="form-group row" >
                                                <label class="control-label col-md-0">Par 
                                                </label>
                                                <div class="col-md-6" >
                                                    <select class="form-control" id="par">
                                                        <option value="">Select...</option>
                                                        <option value="nom">Nom</option>
                                                        <option value="tel">Telephone</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <input id="tel"  type="text" name="telephoneContact" data-required="1" class="form-control" placeholder="Tel"/>
                                            <input id="nom" type="text" name="nomPatient" data-required="1" class="form-control" placeholder="Nom et Prenom"/>
                                            </div>
                                             <center>
                                            <button type="submit"  class="btn blue-bgcolor btn-outline m-b-6  btn-circle "><i class="fa fa-find"></i> Rechercher</button>
                                           </center>
                                    </form>
                               
                            </div>
                </div>
          </div>
        <!-- FIN FORMULAIRE --> 
  </div>
</div>
@endsection