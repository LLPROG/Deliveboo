@extends('layouts.page')

@section('title', 'My Dishes')

@section('content')
<div class="container">

    <div class="row">
        @foreach ($orders as $order)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-3">

            <div class="card p-3 r-15 h-100">
                <h3>
                    <span class="span-order">Numero dell'ordine:</span>  {{$order->order_number }}
                </h3>
                <h4>
                    <span class="span-order">  Nome del consumatore:</span>  {{ $order->customer_name }} {{ $order->customer_surname }}
                </h4>
                <h4>
                    <span class="span-order"> Importo: </span> {{ number_format($order->final_price / 100, 2, ',', '') }} €
                </h4>
                <h5>
                    <span class="span-order"> Data:  </span> {{ $order->created_at }}
                </h5>
                <h5>
                    <span class="span-order"> Piatti:</span>
                </h5>
                <ul>
                    @foreach ($order->dishes as $dish)

                        <li>
                            {{ $dish->name }}
                        </li>

                    @endforeach
                </ul>
            </div>

        </div>


        @endforeach
    </div>

</div>

@endsection
