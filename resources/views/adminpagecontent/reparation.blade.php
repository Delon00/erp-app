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
            <h2>Nouvelle réparation</h2>
            <p>Ajout d'un nouvelle réparation</p>
            <form class="form-style" method="POST" action="{{ route('reparationform') }}">
                @csrf
                    <select class="select-cat" id="Select1" name="nomclient">
                        <option style="text-align:center;" value="">--- Choisir le nom du client ---</option>
                        @foreach ($clients as $client) 
                        <option value="{{ $client->client_id}}" >{{ $client->nom_client }}</option>
                        @endforeach
                    </select>
                    @error('nomclient')<div class="text-danger">{{ $message }}</div>@enderror

                    <input class="input-style" name="nomtraitant" type="text" placeholder="Nom du traitant...">
                    @error('nomtraitant')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="nomtraitant" type="text" placeholder="Nom du traitant...">
                    @error('nomtraitant')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="pannestraite" type="number" placeholder="Nombre de panne traitée...">
                    @error('pannestraite')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="panesrestant" type="number" placeholder="Nombre de panne restant...">
                    @error('panesrestant')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="total" type="text" placeholder="Montant total...">
                    @error('total')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="paye" type="text" placeholder="Montant payée...">
                    @error('paye')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="due" type="text" placeholder="Reste a solder...">
                    @error('due')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="status" type="text" placeholder="Status de la réparation...">
                    @error('status')<div class="text-danger">{{ $message }}</div>@enderror

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
                        <h2>Véhicule en réparation/réparé</h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="admin-filtre">
                            <div class="col d-flex justify-content-center bord"><i class="bi bi-filter-right"></i></div>
                            <div class="col d-flex justify-content-center"><i class="bi bi-funnel"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ligne">
                <div class="progression-card-reparation">
                        <div class="ligne">
                        <h5 class="float-left">Client: Adnane</h5>
                            <h6  class="float-right">Temps écoulé: 22h</h6>
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
</section>

@endsection