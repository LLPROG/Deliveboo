@extends('layouts.page')

@section('title', $dish->name)

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica il piatto</div>
    
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('user.dishes.update', $dish->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
    
                                    <!-- name -->
                                    <div class="form-group row my-3 mx-auto">
                                        <label for="name" class="col-md-2 col-form-label text-start text-md-end">{{ __('Name') }}</label>
                                        <div class="col-md-10">
                                            <input required type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name ) }}">
                                        </div>
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
    
    
                                    <!-- description -->
                                    <div class="form-group row my-3 mx-auto">
                                        <label for="description" class="col-md-2 col-form-label text-start text-md-end">{{ __('Description') }}</label>
                                        <div class="col-md-10">
                                            <textarea required type="text" class="form-control" id="description" rows="10" name="description">{{ old('description', $dish->description) }}</textarea>
                                        </div>
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
    
    
                                    <!-- ingredients -->
                                    <div class="form-group row my-3 mx-auto">
                                        <label for="ingredients" class="col-md-2 col-form-label text-start text-md-end">{{ __('Ingredients') }}</label>
                                        <div class="col-md-10">
                                            <textarea required type="text" class="form-control" id="ingredients" rows="10" name="ingredients">{{ old('ingredients', $dish->ingredients) }}</textarea>
                                        </div>
                                    </div>
                                        @error('ingredients')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
    
                                        <!-- allergies -->
                                        <div class="form-group row my-3 mx-auto">
                                            <label for="allergies" class="col-md-2 col-form-label text-start text-md-end">{{ __('Allergies') }}</label>
                                            <div class="col-md-10">
                                                <textarea required type="text" class="form-control" id="allergies" rows="10" name="allergies">{{ old('allergies', $dish->allergies) }}</textarea>
                                            </div>
                                        </div>
                                        @error('allergies')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
    
    
                                        <!-- price -->
                                        <div class="form-group row my-3 mx-auto">
                                            <label for="price" class="col-md-2 col-form-label text-start text-md-end">{{ __('Price') }}</label>
                                            <div class="col-md-10">
                                                <input required class="form-control" id="price" rows="10" name="price" value="{{ old('price', $dish->price) }}">
                                            </div>
    
                                        </div>
                                        @error('street')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
    
                                        <!-- available -->
                                        <div class="form-group row my-3 mx-auto">
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <input required type="radio" class="" id="available" name="available" @if ($dish->available === 1) checked @endif value=1>
                                                    <label for="available">Disponibile</label>
    
                                                </div>
                                                <div>
    
                                                    <input required type="radio" class="" id="not-available" name="available" @if ($dish->available === 0) checked @endif value=0>
                                                    <label for="not-available">Non disponibile</label>
                                                </div>
                                            </div>
                                        </div>
                                        @error('available')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
                                        <!-- button -->
                                        <div class="form-group row-col my-3 d-flex justify-content-center">
                                            <button class="btn btn-primary px-5 text-white">{{ __('Update') }}</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection