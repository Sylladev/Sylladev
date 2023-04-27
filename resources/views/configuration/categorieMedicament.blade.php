<div class="col-md-12">
                                    <div class="card card-box">
                                        <div class="card-head">
                                            <header>Liste des Categories de medicaments</header>
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
                                                        <th>Categories</th>
                                                        <th width="130px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                 @foreach($categ as $key => $catego)

                                                   <tr>
                                                        <td>{{ $catego->idCategorieMedicament}}</td>
                                                        <td >{{ $catego->description }}</td>
                                                        <td>
                                                          <a href="{{ route('edit_categorieMedicament',[$catego->idCategorieMedicament])}}" class="btn btn-primary btn-xs bouton">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                            <button  class="btn btn-danger btn-xs bouton" data-toggle="modal" data-target="#popupdelete{{ $key+1 }}">
                                                                <i class="fa fa-trash-o "></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                        <div class="modal fade" id="popupdelete{{ $key+1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <center>
                                                                              <div class="modal-body">
                                                                                Etes-vous sûr de vouloir supprimer ?
                                                                              </div>

                                                                              <div class="modal-footer">
                                                                                <a href="{{route('delete_categorieMedicament',[$catego->idCategorieMedicament])}}" class="btn btn-danger bouton" >Oui</a>
                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                <button type="button" class="btn btn-primary bouton" data-dismiss="modal">Non</button>
                                                                              </div>
                                                                        </center>
                                                                    </div>
                                                              </div>
                                                        </div>
                                                @endforeach

                                                </tbody>
                                            </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>