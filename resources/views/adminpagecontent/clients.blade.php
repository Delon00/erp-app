@extends('dashboard')
@section('content')
<section class="app-section">
    <div class="row">
        <div class="col my-3">
            <a href="{{route('admission')}}" class="app-card" >
                <img style src="{{asset('media/add-car.png')}}" alt="">
                <div class="col">
                    <p style="font-size:17px;margin-bottom:0px; font-weight:bold;">Admission de véhicules</p>
                    <p style="font-size:12px;margin-bottom:0px;">Ajout de nouveau véhicule client</p>
                </div>
            </a>
        </div>
        <div class="col my-3">
            <a href="{{route('diagnostic')}}" class="app-card">
                <img style src="{{asset('media/add-diag.png')}}" alt="">
                <div class="col">
                    <p style="font-size:17px;margin-bottom:0px; font-weight:bold;">Diagnostic de véhicules</p>
                    <p style="font-size:12px;margin-bottom:0px;">Diagnostic complet de l'etat du véhicule</p>
                </div>
            </a>
        </div>
        <div class="col my-3">
            <a href="{{route('reparation')}}" class="app-card">
                <img style src="{{asset('media/repair-car.png')}}" alt="">
                <div class="col">
                    <p style="font-size:17px;margin-bottom:0px; font-weight:bold;">En réparation</p>
                    <p style="font-size:12px;margin-bottom:0px;">Consultation de l'etat des réparations des véhicules</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row ">
        <div class="col my-3">
            <a class="app-card">
                <img style src="{{asset('media/add-car.png')}}" alt="">
                <div class="col">
                    <p style="font-size:17px;margin-bottom:0px; font-weight:bold;">Admission de véhicules</p>
                    <p style="font-size:12px;margin-bottom:0px;">Ajout de nouveau véhicule client</p>
                </div>
            </a>
        </div>
        <div class="col my-3">
            <a class="app-card">
                <img style src="{{asset('media/add-car.png')}}" alt="">
                <div class="col">
                    <p style="font-size:17px;margin-bottom:0px; font-weight:bold;">Admission de véhicules</p>
                    <p style="font-size:12px;margin-bottom:0px;">Ajout de nouveau véhicule client</p>
                </div>
            </a>
        </div>
        <div class="col my-3">
            <a class="app-card">
                <img style src="{{asset('media/add-car.png')}}" alt="">
                <div class="col">
                    <p style="font-size:17px;margin-bottom:0px; font-weight:bold;">Admission de véhicules</p>
                    <p style="font-size:12px;margin-bottom:0px;">Ajout de nouveau véhicule client</p>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection
