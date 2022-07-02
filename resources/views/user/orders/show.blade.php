@extends('layouts.page')

@section('title', $dish->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $dish->name }}</h1>

                {{-- !! Se non è disponibile la chiave di collegamento durante lo show --}}

                {{-- <b>{{ $dish->user->name }}</b>@if ($dish->user->userInfo && $dish->user->userInfo->phone) - <b>{{ $dish->user->userInfo->phone }}</b> @endif<br> --}}

                {{-- !! Importazione degli Assets Immagini con if se non esiste --}}
                {{-- <img src="{{ asset('storage/' . $dish->post_image) }}" alt="{{ $dish->title }}" class="img-fluid"> --}}

                <h3>Descrizione</h3>
                <p>{{ $dish->description }}</p>
                <h3>Ingredienti</h3>
                <p>{{ $dish->ingredients }}</p>
                <h3>Allergeni</h3>
                <p>{{ $dish->allergies }}</p>
                <h3>Prezzo</h3>
                <p>{{ $dish->price }}</p>
            </div>
        </div>
    </div>
@endsection
