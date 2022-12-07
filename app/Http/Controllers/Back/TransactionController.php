<?php

namespace App\Http\Controllers\Back;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderCoffee;

class TransactionController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Kasir')){
            $transactions = Order::with('orderCoffees')->orderByDesc('created_at')->get();
        }
        return view('back.transaction.index',[
            'transactions' => $transactions,
        ]);
    }

    public function show(Order $order)
    {
        $order_coffees = OrderCoffee::where('order_id', $order->id)->get();
        return view('back.transaction.detail',[
            'order' => $order,
            'order_coffees' => $order_coffees
        ]);
    }
}
