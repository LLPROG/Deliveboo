<header>
    <div class="container d-flex align-items-center justify-content-between">
        <div class="align-self-start logo">
            <a href="@if(Auth::check()) {{ route('user.index') }} @else {{ route('homepage') }} @endif">
                <h1 class="text-white">DeliveBoo</h1>
                <h4 class="text-white">Ordina, Mangia, Ama!</h4>
                <!-- <img src="{{ asset('/images/logo.svg') }}" style="height: 70px;" alt="logo"> -->
            </a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid justify-content-end">
                @if(Auth::check())
                <button class="navbar-toggler custom-toggler text-white my-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=" custom-toggler navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav text-end">
                        {{-- @if(Auth::check()) --}}
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.index') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{ route('user.orders.index') }}">Ordini</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.dishes.index') }}">Piatti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('user.dishes.create') }}">Nuovo piatto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <strong>{{ __('Logout') }}</strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link text-white text-decoration-underline text-uppercase">{{ Auth::user()->name }}</span>
                        </li>
                    </ul>
                    @else
                    <ul class="navbar-nav text-end">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</header>