@extends('home.layout')
@section('content')

          <div class="row">
                  <div class="col-md-12">
                      <p>&nbsp;</p>
                  </div>
              </div>

<div class="container" > 
  <!--service start-->


<div class="container" > 
  <!--service start-->
    <div style="display: flex; justify-content: center;">
        <select onchange="location = this.options[this.selectedIndex].value;"  class="overview-panel purple" style="width:250px; height:45px; border-radius:25px; padding: 0 10px;">
             <option >Selectionner L'année</option>
                    @foreach($flag as $key => $user)
                    <option><a href="{{route('statistic',$user->year)}}"></span> {{$user->year}}</a></option>   
                   @endforeach 
        </select>        
   </div>
  </br>

          <!-- start widget -->
        <div class="state-overview">
            <div class="row">
              <div class="col-lg-3 col-sm-6">
                <div class="overview-panel purple" style="border-radius:25px;">
                  <div class="symbol">
                   <i class="fa fa-user-md"></i>
                  </div>
                  <div class="value white">
                    <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{$medecin[0]->total_medecin ?? 0}}" style="font-family:cursive;font-size:22px;">0</p>
                    <p style="font-family:cursive;font-size:12px;">MEDECINS</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                <div class="overview-panel deepPink-bgcolor" style="border-radius:25px;">
                  <div class="symbol">
                    <i class="fa fa-wheelchair-alt"></i>
                  </div>
                  <div class="value white">
                    <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{$patient[0]->total_patient ?? 0}}" style="font-family:cursive;font-size:22px;">0</p>
                    <p style="font-family:cursive;font-size:12px;">PATIENTS</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                <div class="overview-panel orange" style="border-radius:25px;">
                  <div class="symbol">
                    <i class="fa fa-stethoscope"></i>
                  </div>
                  <div class="value white">
                    <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{$departement[0]->total_departement ?? 0}}" style="font-family:cursive;font-size:22px;">0</p>
                    <p style="font-family:cursive;font-size:12px;">DEPARTEMENTS</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-sm-6">
                    <div class="overview-panel blue-bgcolor" style="border-radius:25px;">
                          <div class="symbol">
                            <i class="fa fa-medkit"></i>
                          </div>
                          <div class="value white">
                            <p class="sbold addr-font-h1" data-counter="counterup" data-value="{{$consultation[0]->total_consultation ?? 0}}" style="font-family:cursive;font-size:22px;">0</p>
                            <p style="font-family:cursive;font-size:12px;">CONSULTATIONS</p>
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
                              <header>Frequence des consultations (12 mois) </header>
                              <div class="tools">
                                       
                              </div>
                          </div>
                          <div class="card-body no-padding height-9">
                                <div class="row text-center">
                                    <div class="col-sm-3 col-6">
                                        <span class=""><i class=""></i></span>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <i class=""></i>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h4 class="margin-0"></h4>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="col-sm-3 col-6">
                                        <h4 class="margin-0"></h4>
                                        <p class="text-muted"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="morris_chart_2" class="full-width"></div>
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
                                    <div class="col-sm-8 col-12">
                                        <h4 class="margin-0">Les maladies les plus fréquentes</h4>
                                    </div>
                                  </div>

                                 <div id="morris_chart_4" style="height: 250px; margin:30px"></div>
                    
                             </div>
                         </div>
                     </div>

                    <div class="col-xl-6 col-md-12">
                         <div class="card">
                             <div class="card-block">
                                 <div class="row text-center p-t-10">
                                    <div class="col-sm-12 col-12">
                                        <h4 class="margin-0">Frequence des vaccinations</h4>
                                    </div>
                                   
                                  </div>

                                 <div id="morris_chart_3" style="height: 250px; margin:30px"></div>
                             </div>
                         </div>
                     </div>

                     <div class="col-xl-6 col-md-12">
                         <div class="card">
                             <div class="card-block">
                                 <div class="row text-center p-t-10">
                                    <div class="col-sm-8 col-12">
                                        <h4>Examens les plus fréquents</h4>
                                    </div>
                                  </div>

                                <div class="panel-body">
                                    <div style="height: 250px;padding-bottom:150px;">
                                    @foreach($examenFrequent as $key => $examenFrequents)
                                        <h5>{{ $examenFrequents->exam }}</h5>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100" style="width: {{ $examenFrequents->count/100 }}%;">
                                            {{ $examenFrequents->count/100 }}%
                                        </div>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                    
                             </div>
                         </div>
                     </div>

                     <div class="col-xl-6 col-md-12">
                         <div class="card">
                             <div class="card-block">
                                 <div class="row text-center p-t-10">
                                    <div class="col-sm-8 col-12">
                                        <h4 class="margin-0">Groupes Sanguins les plus fréquents</h4>
                                    </div>
                                  </div>

                                 <div id="morris_chart_5" style="height: 250px; margin:30px"></div>
                    
                             </div>
                         </div>
                     </div>


                     


                     <div class="col-md-6">                        


                        </div>

                   </div>
                     <!-- start new patient list -->



</div>
</div>
  
    <!-- VRAI JS --> 
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jquery.bxslider.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/jquery.mixitup.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/smoothscroll.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/single-0.1.0.js')}}"></script> 
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>


<!-- FIN VRAI JS --> 

