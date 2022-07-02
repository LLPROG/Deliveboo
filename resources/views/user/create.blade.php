@extends('layouts.page')

@section('title', 'DeliveBoo INDEX')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf

                    <!-- name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('password') }}</label>
                        <input class="form-control" id="password" rows="10" name="password">{{ old('password') }}>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- logo -->
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="content" rows="10" name="content">{{ old('content') }}>
                    </div>
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- street -->
                    <div class="mb-3">
                        <label for="street" class="form-label">{{ __('street') }}</label>
                        <input class="form-control" id="street" rows="10" name="street">{{ old('street') }}>
                    </div>
                    @error('street')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- cap -->
                    <div class="mb-3">
                        <label for="cap" class="form-label">{{ __('cap') }}</label>
                        <input class="form-control" id="cap" rows="10" name="cap">{{ old('cap') }}>
                    </div>
                    @error('cap')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- city -->
                    <div class="mb-3">
                        <label for="city" class="form-label">{{ __('city') }}</label>
                        <input class="form-control" id="city" rows="10" name="city">{{ old('city') }}>
                    </div>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- phone_number -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="content" rows="10" name="content">{{ old('content') }}>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- p_iva -->
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="content" rows="10" name="content">{{ old('content') }}>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- slug -->
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="content" rows="10" name="content">{{ old('content') }}>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- day_off -->
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="content" rows="10" name="content">{{ old('content') }}>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- closed -->
                    <div class="mb-3">
                        <label for="content" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="content" rows="10" name="content">{{ old('content') }}>
                    </div>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- button -->
                    <button>Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
