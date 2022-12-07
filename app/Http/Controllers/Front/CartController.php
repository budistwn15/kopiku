<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderCoffee;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth()->user()->id)->get();
        $cart_count = $carts->count();

        function makeID($prefix = 'kopiku')
        {
            $time = str_replace('.', '-', microtime(true));
            return $prefix . '-' . $time;
        }

        return view('front.cart.index',[
            'carts' => $carts,
            'cart_count' => $cart_count,
            'order_code' => makeID()
        ]);
    }

    public function store(Request $request)
    {
        $code = $request->input('code');
        $qty = $request->input('qty');
        $order_code = $this->makeID();

        foreach ($code as $key) {
            $result_code = array_filter($code, function($value){
                return !is_null($value);
            });
        }

        foreach ($qty as $key) {
            $result_qty = array_filter($qty, function ($value) {
                return !is_null($value);
            });
        }

        $order = Order::create([
            'order_code' => $order_code,
            'user_id' => auth()->user()->id
        ]);

        if(count($result_code) > 0){
            foreach ($result_code as $key => $value) {

                $coffee_id = Coffee::where('code', $code[$key])->pluck('id')->first();
                $stock = Coffee::where('code', $code[$key])->pluck('stock')->first();

                OrderCoffee::create([
                    'order_id' => $order->id,
                    'coffee_id' => $coffee_id,
                    'qty' => $qty[$key]
                ]);

                Coffee::where('code', $code[$key])->update([
                    'stock' => $stock - $qty[$key]
                ]);

                Cart::where('user_id', auth()->user()->id)->where('coffee_id', $coffee_id)->delete();
            }
        }
        Alert::success('Sukses','Berhasil Membeli Kopi');
        return redirect()->route('checkouts.index',['order' => $order['order_code']]);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        Alert::success("Sukses","Berhasil menghapus dari keranjang");
        return redirect()->back();
    }

    public function makeID($prefix = 'kopiku')
    {
        $time = str_replace('.', '-', microtime(true));
        return $prefix . '-' . $time;
    }
}
