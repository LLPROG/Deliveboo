<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Faker\Generator as Faker;
use App\Order;
// use App\Http\Requests\Api\OrderRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function createOrder(Request $request, Faker $faker)
    {

        $newOrder = new Order;
        $newOrder->order_number = rand(1, 99999999);
        $newOrder->customer_name = $request->name;
        $newOrder->customer_surname = $request->surname;
        $newOrder->phone_number = $request->number;
        $newOrder->street = $request->street;
        $newOrder->cap = $request->cap;
        $newOrder->city = $request->city;
        $newOrder->status = true;
        $newOrder->final_price = $request->amount;

        $newOrder->save();

        $newOrder->dishes()->attach(1, [
            'quantity' => 1,
            'notes' => 'lorem ipsum'
        ]);
        $newOrder->dishes()->attach(2, [
            'quantity' => 1,
            'notes' => 'lorem ipsum'
        ]);
        $newOrder->dishes()->attach(6, [
            'quantity' => 1,
            'notes' => 'lorem ipsum'
        ]);
        

        // for ($i=0; $i < count($cart); $i++) { 
        //$cartItem = $cart[$i];
        // foreach($request->cart as $cartItem) {

        //     //$dish_id = intval($cartItem->id);

        //     $quantity = intval($cartItem->qty);

        // $newOrder->dishes()->attach(
        //     $cart->pluck('id'),
        //     [
        //         'quantity' => 1,
        //         'notes' => 'lorem ipsum'
        //     ]
        // );
        // }
        // };

        $data = [
            'message' => 'done',
            'newOrder' => $newOrder,
        ];
        return response()->json($data, 200);
    }


    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token,
        ];
        // dd(response()->json($data, 200));
        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {

            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!',
            ];

            return response()->json($data, 200);
        } else {

            $data = [
                'success' => false,
                'message' => 'Transazione fallita!',
            ];

            return response()->json($data, 401);
        }
    }
}
