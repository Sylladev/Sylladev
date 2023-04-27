<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non autorisée - Tulip Santé</title>

    @include('outils.css')

</head>

<body>
    <div id="app">
        @include('outils.sidebar')
        <div id="error">
        

        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="{{asset('assets/assets/images/error-403.svg')}}" alt="Not Found">
                    <h1 class="error-title">Page non autorisée</h1>
                    <p class="fs-5 text-gray-600">Vous n'avez pas le privilege de visiter cette page.</p>
                    <a href="{{route('home')}}" class="btn btn-lg btn-outline-primary mt-3">Accueil</a>
                </div>
            </div>
        </div>
        
        
            </div>
    </div>
    @include('outils.js')

    <script>
    // ajouter une classe
    document.getElementById('tb').classList.add('active');
    
    </script>

</body>

</html>