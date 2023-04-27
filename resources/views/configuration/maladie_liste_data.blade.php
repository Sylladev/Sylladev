
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
                                                