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
               @if($message = Session::get('message1'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-yellow">Modification effectué </header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif
                  @if($message = Session::get('message'))
                                <div class="row">
                                  <div class="col-md-12 col-sm-6">
                                        <header class="panel-heading panel-heading-green">Enregistrement effectué </header>
                                    </div>
                                </div>
                                &nbsp;                                  
                       @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Liste des Utilisateurs</header>
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
                                                        <th>ID</th>
                                                        <th>Nom</th>
                                                        <th>Prenom</th>
                                                        <th>Email</th>
                                                        <th>Privilege</th>
                                                        <th>Image</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                             @foreach($users as $key => $user)
                                            <tr>
                                                    <td> {{$user->id}} </td>
                                                    <td> {{$user->name}} </td>
                                                    <td> {{$user->prenom}}</td>
                                                    <td> {{$user->email}}</td> 
                                                    <td> {{$user->privilege}}</td>
                                                    <td> <img src="{{URL::to('/')}}/uploads/{{$user->image}}" style="height: 40px; width: 40px"></td>

                                                     <td>
                                                            <a class="btn btn-primary btn-xs bouton" href="{{route('edit', $user->id)}}"><i class="fa fa-pencil"></i></a>
                                                            <a class="btn btn-danger btn-xs bouton"  href="{{route('destroy', $user->id)}}"><i  class="fa fa-trash-o "></i></a>
                                                   </td>
                                            </tr>
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