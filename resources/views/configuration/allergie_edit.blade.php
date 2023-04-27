@extends('home.layout')
@section('content')

<!-- ENTETE IMAGE-->
<div class="hs_page_title">
  <div class="container">
    <h3>Allergie</h3>
  </div>
</div>
<!-- FIN ENTETE IMAGE-->

<div class="container hs_header">
  <div class="page-content">
 


          <div class="row">
              <div class="col-md-12 col-sm-6">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Modification</header>
                                  
                                </div>
                                <div class="card-body " id="bar-parent">
                                    <form  method="POST" action="{{route('update_allergie', $allergie[0]->idAllergie)}}">
                                            @csrf  
                                            <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Type d'allergie</label>
                                                 <select  class="form-control select @error('name') is-invalid @enderror" type="text" name="type" required autocomplete="name" autofocus>
                                                        <?php 
                                                          $data = $allergie[0]->type;
                                                          if($data == "drug"){
                                                            echo '<option value="'.$data.'">Medicaments</option>';
                                                            echo '<option value="food">Nourriture</option>';
                                                          } 
                                                          else {
                                                            echo '<option value="'.$data.'">Nourriture</option>';
                                                            echo '<option value="drug">Medicaments</option>';
                                                          }
                                                         ?>
                                                        
                                                 </select>
                                            </div>
                             
                                            <div class="col-lg-3 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <label for="simpleFormEmail">Description</label>
                                              <input type="text" name="description" value="{{$allergie[0]->description}}" required class="form-control">
                                            </div>
                                            
                                            <input type="hidden" value="<?php $dt= new datetime();$dates=$dt->format('Y-m-d H:i:s.u'); echo substr($dates, 0,23)  ?>" name="flagTransmis" >

                                            <div class="col-lg-12 col-md-2 col-sm-2 col-xs-2 form-group">
                                              <button type="submit" class="btn blue-bgcolor btn-outline m-b-6  btn-circle bouton"><i class="fa fa-pencil"></i> Modifier</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                </div>
          </div>


  </div>
</div>



@endsection