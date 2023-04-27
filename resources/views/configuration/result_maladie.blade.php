@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Maladie</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->

<div class="container hs_header">
  <div class="page-content">

        <!-- LISTE --> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    @if($maladies != [])
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Liste des Maladies</header>
                                            <div class="tools">
                                                  <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                                  <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                                  <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                        <div class="table-responsive">

                                            

                                                
                                        <table class="table table-striped custom-table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Code</th>
                                                        <th style="max-width:100px;" >Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>


                                                <tbody>
                                                 @foreach($maladies as $key => $maladie)

                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td >{{ $maladie->idMaladie }}</td>
                                                        <td>{{ $maladie->description }}</td>
                                                        
                                                        <td>
                                                            <a href="{{ route('edit_maladie',[$maladie->idMaladie])}}" class="btn btn-primary btn-xs bouton">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <button class="btn btn-danger btn-xs bouton"  data-toggle="modal" data-target="#popupdelete{{ $key+1 }}">
                                                                <i class="fa fa-trash-o "></i>
                                                            </button>
                                                        </td>
                                                    </tr>



                                                    <!-- Pop Up Suppression -->
                                                        <div class="modal fade" id="popupdelete{{ $key+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <center>
                                                                              <div class="modal-body">
                                                                                Etes-vous sûr de vouloir supprimer ?
                                                                              </div>

                                                                              <div class="modal-footer">
                                                                                <a href="{{ route('delete_maladie',[$maladie->idMaladie]) }}" class="btn btn-danger bouton" >Oui</a>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <button type="button" class="btn btn-primary bouton" data-dismiss="modal">Non</button>
                                                                              </div>
                                                                        </center>
                                                                    </div>
                                                              </div>
                                                        </div>
                                                    <!-- Fin Pop Up Suppression -->
                                                @endforeach   

                                                    
                                                </tbody>




                                            </table>
                                            
                                             

                                          </div>




                                          <div class="speaker text-left">
                                            
                                          </div>

                                        </div>
                                    </div>
                                    @else
                                        <h1>Aucun resultat</h1>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
          <!-- FIN LISTE --> 

  </div>
</div>





@endsection