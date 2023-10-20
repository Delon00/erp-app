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
            <h2>Admission de véhicules</h2>
            <p>Ajout de nouveau véhicule client</p>

            <form class="form-style" method="POST" action="{{ route('admissionform') }}">
                @csrf
                    <input class="input-style" name="nom_client" type="text" placeholder="Nom du client..." value="{{ old('nom_client') }}">
                    @error('nom_client')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="nom_voiture" type="text" placeholder="Nom du véhicule..." value="{{ old('nom_voiture') }}">
                    @error('nom_voiture')<div class="text-danger">{{ $message }}</div>@enderror
                    <select class="select-cat" id="Select1" name="marque">
                        <option style="text-align:center;" value="">--- Choisir la marque du véhicule ---</option>
                        @foreach ($marques as $marque)
                            <option value="{{ $marque->marque_voiture }}" {{ old('marque') == $marque->marque_voiture ? 'selected' : '' }}>
                                {{ $marque->marque_voiture }}
                                <img src="{{ asset('media/' . $marque->logo_marque) }}" alt="{{ $marque->marque_voiture }}">
                            </option>
                        @endforeach
                    </select>
                    @error('marque')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="serie" type="text" placeholder="Serie du véhicule..." value="{{ old('serie') }}">
                    @error('serie')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="plaque" type="text" placeholder="Plaque d'imatriculation..." value="{{ old('plaque') }}">
                    @error('plaque')<div class="text-danger">{{ $message }}</div>@enderror
                    <input class="input-style" name="panne" type="text" placeholder="Panne..." value="{{ old('panne') }}">
                    @error('panne')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
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
                    <h2>Admission réalisée</h2>
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
                <div class="col "><h5>Nom du véhicules</h5></div>
                <div class="col"><h5>Marque du véhicule </h5></div>
                <div class="col "><h5>Panne</h5></div>
                <div class="col "><h5>Crée le</h5></div>
                <div class="col "><h5>Modifié le</h5></div>
            </div>
            
            @foreach ($admissions as $admission)
            @php
                $nom_client = strlen($admission->nom_client) > 14 ? substr($admission->nom_client, 0, 11) . '...' : $admission->nom_client;
                $nom_voiture = $admission->nom_voiture;
                $marque = $admission->marque_voiture;
                $panne = strlen($admission->panne_declare) > 14 ? substr($admission->panne_declare, 0, 10) . '...' : $admission->panne_declare;
                $create = $admission->created_at;
                $update = $admission->updated_at;
                
            @endphp
               <div class="row admission-list-row">
                    <div class="col">{{$nom_client}}</div>
                    <div class="col">{{$nom_voiture}}</div>
                    <div class="col">{{$marque}}</div>
                    <div class="col">{{$panne}}</div>
                    <div class="col">{{$create}}</div>
                    <div class="col">{{$update}}</div>
               </div>        
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection