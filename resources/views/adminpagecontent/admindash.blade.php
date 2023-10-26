@extends('dashboard')
@section('content')
    <section class="col dash-welcome">
        <div class="row mb-3">
            <div class="col-9 admin-message">
                <h2 class="mt-auto mb-auto">Bon retour, <strong></strong></h2>
                <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fr_FR', 'fr'); $dateActuelle = strftime('%A %d %B'); ?>
                <p class="mt-auto mb-auto">{{ $dateActuelle }}</p>
            </div>
            <div class="col-2 admin-bell">
                <i style="font-size:25px;" class="bi bi-bell"></i>
            </div>
        </div>
        <div class="admin-form">
            <div class="row align-items-center margin-4">
                <div class="row align-items-center">
                    <div class="col-8">
                        <div class="row"><h3>Beau travail !</h3></div>
                        <div class="row"><p>Vous avez eu plus de {{$clientcount}} réparation au cours des deux dernière semaine </p></div>
                    </div>
                    <div class="col-3">
                        <img class="admin-form-img" src="{{asset('media/admin-form.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="ligne">
            <a href="{{route('admission')}}" class="text-decoration-none row justify-content-center align-items-center total fav">
                <h3 class="text-center px-0 py-0 mx-0 my-0">+{{ $admissionsCount }}<p class="total-text text-center px-0 py-0 mx-0 my-0">Admission</p></h3>
            </a>
            <div class="row justify-content-center align-items-center total fav">
                <h3 class="text-center px-0 py-0 mx-0 my-0">+{{$diag}}<p class="text-center total-text px-0 py-0 mx-0 my-0">Diagnostic</p></h3>
                
            </div>
            <div class="row justify-content-center align-items-center total fav">
                <h3 class="text-center px-0 py-0 mx-0 my-0">+4<p class="text-center total-text px-0 py-0 mx-0 my-0">Réparé</p></h3>
            </div>
        </div>
        <h4 class="margin-l-1">Pieces</h4>
        <div class="ligne vente-recent">
            <div class="vente-recent-form">
                <img src="{{asset('media/filtre-air.jpg')}}" class="img img-responsive ">
                <div class="profile-name">Plaquette</div>
                <div class="profile-username"><div class="text"> 12 disponible</div></div>
            </div>
            <div class="vente-recent-form-droite">
                <div class="ligne">
                    <div class="vente-recent-iconform"><i class="bi bi-bag-plus"></i><p style="font-size:12px;text-align:center">Ajouter une catégorie</p></div>
                    <div class="vente-recent-iconform"><i class="bi bi-bag-plus"></i><p style="font-size:12px;text-align:center">Ajouter une catégorie</p></div>
                </div>
                <div class="ligne">
                    <div class="categorie-vente">
                        <div class="margin-4">
                            <div class="row">
                                <p style="font-size:18px;font-weight:bold; color:#fff">Cat. cartouche</p>
                            </div>
                            <div class="row">
                                <div class="col-7"><p style="color:#fff" class="text-start">37 pieces</p></div>
                                <div class="col-5"><p style="color:#fff" class="text-end">5k Dh</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="col dash-performance">
        <div class="padding-3">
            <br>
            <h3>Performance</h3>
            <div class="ligne">
                <p class="float-left">Nouveaux clients</p>
                <p class="float-right">></p>
            </div>
            <div class="ligne">
                @foreach ($clients as $client)
                @php
                $name = strlen($client->nom_client) > 10 ? substr($client->nom_client, 0, 7) . '...' : $client->nom_client;
                @endphp
                <div class="px-2">
                    <div class="nouveau-client">
                        <i class="bi bi-person-circle"></i>
                    </div >
                    <p style="text-align:center; font-size:12px;">{{$name}}</p>
                </div>
                @endforeach
                </div>
                <h5>Progression</h5>
                <div class="ligne">
                    <div class="progression-card">
                        <div class="margin-3">
                            <div class="ligne">
                                <h6 class="float-left">Temps écoulé:</h6>
                                <h6  class="float-right">0.1h</h6>
                            </div>
                            <div class="progress-bar">
                                <div class="padding-2">
                                    <progress class="custom-progress" value="50" max="100"></progress>
                                </div>
                            </div>
                            <div class="ligne">
                                <p class="float-left"><i class="bi bi-wrench"></i>  1 Panne restante</p>
                            <div class="float-right-50">
                                <div class="valeur-form ligne "> En cours</div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="ligne">
                <div class="progression-card">
                    <div class="margin-3">
                        <div class="ligne">
                        <h6 class="float-left">Temps écoulé:</h6>
                            <h6  class="float-right">22h</h6>
                        </div>
                        <div class="progress-bar">
                        <div class="padding-2">
                            <progress class="custom-progress" value="85" max="100"></progress>
                        </div>
                    </div>
                    <div class="ligne">
                        <p class="float-left"><i class="bi bi-wrench"></i>  1 Panne restante</p>
                        <div class="float-right-50">
                        <div class="valeur-form ligne "> En cours</div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <br>
            <div class="ligne">
                <div class="progression-card">
                    <div class="margin-3">
                        <div class="ligne">
                            <h6 class="float-left">Temps écoulé:</h6>
                            <h6  class="float-right">2h</h6>
                        </div>
                        <div class="progress-bar">
                            <div class="padding-2">
                                <progress class="custom-progress" value="30" max="100"></progress>
                            </div>
                        </div>
                        <div class="ligne">
                            <p class="float-left"><i class="bi bi-wrench"></i>  2 Pannes restante</p>
                            <div class="float-right-50">
                            <div class="valeur-form ligne "> En cours</div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
