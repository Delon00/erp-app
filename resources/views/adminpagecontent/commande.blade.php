@extends('dashboard')
@section('content')
<section class="produit-dash">
    <a class="add-product-button" id="toggle-button"><i class="bi bi-plus" id="toggle-icon"></i></a>
    <section class="add-board animate__animated animate__fadeIn">
        <div class="admission-main-row">
            <a href="{{route('clients')}}"><i class="close bi bi-arrow-left-short"></i></a>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <h2>Nouveau diagnostic</h2>
            <p>Ajout d'un nouveau diagnostic</p>
            <form class="form-style" method="POST" action="{{ route('clientform') }}">
                @csrf
                    <select class="select-cat" id="Select1" name="nom_client">
                        <option style="text-align:center;" value="">--- Choisir le nom du client ---</option>
                        @foreach ($clients as $client) 
                        <option value="{{ $client->client_id}}" >{{ $client->nom_client}}</option>
                        @endforeach
                    </select>
                    @error('mom_vehicule')<div class="text-danger">{{ $message }}</div>@enderror

                    <input class="input-style" name="cin" type="text" placeholder="Numéro CIN...">
                    @error('cin')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="tel" type="tel" placeholder="Numéro de tel...">
                    @error('tel')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="mail" type="mail" placeholder="Mail...">
                    @error('mail')<div class="text-danger">{{ $message }}</div>@enderror
                    <button class="btn-style" type="submit">Enregistrer <i class="bi bi-floppy"></i></button>
                <script>
                    var toggleButton = document.getElementById('toggle-button');
                    var form = document.querySelector('.add-board');
                    toggleButton.addEventListener('click', function(event) {
                    toggleButton.classList.toggle('active');
                    form.classList.toggle('active');});
                </script>
            </form>
            
        </div>
    </section>
    <div  class="row align-items-center">
        <div  class="col mx-4">
        <a class="btn-retour" style="text-decoration:none;" href="{{route('clients')}}"><i style="font-size:30px;" class="bi bi-arrow-left-short"></i> Vehicules</a>
            <div class="row justify-content-center align-items-center">
                <div class="col-1 d-flex justify-content-center align-items-center admin-product-search"><i class="bi bi-search"></i></div>
                <div class="col-11 colone-10 "><input class="admin-product-input" type="text" placeholder="Entrez le nom du produit"></div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-7 d-flex align-items-center ">
                    <h2>Clients</h2>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="admin-filtre">
                        <div class="col d-flex justify-content-center bord"><i class="bi bi-filter-right"></i></div>
                        <div class="col d-flex justify-content-center"><i class="bi bi-funnel"></i></div>
                    </div>
                </div>
            </div>
            <div class="row admin-products">
            <div class="row">
                <div class="col "><h5>Nom du client</h5></div>
                <div class="col "><h5>No CIN</h5></div>
                <div class="col "><h5>Numéro </h5></div>
                <div class="col "><h5>Mail </h5></div>
                <div class="col "><h5>Crée le</h5></div>
                <div class="col "><h5>Modifié le</h5></div>
            </div>
            
            @foreach ($clients as $client)
            @php
                $nom_client = $client->nom_client;
                $cin = $client->num_cin;
                $tel = $client->num_tel;
                $mail = $client->mail;
                $create = $client->created_at;
                $update = $client->updated_at;
            @endphp
               <div class="row admission-list-row">
                    <div class="col">{{$nom_client}}</div>
                    <div class="col">{{$cin}}</div>
                    <div class="col">{{$tel}}</div>
                    <div class="col">{{$mail}}</div>
                    <div class="col">{{$create}}</div>
                    <div class="col">{{$update}}</div>
               </div>        
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