<!-- AUTRE JS -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/popper/popper.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/jquery-blockui/jquery.blockui.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/counterup/jquery.waypoints.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/counterup/jquery.counterup.min.js')}}" ></script>
    <script src="{{asset('assets/js/app.js')}}" ></script>
    <script src="{{asset('assets/js/layout.js')}}" ></script>
    <script src="{{asset('assets/js/theme-color.js')}}" ></script>

    <script src="{{asset('assets/plugins/material/material.min.js')}}"></script>
    <script src="{{asset('assets/plugins/morris/morris.min.js')}}" ></script>
    <script src="{{asset('assets/plugins/morris/raphael-min.js')}}" ></script>
    <script src="{{asset('assets/js/pages/chart/morris/morris-home-data.js')}}" ></script>

<script type="text/javascript">
  $(document).ready(function () {

   $("#chart-inutil").hide();
  });

</script>

<script type="text/javascript">
      "use strict";
$(function(){
  $('#homeDoctorList').slimScroll({
    height: '352px'
  });
});
$(function(){
  $('#reviewWindow').slimScroll({
    height: '280px'
  });
});

//Graphe

jQuery(document).ready(function() {
  Morris.Line({
        element: 'line_chart',
        data: [{
            period: '2021-01',
            patients: 35,
            consultations: 67,
            vaccinations: 15,
        },{
            period: '2021-02',
            patients: 140,
            consultations: 189,
            vaccinations: 67,
        },{
            period: '2021-03',
            patients: 50,
            consultations: 80,
            vaccinations: 22,
        }
    ],
    xkey: 'period',
    ykeys: ['patients', 'consultations', 'vaccinations'],
    labels: ['patients', 'consultations', 'vaccinations'],
    pointSize: 3,
    fillOpacity: 0,
    pointStrokeColors: ['#E91E63', '#E67D21', '#2196F3'],
    behaveLikeLine: true,
    gridLineColor: '#e0e0e0',
    lineWidth: 3,
    hideHover: 'auto',
    lineColors: ['#E91E63', '#E67D21', '#2196F3'],
    resize: true
    });
  
});





Morris.Area({
  element: "area_line_chart",
  behaveLikeLine: true,
  data: [
         {w: '2011 Q1', x: 2, y: 0, z: 0},
         {w: '2011 Q2', x: 50, y: 15, z: 5},
         {w: '2011 Q3', x: 15, y: 50, z: 23},
         {w: '2011 Q4', x: 45, y: 12, z: 7},
         {w: '2011 Q5', x: 20, y: 32, z: 55},
         {w: '2011 Q6', x: 39, y: 67, z: 20},
         {w: '2011 Q7', x: 20, y: 9, z: 5}
         ],
         xkey: 'w',
         ykeys: ['x', 'y', 'z'],
         labels: ['X', 'Y', 'Z'],
         pointSize: 0,
         lineWidth: 0,
         resize: true,
         fillOpacity: 0.8,
         behaveLikeLine: true,
         gridLineColor: '#e0e0e0',
         hideHover: 'auto',
         lineColors: ['#222222', '#20B2AA', '#6C96D2']
});

Morris.Bar({
    element: 'bar-example',
    data: [
      { y: '2006', a: 100, b: 90 },
      { y: '2007', a: 75,  b: 65 },
      { y: '2008', a: 50,  b: 40 },
      { y: '2009', a: 75,  b: 65 },
      { y: '2010', a: 50,  b: 40 },
      { y: '2011', a: 75,  b: 65 },
      { y: '2012', a: 100, b: 90 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Series A', 'Series B'],
    barColors: ['#4272B1', '#F37E2B']
  });

    </script>




     <script type="text/javascript">

        jQuery(document).ready(function() {
    'use strict';



    //Frequence des visies
    new Morris.Area({
        element: "morris_chart_2",
        data: [
              @foreach($consultation_graphe as $key => $graphc)
              { y: "{{$graphc->mois}}", a: {{$graphc->totalconsult}}, }, 
            @endforeach  


        ],
        xkey: "y",
        ykeys: ["a"],
        labels: ["patients"],
        lineColors: ["#E67D21"]
    }),
    //Frequence des visites



     // Frequence des vaccination
     new Morris.Bar({
        element: "morris_chart_3",
        data: [@foreach($vaccination_graphe as $key => $graphc)
              { y: "{{$graphc->mois}}", a: {{$graphc->totalVaccin}}, }, 
            @endforeach
        ],
        xkey: "y",
        ykeys: ["a"],
        labels: ["patients"]
    }), 
    // Fin Frequence des vaccination



     // Maladies Frequentes
     new Morris.Donut({
        element: "morris_chart_4",
     
        data: [
         @foreach($maladieFrequent as $key => $maladie)
        {  label: "{{$maladie->malad}}",
            value: "{{$maladie->count}}"},

        @endforeach    
       ],
        colors: ["#EAA228", "#4BB2C5", "#559BD7"]
    })
    // Fin Maladies Frequentes


    // Maladies Frequentes
     new Morris.Donut({
        element: "morris_chart_5",
        data: [
          @foreach($sanguinFrequent as $key => $sanguin)
        {  label: "{{$sanguin->sanguin}}",
            value: "{{$sanguin->count}}"},

        @endforeach
        ],
        colors: ["#EAA228", "#4BB2C5", "#559BD7"]
    })
    // Fin Maladies Frequentes
});

     </script>

@endsection