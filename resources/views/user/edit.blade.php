@extends('layouts.page')

@section('title', $user->name)

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('user.update') }}" method="post">
                    @csrf
                    @method('PUT')

                    <!-- name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('email') }}</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('password') }}</label>
                        <input class="form-control" id="password" rows="10" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- logo -->
                    <div class="mb-3">
                        <label for="logo" class="form-label">{{ __('logo') }}</label>
                        <input class="form-control" id="logo" rows="10" name="logo">{{ old('logo', $user->logo) }}>
                    </div>
                    @error('logo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- street -->
                    <div class="mb-3">
                        <label for="street" class="form-label">{{ __('street') }}</label>
                        <input class="form-control" id="street" rows="10" name="street">{{ old('street', $user->street) }}>
                    </div>
                    @error('street')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- cap -->
                    <div class="mb-3">
                        <label for="cap" class="form-label">{{ __('cap') }}</label>
                        <input class="form-control" id="cap" rows="10" name="cap">{{ old('cap', $user->cap) }}>
                    </div>
                    @error('cap')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- city -->
                    <div class="mb-3">{{  }}
                        <label for="city" class="form-label">{{ __('city') }}</label>
                        <input class="form-control" id="city" rows="10" name="city">{{ old('city', $user->city) }}>
                    </div>
                    @error('city')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- phone_number -->
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">{{ __('Content') }}</label>
                        <input class="form-control" id="phone_number" rows="10" name="phone_number">{{ old('phone_number', $user->phone_number) }}>
                    </div>
                    @error('phone_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- p_iva -->
                    <div class="mb-3">
                        <label for="available" class="form-label">{{ __('available') }}</label>
                        <input class="form-control" id="available" rows="10" name="available">{{ old('available') }}>
                    </div>
                    @error('available')
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
                        <label for="day_off" class="form-label">{{ __('day_off') }}</label>
                        <input class="form-control" id="day_off" rows="10" name="day_off">{{ old('day_off') }}>
                    </div>
                    @error('day_off')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!-- closed -->
                    <div class="mb-3">
                        <label for="closed" class="form-label">{{ __('closed') }}</label>
                        <input class="form-control" id="closed" rows="10" name="closed">{{ old('closed') }}>
                    </div>
                    @error('closed')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- button -->
                    <button>Update</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
