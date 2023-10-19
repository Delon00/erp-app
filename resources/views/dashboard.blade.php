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
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaquery.css')}}">
</head>
<body>  
    <section class="container-fluid section-admin">
        <div id="adminModal" class="modal modal-admin">
            <div class="modal-dialog">
                <div class="modal-content modal-content-admin">
                    <ul class="px-5">
                        <li class="li-admin"> <a class="a-admin ad" href="{{route('admindash')}}"><i class="bi bi-kanban"></i> Dashboard</a> </li>
                        <li class="li-admin"> <a class="a-admin ad" href="{{route('produits')}}"><i class="bi bi-box2-heart"></i> Pieces</a> </li>
                        <li class="li-admin"> <a class="a-admin ad" href="{{route('clients')}}"><i class="bi bi-car-front-fill"></i> Vehicules</a> </li>
                        <li class="li-admin"> <a class="a-admin ad" href="{{route('commande')}}"><i class="bi bi-people"></i></i> Client</a> </li>
                        <!-- <li class="li-admin"> <a class="a-admin ad" href="{{route('review')}}"><i class="bi bi-star-half"></i> Diagnostic</a> </li> -->
                        <li class="li-admin"> <a class="a-admin ad" href="{{route('parametre')}}"><i class="bi bi-gear"></i> Paramètres</a> </li>
                        <form id="d-flex justify-content-center" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="logout-admin"><i class="bi bi-box-arrow-left a-admin ad">Se déconnecter</i></button>
                        </form>
                    </ul>                   
                </div>
            </div>
        </div>
        <div  class="row admin-first-row">
            <div class="menu">
                <div class="top">
                    <img class="profile" src="{{asset('media/logo.png')}}" alt="">
                </div>
                <div class="milieu">
                    <ul class="ul-admin ">
                        <li class="{{ Request::is('admindash') ? 'li-admin-active animate__animated animate__zoomIn' : 'li-admin' }}"><a class="a-admin" href="{{route('admindash')}}"><i class="bi bi-kanban"></i> Dashboard</a> </li>
                        <li  class="{{ Request::is('produits') ? 'li-admin-active animate__animated animate__zoomIn' : 'li-admin' }}"><a class="a-admin" href="{{route('produits')}}"><i class="bi bi-wrench-adjustable-circle"></i> Pieces</a> </li>
                        <li  class="{{ Request::is('clients') ? 'li-admin-active animate__animated animate__zoomIn' : 'li-admin' }}"><a class="a-admin" href="{{route('clients')}}"><i class="bi bi-car-front-fill"></i> Vehicules</a> </li>
                        <li  class="{{ Request::is('commande') ? 'li-admin-active animate__animated animate__zoomIn' : 'li-admin' }}"><a class="a-admin" href="{{route('commande')}}"><i class="bi bi-people"></i> Clients</a> </li>
                        <!-- <li  class="{{ Request::is('review') ? 'li-admin-active animate__animated animate__zoomIn' : 'li-admin' }}"><a class="a-admin" href="{{route('review')}}"><i class="bi bi-activity"></i> Diagnostic</a> </li> -->
                        <li  class="{{ Request::is('parametre') ? 'li-admin-active animate__animated animate__zoomIn' : 'li-admin' }}"><a class="a-admin" href="{{route('parametre')}}"><i class="bi bi-gear"></i> Paramètres</a> </li>
                    </ul>
                </div>
                <div class="bottom">
                    <form id="" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="logout-admin"><i class="bi bi-box-arrow-left"></i> Se déconnecter</button>
                    </form>
                </div>
            </div>
            <div class="col-10 content animate__animated animate__zoomIn  ">
                <div class="row justify-content-center admindash-main-row">
                    <div class="row menu-admin-responsive">
                        <div class="col-6 d-flex justify-content-start align-items-center align content-center"><a class="menu-admin-responsive" data-toggle="modal" data-target="#adminModal"><i class="bi bi-list"></i></a></div>
                        <div class="col-6 d-flex justify-content-end align-items-center align content-center"><img class="profile-admin" src="{{asset('media/profile.png')}}" alt=""></div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/js.js')}}"></script>
</body>
</html>