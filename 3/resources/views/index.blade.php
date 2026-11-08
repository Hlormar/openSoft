@extends('layouts.app')

@section('title', 'Warhammer 40,000 — Factions')

@section('content')

    
        <h1 class="text-center text-white mb-4">Империя человечества</h1>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fas fa-spinner fa-spin me-2 text-primary"></i>
                    <strong class="me-auto">Загрузка</strong>
                    <small>Сейчас</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    этот функционал недоступен.
                </div>
            </div>
        </div>

        <div class="row  row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-4 justify-content-center" id="cards-container">


        @foreach ($fractions as $fraction)
            
            <!-- Карточка -->
            <div class="col">
                <div class="card card-view h-100" data-bs-toggle="modal" data-bs-target="#fractionModal" data-url="{{ route('fractions.show', $fraction) }}">
                    <img src="{{ asset('storage/laravel/' . $fraction->image_path) }}" class="card-img-top img-fluid" alt="{{ $fraction->name}}">
                    <div class="card-body card-view-textbox">
                        <h3 class="card-title">{{ $fraction->name}}</h3>
                        <h4 class="card-subtitle mb-2">Fraction</h4>
                        <p class="card-text">{{ $fraction->subtitle}}</p>
                    </div>
                </div>
            </div>


        @endforeach
        <!-- Modal -->
        @include('partial.modal')

        </div>


    <script src="{{ mix('js/main.js') }}"></script>


@endsection