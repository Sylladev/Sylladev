@extends('home.layout')
@section('content')


<div class="container hs_header">
  <div class="page-content">

      <!-- CONTENU DE LA PAGE ICI -->



                  <!-- 
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                  -->

          <!-- start widget -->
          <div class="state-overview">
            <div class="row">
                  <div class="col-xl-3 col-md-6 col-12">
                    <div class="info-box bg-white">
                      <span class="info-box-icon push-bottom bg-primary"><i class="material-icons">group</i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Appointments</span>
                        <span class="info-box-number">450</span>
                        <div class="progress">
                          <div class="progress-bar bg-primary" style="width: 45%"></div>
                        </div>
                        <span class="progress-description">
                              45% Increase in 28 Days
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>


                  <div class="col-xl-3 col-md-6 col-12">
                      <div class="info-box bg-white">
                          <span class="info-box-icon push-bottom bg-warning"><i class="material-icons">person</i></span>
                          <div class="info-box-content">
                              <span class="info-box-text">New Patients</span>
                              <span class="info-box-number">155</span>
                              <div class="progress">
                                  <div class="progress-bar bg-warning" style="width: 40%"></div>
                              </div>
                              <span class="progress-description">40% Increase in 28 Days</span>
                          </div>
                      </div>
                  </div>

                  <div class="col-xl-3 col-md-6 col-12">
                      <div class="info-box bg-white">
                          <span class="info-box-icon push-bottom bg-success"><i class="material-icons">content_cut</i></span>
                          <div class="info-box-content">
                              <span class="info-box-text">Operations</span>
                              <span class="info-box-number">52</span>
                              <div class="progress">
                                <div class="progress-bar bg-success" style="width: 85%"></div>
                              </div>
                              <span class="progress-description">85% Increase in 28 Days</span>
                          </div>
                      </div>
                  </div>


                  <div class="col-xl-3 col-md-6 col-12">
                      <div class="info-box bg-white">
                          <span class="info-box-icon push-bottom bg-info"><i class="material-icons">monetization_on</i></span>
                          <div class="info-box-content">
                                <span class="info-box-text">Hospital Earning</span>
                                <span class="info-box-number">13,921</span><span>$</span>
                                <div class="progress">
                                  <div class="progress-bar bg-info" style="width: 50%"></div>
                                </div>
                                <span class="progress-description"> 50% Increase in 28 Days</span>
                          </div>
                      </div>
                  </div>


                </div> 
            </div>




          <!-- end widget -->
          <div class="row">
              <div class="col-md-12">
                    <div class="card card-box">
                          <div class="card-head">
                              <header>Hospital Survey</header>
                              <div class="tools">
                                  <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                  <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                  <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                              </div>
                          </div>

                          <div class="card-body no-padding height-9">
                                <div class="row text-center">
                                    <div class="col-sm-3 col-6">
                                        <h4 class="margin-0">$ 209 </h4>
                                        <p class="text-muted"> Today's Income</p>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h4 class="margin-0">$ 837 </h4>
                                        <p class="text-muted">This Week's Income</p>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h4 class="margin-0">$ 3410 </h4>
                                        <p class="text-muted">This Month's Income</p>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h4 class="margin-0">$ 78,000 </h4>
                                        <p class="text-muted">This Year's Income</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="line_chart" class="full-width"></div>
                                </div>
                          </div>
                  </div>
              </div>
          </div>

          <div class="row">
                    <div class="col-xl-6 col-md-12">
                         <div class="card">
                             <div class="card-block">
                                 <div class="row text-center p-t-10">
                                    <div class="col-sm-4 col-6">
                                        <h4 class="margin-0">$ 209</h4>
                                        <p class="text-muted">Today's Income</p>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <h4 class="margin-0">$ 837</h4>
                                        <p class="text-muted">This Week's Income</p>
                                    </div>
                                    <div class="col-sm-4 col-6">
                                        <h4 class="margin-0">$ 3410</h4>
                                        <p class="text-muted">This Month's Income</p>
                                    </div>
                                  </div>

                                 <div id="area_line_chart" style="height: 200px; margin:30px"></div>
                                 <div class="row justify-content-center text-center b-t-default m-t-15 p-t-20">
                                     <div class="col-3 b-r-default">
                                         <h5>75%</h5>
                                         <p class="text-muted m-b-0">Satisfied</p>
                                     </div>
                                     <div class="col-3 b-r-default">
                                         <h5>16%</h5>
                                         <p class="text-muted m-b-0">Unsatisfied</p>
                                     </div>
                                     <div class="col-3">
                                         <h5>19%</h5>
                                         <p class="text-muted m-b-0">NA</p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="col-xl-6 col-md-12">
                         <div class="card">
                             <div class="card-block">
                             <div class="row text-center p-t-10">
                                  <div class="col-sm-4 col-6">
                                      <h4 class="margin-0">$ 209 </h4>
                                      <p class="text-muted"> Today's Income</p>
                                  </div>
                                  <div class="col-sm-4 col-6">
                                      <h4 class="margin-0">$ 837 </h4>
                                      <p class="text-muted">This Week's Income</p>
                                  </div>
                                  <div class="col-sm-4 col-6">
                                      <h4 class="margin-0">$ 3410 </h4>
                                      <p class="text-muted">This Month's Income</p>
                                  </div>
                              </div>
                                 <div id="bar-example" style="height: 200px; margin:30px"></div>
                             </div>
                               <div class="row justify-content-center text-center b-t-default m-t-15 p-t-20">
                                   <div class="col-3 b-r-default">
                                       <h5>75%</h5>
                                       <p class="text-muted m-b-0">Satisfied</p>
                                   </div>
                                   <div class="col-3 b-r-default">
                                       <h5>16%</h5>
                                       <p class="text-muted m-b-0">Unsatisfied</p>
                                   </div>
                                   <div class="col-3">
                                       <h5>9%</h5>
                                       <p class="text-muted m-b-0">NA</p>
                                   </div>
                               </div>
                         </div>
                     </div>
                   </div>
                     <!-- start new patient list -->
  </div>
</div>



@endsection