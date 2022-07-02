@extends('layouts.page')

@section('title', $dish->name)

@section('content')
<main>
    <div class="container">
        <h1 class="name text-center pb-4">{{ $dish->user()->first()->name }}</h1>
        <div class="card mx-auto r-15 w-75 overflow-hidden">
            <h2 class="card-header bg-main text-center text-white text-uppercase py-4">{{ $dish->name }}</h2>
            <div class="card-body">
                <h4 class="card-title text-decoration-underline">{{ __('Description')}}:</h4>
                <h5 class="card-text">{{ $dish->description }}<h5>
                <hr>
                <h4 class="card-title text-decoration-underline">{{ __('Ingredients')}}:</h4>
                <h5 class="card-text">{{ $dish->ingredients }}<h5>
                <hr>
                <h4 class="card-title text-decoration-underline">{{ __('Price')}}:</h4>
                <h5 class="card-text">{{ number_format($dish->price / 100, 2, ',', '')}} €<h5>
            </div>
            <div class="card-footer">
                @if ($dish->available)
                <h3 class="text-success fw-bold text-center text-uppercase py-2">{{ __('Available') }} &#9989;</h3>
                @else
                <h3 class="text-danger fw-bold text-center text-uppercase py-2">{{ __('Not Available') }} &#10060;</h3>
                @endif
            </div>
        </div>
        <div class="my-2 w-75 mx-auto d-flex justify-content-between">
            <a href="{{ route('user.dishes.index') }}" class="btn btn-secondary px-4">{{ __('Torna ai piatti')}}</a>
            <a href="{{ route('user.dishes.edit', $dish->id) }}" class="btn btn-primary text-white px-4">{{ __('Edit')
                }}</a>
            <button class="btn btn-danger delete-button text-white px-4" data-id="{{ $dish->id }}">{{ __('Delete')
                }}</button>
        </div>
    </div>
    <div id="alert-screen" class="d-none"></div>
    <div id="alert-window" class="card d-none">
        <h2 class="card-header text-danger text-center py-2">&#128721; {{ __('Warning')}} &#128721;</h2>
        <div class="card-body d-flex flex-column justify-content-around">
            <h1 class="text-center text-danger">Confermi l'eliminazione?</h1>
            <div class="w-75 mx-auto d-flex justify-content-around">
                <form id="confirmation-form" method="POST" data-base="{{ route('user.dishes.index') }}">
                    @csrf
                    @method('DELETE')
                    <button id="confirm-button" class="btn btn-danger text-white">{{ __('Confirm') }}</button>
                </form>
                <button id="cancel-button" class="btn btn-secondary">{{ __('Cancel') }}</button>
            </div>
        </div>
    </div>
</main>
@endsection