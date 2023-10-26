<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Othmane auto</title>
    <link rel="shortcut icon" href="{{asset('media/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('media/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('media/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('media/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('media/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('css/mediaquery.css')}}">
</head>

<body>
  <section class="background-radial-gradient overflow-hidden">
    <style>
      .background-radial-gradient {background-image: url('{{ asset('media/bg-img-1.jpg') }}');background-repeat: no-repeat;background-size: cover;min-height: 100vh;background-attachment: fixed;background-position: center;position: relative; &::before {content: "";position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(0, 0, 0, 0.5);}}
      .btn-primary:hover {background-color: white;border-color: #F48FB1;color: black;}
      .bg-glass {background-color: hsla(0, 0%, 100%, 0.9) !important;border-radius: 15px;backdrop-filter: saturate(200%) blur(25px);box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;}
    </style>
    <div class="container px-4 py-5 px-md-5 d-flex justify-content-center align-items-center my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0 text-center" style="z-index: 10">
          @if(session('login_err'))
          <div class="alert alert-danger"><strong>Erreur</strong>{{ session('login_err') }}</div>
          @endif
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Othmane <br/><span style="color:#ed1c24">auto</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: white">
            Connectez-vous et reprenez vos tâches au sein d'Othmane auto comme si vous n'aviez jamais quitté.
          </p>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
          <div class="card bg-glass">
            <div  class="card-body px-4 py-5 px-md-5">
              <form class="text-center" method="post" action="{{route('login')}}">
                @csrf
                <!-- Email input -->
                <img style="width: 100px; height: 100px;" src="{{asset('media/logo.png')}}" alt="">
                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control" name="email"  />
                  <label class="form-label" for="email">Adresse Email</label>
                  @error("email")
                  {{ $message }}
                  @enderror
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" name="password" />
                  <label class="form-label" for="password">Mot de passe</label>
                  @error("password")
                  {{ $message }}
                  @enderror
                </div>
                <button style="border-radius: 10px;" type="submit" class="btn btn-primary btn-block mb-4">Connexion</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- Section: Design Block -->
<!---------------------------------------------------- Footer ---------------------------------------------------->
<!-------------------------------------------------- Footer fin -------------------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{asset('js/js.js')}}"></script>
</body>
</html>