<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistance - Tulip Santé</title>

    @include('outils.css')

</head>

<body style="background-color: white;">
    <div id="app">
        <div id="error">
        

        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center" style="padding-top: 25%;">
                    <img class="img-error" src="{{asset('assets/assets/images/support.jpg')}}" style="height: 12em;" alt="Not Found" style="margin-bottom:15px">
                    <h4 class="error-title"><i class="fa fa-phone"></i> Contact : 660 00 00 01 / 660 00 00 02</h4>
                    <h4 class="error-title"><i class="fa fa-envelope"></i> Email : tulipsantes@gmail.com</h4>
                    <p class="fs-5 text-gray-600">Appelez notre service d'assistance pour vous aider.</p>
                </div>
            </div>
        </div>
        
        
            </div>
    </div>
    @include('outils.js')



</body>

</html>