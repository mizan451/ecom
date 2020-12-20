<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CartController extends Controller
{
    public function addToCart(Request $request){
        $quantity = 1;
        $cart = \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $quantity,
            'attributes' => [
                'image' => $request->image,
                'size' => '',
                'color' => ''
            ]
        ]);
        return response()->json($cart);
    }

    public function productList(){
        return response()->json([
            'products' => \Cart::getContent(),
            'total' => \Cart::getTotal(),
        ], 200);
    }
}
