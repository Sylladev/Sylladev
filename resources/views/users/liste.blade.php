<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste utilisateur - Tulip Santé</title>

  @include('outils.css')

</head>

<body>
  <div id="app">
    @include('outils.sidebar')
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3><i class="fa-solid fa-users"></i>&nbsp;&nbsp;Utilisateurs</h3>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord</a></li>
                <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                <li class="breadcrumb-item active" aria-current="page">Liste</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      @if($message = Session::get('success'))
            <div class="col-12 col-md-6 order-md-2 order-first">
                <div class="alert alert-success alert-dismissible show fade">
                    <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            @if($message = Session::get('error'))
            <div class="col-12 col-md-6 order-md-2 order-first">
                <div class="alert alert-danger alert-dismissible show fade">
                    <i class="bi bi-check-circle"></i>&nbsp;&nbsp;{{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
      <div class="page-content">
        <section class="section">
          <div class="card">

            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Prenom & Nom</th>
                    <th>Email</th>
                    <th>Priviège</th>
                    <th>Suppression</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $u)
                  @if($u->id==Auth::user()->id)
                  @else
                  <tr>

                    <td>
                      <a href="">
                        <div class="avatar avatar-xl">
                          <img src="{{asset('/uploads')}}/{{ $u->image }}" alt="medecin">
                        </div>
                      </a>
                    </td>

                    <td>{{$u->prenom}} {{$u->name}} </td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->privilege}}</td>
                    <td style="width: 150px;text-align:center"><a href="{{route('destroy', $u->id)}}" type="button" class="btn btn-danger"><i class="bi bi-trash" style="font-size:25px;"></i></a></td>
                  </tr>
                  @endif

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      @include('outils.footer')
    </div>
  </div>
  @include('outils.js')

  <script>
    // ajouter une classe
    document.getElementById('usr').classList.add('active');
  </script>

</body>

</html>