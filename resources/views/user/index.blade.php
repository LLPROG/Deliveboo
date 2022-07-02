@extends('layouts.page')

@section('title', 'DeliveBoo INDEX')

@section('content')
<main class="dashboard">
    <div class="container">

        {{-- <a href="{{ route('user.dishes.index', $user->id) }}">Modifica piatti</a> --}}
        <h1 class="name text-center py-3">
            {{ $user->name }}
        </h1>
        {{-- <ul>
            @foreach ($dishes as $dish)
            <li>
                {{$dish->name}}
                <ul>
                    @foreach ($dish->orders as $order)
                    <li>
                        {{$order->order_number}} - {{$order->customer_surname}}
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>

        <ul>
            @foreach ($orders as $order)
            <li>
                {{$order->order_number}} - {{$order->customer_surname}} {{$order->customer_name}} - {{
                number_format($order->final_price / 100, 2, ',', '')}} €
                <ul>
                    @foreach ($order->dishes as $dish)
                    <li>
                        {{$dish->pivot->quantity}} - {{$dish->name}} - {{ number_format($dish->price / 100, 2, ',', '') }} €
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul> --}}
        <div class="row row-cols-1 row-cols-md-2 py-3 align-items-stretch">
            <div class="col mb-4">
                <div class="square pt-4 pb-5 px-3 bg-tealblue position-relative h-100">
                    <h2 class="pb-2 text-center text-uppercase">I tuoi ultimi ordini</h2>
                    <table class="w-100">
                        <thead>
                            <th class="text-center">Numero Ordine</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Importo</th>
                        </thead>
                        <tbody>
                            @foreach (array_slice($orders, -3) as $order)
                            <tr>
                                <td>{{$order->order_number}}</td>
                                <td>{{$order->customer_surname}} {{$order->customer_name}}</td>
                                <td class="text-end">{{
                                    number_format($order->final_price / 100, 2, ',', '')}} €</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="bg-white corner rounded-pill">
                        <a href="{{ route('user.orders.index') }}" class="p-3">Vedi tutti gli ordini &#x2192;</a>v
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="square pt-4 pb-5 px-3 bg-bluemunsell position-relative h-100">
                    <h2 class="pb-2 text-center text-uppercase">I tuoi ultimi piatti</h2>
                    <table class="w-100">
                        <thead>
                            <th class="text-center">Piatto</th>
                            <th class="text-center">Ingredienti</th>
                            <th class="text-center">Prezzo</th>
                        </thead>
                        <tbody>
                            @foreach (array_slice($dishes->toArray(), -3) as $dish)
                            <tr>
                                <td><a href="{{ route('user.dishes.show', $dish['id']) }}" class="text-reset text-decoration-none">{{$dish['name']}}</a></td>
                                <td>{{$dish['ingredients']}}</td>
                                <td class="text-end">{{
                                    number_format($dish['price'] / 100, 2, ',', '')}} €</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="bg-white corner rounded-pill">
                        <a href="{{ route('user.dishes.index') }}" class="p-3">Vedi tutti i piatti &#x2192;</a>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="d-flex flex-column justify-content-between square pt-4 pb-5 px-3 bg-sandybrown position-relative h-100">
                    <h2 class="text-center text-uppercase">Statistiche ordini</h2>
                    <p class="text-uppercase text-center mb-5" style="color: black">Coming soon...</p>
                    <div class="bg-white corner rounded-pill">
                        <a href="#!" class="p-3">Vai alle statistiche &#x2192;</a>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="d-flex flex-column justify-content-between square pt-4 pb-5 px-3 bg-sweetbrown position-relative h-100">
                    <h2 class="text-center text-uppercase">Statistiche piatti</h2>
                    <p class="text-uppercase text-center mb-5" style="color: black">Coming soon...</p>
                    <div class="bg-white corner rounded-pill">
                        <a href="#!" class="p-3">Vai alle statistiche &#x2192;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
