@extends('layouts.page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="col-md-6 alert alert-danger mx-auto my-3">
                        @foreach ($errors->all() as $error)
                        <h6 class="text-uppercase">
                            <span class="pe-2">&#10060;</span> {{ $error }}
                        </h6>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        {{-- name --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="name" class="col-md-4 col-form-label text-start text-md-end">{{ __('Name')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required maxlength="255" autocomplete="name" autofocus>
                            </div>
                        </div>


                        {{-- email --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="email" class="col-md-4 col-form-label text-start text-md-end">{{ __('E-Mail Address')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required maxlength="255" autocomplete="email">
                            </div>
                        </div>


                        {{-- street --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="street" class="col-md-4 col-form-label text-start text-md-end">{{ __('Address')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="street" type="text" maxlength="255"
                                    class="form-control @error('street') is-invalid @enderror" name="street"
                                    value="{{ old('street') }}" required maxlength="255"autocomplete="street">
                            </div>
                        </div>

                        {{-- cap --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="cap" class="col-md-4 col-form-label text-start text-md-end">{{ __('Cap')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="cap" type="text" pattern="\d{5}"
                                    class="form-control @error('cap') is-invalid @enderror" name="cap"
                                    value="{{ old('cap') }}" required autocomplete="cap">
                            </div>
                        </div>

                        {{-- city --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="city" class="col-md-4 col-form-label text-start text-md-end">{{ __('City')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autocomplete="city">
                            </div>
                        </div>


                        {{-- phone_number --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="phone_number" class="col-md-4 col-form-label text-start text-md-end">{{
                                __('Phone number') }}*</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" maxlength="50"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" required autocomplete="phone_number">
                            </div>
                        </div>



                        {{-- PIVA --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="p_iva" class="col-md-4 col-form-label text-start text-md-end">{{ __('VAT Number')
                                }}*</label>

                            <div class="col-md-6">
                                <input id="p_iva" type="text" maxlength="16" class="form-control @error('p_iva') is-invalid @enderror"
                                    name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva">
                            </div>
                        </div>


                        {{-- categories --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="category" class="col-md-4 col-form-label text-start text-md-end">{{
                                __('Categories') }}*</label>

                            <div class="col-md-6">
                                @foreach ($categories as $category)
                                <div>
                                    <input type="checkbox" name="categories[]" id="category-{{ $category->id }}"
                                        value="{{ $category->id }}" class="form-check-input @error('categories') is-invalid @enderror">
                                    <label for="category-{{ $category->id }}">{{ $category->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- DAY_OFF --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="day_off" class="col-md-4 col-form-label text-start text-md-end">{{ __('Day off')
                                }}*</label>

                            <div class="col-md-6">
                                <select name="day_off" id="day_off" class="form-select" required>
                                    <option selected>Seleziona un giorno</option>
                                    <option value="0">Lunedi</option>
                                    <option value="1">Martedi</option>
                                    <option value="2">Mercoledi</option>
                                    <option value="3">Giovedi</option>
                                    <option value="4">Venerdi</option>
                                    <option value="5">Sabato</option>
                                    <option value="6">Domenica</option>
                                </select>
                            </div>
                        </div>


                        {{-- password --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="password" class="col-md-4 col-form-label text-start text-md-end">{{
                                __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                            </div>
                        </div>


                        {{-- confirm password --}}

                        <div class="form-group row my-3 mx-auto">
                            <label for="password-confirm" class="col-md-4 col-form-label text-start text-md-end">{{
                                __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        {{-- button --}}

                        <div class="form-group row my-3 mx-auto">
                            <div class="col-md-10 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary text-white px-5">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection