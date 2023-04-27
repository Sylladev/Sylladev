
@extends('home.layout')
@section('content')

<!--slider start-->
<div class="health_slider">
	<div class="owl-carousel owl-theme">

    <div class="item">
        <div class="hlc_slider_details">
              <img class="animated fadeInDown" src="{{asset('images/slider/slider0.jpg')}}"  alt="...">
              <div class="hlc_slider_details_text">
                  <div class="container">
                      <!-- Texte du slider -->
                        <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12">
                              <h1 class="hs_slider_title animated bounceInDown" style="opacity:80%;" ><i class="fa fa-user-md"></i> Tulip Health <i class="fa fa-user-md"></i></h1>
                              <a href="{{route('statistic',$annee)}}" class="btn btn-default animated fadeInRightBig">Statistics</a>
                          </div>
                        </div>
                      <!-- Texte du slider -->
                  </div>
            </div>
        </div>
    </div>

    <div class="item">
        <div class="hlc_slider_details">
            <img class="animated fadeInDown" src="{{asset('images/slider/slide3.jpg')}}"  alt="...">
            <div class="hlc_slider_details_text">
                <div class="container">
                    <!-- Texte du slider -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="hs_slider_title animated bounceInDown" style="opacity:80%;"><i class="fa fa-user-md"></i>Tulip Health <i class="fa fa-user-md"></i></h1>
                            <a href="{{route('statistic',$annee)}}" class="btn btn-default animated fadeInRightBig">Statistics</a>
                        </div>
                    </div>
                    <!-- Texte du slider -->
                </div>
            </div>
        </div>
    </div>
    
	</div>
</div>
<!--slider end-->


              <div class="row" id="st">
                  <div class="col-md-12">
                      <p>&nbsp;</p>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                      <p>&nbsp;</p>
                  </div>
              </div>


@endsection