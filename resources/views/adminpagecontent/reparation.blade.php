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
            <form class="form-style" method="POST" action="{{ route('diag') }}">
                @csrf
                    <select class="select-cat" id="Select1" name="plaque">
                        <option style="text-align:center;" value="">--- Choisir la plaque du vehicule ---</option>
                        @foreach ($clients as $client) 
                        <option value="{{ $client->client_id}}" >{{ $client->nom_client }}</option>
                        @endforeach
                    </select>
                    @error('mom_vehicule')<div class="text-danger">{{ $message }}</div>@enderror

                    <input class="input-style" name="nombre_panne" type="number" placeholder="Nombre de panne...">
                    @error('nombre_panne')<div class="text-danger">{{ $message }}</div>@enderror
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

@endsection