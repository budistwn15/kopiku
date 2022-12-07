<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coffee;
use App\Models\Order;
use App\Models\OrderCoffee;
use App\Models\Type;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CatalogController extends Controller
{
    public function index()
    {
        $coffees = Coffee::get();
        $types = Type::get();
        return view('front.catalog.index',[
            'coffees' => $coffees,
            'types' => $types
        ]);
    }

    public function all()
    {
        $coffees = Coffee::get();
        $types = Type::get();
        return view('front.catalog.all',[
            'coffees' => $coffees,
            'types' => $types
        ]);
    }

    public function type(Type $type)
    {
        $types = Type::get();
        return view('front.catalog.type', [
            'type' => $type,
            'types' => $types
        ]);
    }

    public function show(Coffee $coffee)
    {
        return view('front.catalog.show',[
            'coffee' => $coffee
        ]);
    }

    public function addToCart(Coffee $coffee)
    {
        if(auth()->user()){
            if (request('cart')) {
                request()->validate([
                    'jumlah' => ['required']
                ]);

                $jumlah = Cart::where('user_id', auth()->user()->id)->where('coffee_id', $coffee->id)->pluck('jumlah');

                if($jumlah->toArray() != null){
                    Cart::updateOrCreate(
                        [
                            'user_id' => auth()->user()->id,
                            'coffee_id' => $coffee->id
                        ],
                        [
                            'user_id' => Auth()->user()->id,
                            'coffee_id' => $coffee->id,
                            'jumlah' => request('jumlah') + $jumlah[0]
                        ]
                    );
                }else{
                    Cart::updateOrCreate(
                        [
                            'user_id' => auth()->user()->id,
                            'coffee_id' => $coffee->id
                        ],
                        [
                            'user_id' => Auth()->user()->id,
                            'coffee_id' => $coffee->id,
                            'jumlah' => request('jumlah')
                        ]
                    );
                }

                Alert::success("Sukses", "Berhasil menambahkan $coffee->name ke dalam keranjang");
                return redirect()->route('carts.index');
            } else if (request('buy')) {
                request()->validate([
                    'jumlah' => ['required','numeric']
                ]);

                $stock = Coffee::where('id', $coffee->id)->pluck('stock')->first();

                $order = Order::create([
                    'order_code' => $this->makeID(),
                    'user_id' => auth()->user()->id
                ]);

                OrderCoffee::create([
                    'order_id' => $order->id,
                    'coffee_id' => $coffee->id,
                    'qty' => request()->input('jumlah')
                ]);

                Coffee::where('id', $coffee->id)->update([
                    'stock' => $stock - request()->input('jumlah')
                ]);

                Alert::success('Sukses', 'Berhasil Membeli Kopi');
                return redirect()->route('checkouts.index', ['order' => $order->order_code]);
            } else if(request('cartOne')){
                $jumlah = Cart::where('user_id', auth()->user()->id)->where('coffee_id', $coffee->id)->pluck('jumlah');

                if ($jumlah->toArray() != null) {
                    Cart::updateOrCreate(
                        [
                            'user_id' => auth()->user()->id,
                            'coffee_id' => $coffee->id
                        ],
                        [
                            'user_id' => Auth()->user()->id,
                            'coffee_id' => $coffee->id,
                            'jumlah' => 1 + $jumlah[0]
                        ]
                    );
                } else {
                    Cart::updateOrCreate(
                        [
                            'user_id' => auth()->user()->id,
                            'coffee_id' => $coffee->id
                        ],
                        [
                            'user_id' => Auth()->user()->id,
                            'coffee_id' => $coffee->id,
                            'jumlah' => 1
                        ]
                    );
                }

                Alert::success("Sukses", "Berhasil menambahkan $coffee->name ke dalam keranjang");
                return redirect()->route('carts.index');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function makeID($prefix = 'kopiku')
    {
        $time = str_replace('.', '-', microtime(true));
        return $prefix . '-' . $time;
    }
}
