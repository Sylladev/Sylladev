@extends('home.layout')

@section('content')
			<!-- ENTETE IMAGE-->
		<div class="hs_page_title">
		  <div class="container">
		    <h3>Configurations de bases</h3>
		  </div>
		</div>
		<!-- FIN ENTETE IMAGE-->

			<!-- start page content -->
            <div class="container hs_header">
                <div class="page-content">
					<!-- start widget -->
					<div class="state-overview">
						<div class="row">
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-primary"><i class="fa fa-adn"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Allergies</span>
					              <a href="{{ route('allergie') }}"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					              </div> 
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-warning"><i class="fa fa-hospital-o"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Départements</span>
					               <a href="{{ route('departement') }}"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					               
					              </div>
					              
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-danger"><i class="fa fa-plus"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Maladies</span>
					                <a href="{{ route('maladie') }}"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					                
					              </div>
					             
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-info"><i class="fa fa-heartbeat"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Signes vitaux</span>
					                <a href="{{ route('categoriesignevitaux') }}"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					                
					              </div>
					              
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					      </div>
					      &nbsp;&nbsp;&nbsp;&nbsp;
					      <div class="row">
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-success"><i class="fa fa-user-md"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Specialités</span>
					              <a href="{{route('specialite')}}"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					               
					              </div>
					             
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-orange"><i class="fa fa-wheelchair-alt"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Symptomes</span>
					               <a href="{{route('symptome')}}"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					               
					              </div>
					              
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-dark"><i class="fa fa-stethoscope"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Examens</span>
					                <a href="examen"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					                
					              </div>
					             
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-purple"><i class="fa fa-medkit"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Vaccins</span>
					                <a href="vaccination"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					                
					              </div>
					              
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->

					         <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-white">
					            <span class="info-box-icon push-bottom bg-secondary"><i class="fa fa-eraser"></i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Médicaments</span>
					                <a href="medicaments"><span class="info-box-number">Ajouter</span></a> 
					              <div class="progress">
					                
					              </div>
					              
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
					        <!-- /.col -->
					      </div>
						</div>
					<!-- end widget -->
                </div>
            </div>
            <!-- end page content -->

@endsection