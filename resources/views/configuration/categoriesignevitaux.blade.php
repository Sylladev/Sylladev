@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Signes Vitaux</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->

<div class="container hs_header">
  <div class="page-content">


                      <!-- MESSAGE D'ALERTE -->
                       @if($message = Session::get('success'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-blue">Enregistrement effectué</header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif

                       @if($message = Session::get('error'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-red">{{$message }}</header>
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

        <!-- FORMULAIRE -->           
          <div class="row">
              <div class="col-md-12 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Signe Vital</header>
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form  method="POST" action="{{ route('create_categoriesignevitaux') }}">
                                            {{ csrf_field() }}
                                            <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Description</label>
                                              <input type="text" name="description"  required class="form-control" >
                                            </div>

                                            <!-- HIDDEN INPUT -->
                                            <input type="hidden" name="idCatSV" value="<?php echo substr(md5(uniqid().rand(0,10000)),0,7);  ?>">
                                            <input type="hidden" value="<?php $dt= new datetime();$dates=$dt->format('Y-m-d H:i:s.u'); echo substr($dates, 0,23)  ?>" name="flagTransmis" >
                                            <!-- FIN HIDDEN INPUT -->

                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"><i class="fa fa-plus"></i> Ajouter</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                </div>
          </div>
        <!-- FIN FORMULAIRE --> 



        <!-- LISTE --> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Liste</header>
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
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                 @foreach($categoriesignevitaux as $key => $sv)

                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td >{{ $sv->description }}</td>
                                                        
                                                        <td>
                                                            <a href="{{ route('edit_categoriesignevitaux',$sv->idCatSV)}}" class="btn btn-primary btn-xs bouton">
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
                                                                                <a href="{{ route('delete_categoriesignevitaux',$sv->idCatSV) }}" class="btn btn-danger bouton" >Oui</a>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          <!-- FIN LISTE --> 

  </div>
</div>



@endsection