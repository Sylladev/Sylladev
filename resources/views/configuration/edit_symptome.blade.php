@extends('home.layout')

@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Symptome</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->

<div class="container hs_header">
  <div class="page-content">
          <div class="row">
              <div class="col-md-12 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Modifier la specialité</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form  method="POST" action="{{ route('update_symptome',$symptomes[0]->idSymptome) }}">
                                            {{ csrf_field() }}

                                             <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Département</label>
                                                 <select  class="form-control select @error('name') is-invalid @enderror" type="text" name="idDepartement" required autocomplete="name" autofocus>
                                                 <option value="{{$symptomes[0]->idDepartement}}">{{$symptomes[0]->descriptionDep}}</option>
                                                   @foreach($departement as $key => $departements)
                                                 <option value="{{$departements->idDepartement}}">{{$departements->description}}</option>
                                                     @endforeach  
                                                        
                                                 </select>
                                            </div>
                             
                                            <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Description</label>
                                              <input type="text" value="{{$symptomes[0]->descriptionSym}}" name="description" required class="form-control">
                                            </div>
                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"> <i class="fa fa-pencil"></i>Modifier</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                </div>
          </div>

  </div>
</div>



@endsection