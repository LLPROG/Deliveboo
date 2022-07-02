@extends('layouts.page')

@section('title', 'Piatti')

@section('content')
{{-- @dd($orders) --}}
<main>
    <div class="container">
        <h1 class="name text-center pb-4">{{ $user->name }}</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($dishes as $dish)
            <div class="col">
                <div class="card h-100 r-15">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title d-flex justify-content-between">
                                <a href="{{ route('user.dishes.show', $dish->id) }}" class="text-decoration-none text-uppercase">{{$dish->name}}</a>
                                @if ($dish->available == 1)
                                <i class="fas fa-check"></i>
                                @else
                                <i class="fas fa-times"></i>
                                @endif
                            </h5>
                            <p class="card-text py-3">{{$dish->ingredients}}</p>
                        </div>
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-primary text-white px-4"
                                href="{{ route('user.dishes.edit', $dish->id) }}">{{ __('Edit') }}</a>
                            <button class="btn btn-danger delete-button text-white px-4"
                                data-id="{{ $dish->id }}">{{ __('Delete') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div id="alert-screen" class="d-none"></div>
    <div id="alert-window" class="card d-none">
        <h2 class="card-header text-danger text-center py-2">&#128721;  {{ __('Warning')}}  &#128721;</h2>
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
