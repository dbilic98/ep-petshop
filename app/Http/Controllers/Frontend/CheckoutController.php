<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ProductsEvent;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use stdClass;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeorder(Request $request)
    {

        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->prezime = $request->input('prezime');
        $order->email = $request->input('email');
        $order->adresa = $request->input('adresa');
        $order->brojtelefona = $request->input('brojtelefona');
        $order->save();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        $productQuantity = [];
        foreach ($cartitems as $item) {
            $product = Product::find($item->prod_id);
            $price = $product->cijena;
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $item->prod_id,
                'kolicina' => $item->prod_qty,
                'cijena' => $price,

            ]);

            $product->kolicina = $product->kolicina - $item->prod_qty;
            $product->update();
            // Create an empty object
            $productObject = new stdClass();

            // Add 'product_id' and 'quantity' properties to the object
            $productObject->product_id = $product->id;
            $productObject->quantity = $product->kolicina;

            // Add the object to the array
            $productQuantity[] = $productObject;
        }

        event(new ProductsEvent(json_encode($productQuantity)));

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/home')->with('status', "Narudžba uspješno poslana");
    }

}
