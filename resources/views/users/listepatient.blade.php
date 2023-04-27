@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Patient</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->
<div class="container hs_header">
    <div class="page-content">
                            <div class="tab-pane" id="tab2">
                                  <div class="row">
                                        @foreach ($pat as $patient)
                                              <div class="col-md-4">
                                                    <div class="card card-box">
                                                        <div class="card-body no-padding">
                                                            <div class="doctor-profile">
                                                                  <img src="{{URL::to('/')}}/uploads/{{$patient->photoPatient}}" class="doctor-pic" alt=""> 
                                                                  <div class="profile-usertitle">
                                                                      <div class="doctor-name">{{$patient->nomPatient}} {{$patient->prenomPatient}}</div>
                                                                      <div class="name-center">{{ $patient->premiereAddresse}}</div>
                                                                  </div>
                                                                  <p>{{$patient->email}} <br/> {{$patient->dateNaissancePatient}}</p> 
                                                                  <div><p><i class="fa fa-phone"></i><a href="tel:(123)456-7890"> {{$patient->telephoneContact}}</a></p> </div>
                                                                  <div class="profile-userbuttons">
                                                                      <a href="{{route('modifPatient',[$patient->idPatient]) }}" class="btn btn-circle deepPink-bgcolor btn-sm bouton">Plus d'information</a>
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </div>
                                        @endforeach
                                  </div>
                            </div>
    </div>
</div>

@endsection