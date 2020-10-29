<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    public function store(Request $request)
    {


        $cartDetail = new CartDetail();
        $cartDetail->cart_id =  auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();

        $notification = 'El producto se ha cargado al carrito de compras exitosamente !.';
        return back()->with(compact('notification'));
    }

    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);
        //comprueba si el id del carrito es el mismo del carrido id del usuario que esta en sesion
        if ($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();

        $notification = 'El producto se ha eliminado del carrito de compras correctamente.';
        return back()->with(compact('notification'));
    }
}
