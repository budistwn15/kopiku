<?php

namespace App\Http\Controllers\Back;

use App\Models\Order;
use App\Models\OrderCoffee;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index()
    {
        if(auth()->user()->hasRole('Admin')){
            $transactions = Order::with('orderCoffees')->orderByDesc('created_at')->get();
            $transaction_paid = Order::where('payment_status', 'paid')->get();
            $transaction_waiting = Order::where('payment_status', 'waiting')->get();
            $delivery_waiting = Order::where('delivery_status', 'waiting')->get();
            $delivery_sent = Order::where('delivery_status', 'sent')->get();
            $delivery_received = Order::where('delivery_status', 'received')->get();
        }else{
            $transactions = Order::with('orderCoffees')->where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
            $transaction_paid = Order::where([
                ['payment_status', 'paid'],
                ['user_id',auth()->user()->id]
            ])->get();
            $transaction_waiting = Order::where([
                ['payment_status', 'waiting'],
                ['user_id', auth()->user()->id]
            ])->get();
            $delivery_waiting = Order::where([
                ['delivery_status', 'waiting'],
                ['user_id', auth()->user()->id]
            ])->get();
            $delivery_sent = Order::where([
                ['delivery_status', 'sent'],
                ['user_id', auth()->user()->id]
            ])->get();
            $delivery_received = Order::where([
                ['delivery_status', 'received'],
                ['user_id', auth()->user()->id]
            ])->get();
        }

        return view('back.transaction.index',[
            'transactions' => $transactions,
            'transaction_paid' => $transaction_paid->count(),
            'transaction_waiting' => $transaction_waiting->count(),
            'delivery_waiting' => $delivery_waiting->count(),
            'delivery_sent' => $delivery_sent->count(),
            'delivery_received' => $delivery_received->count(),
        ]);
    }

    public function show(Order $order)
    {
        $order_coffees = OrderCoffee::where('order_id', $order->id)->get();
        $order_detail = OrderDetail::where('order_id', $order->id)->first();
        return view('back.transaction.detail',[
            'order' => $order,
            'order_coffees' => $order_coffees,
            'order_detail' => $order_detail
        ]);
    }

    public function send(Order $order)
    {
        $detail = OrderDetail::where('order_id', $order->id)->first();
        return view('back.transaction.send', compact('order','detail'));
    }

    public function update(Request $request, Order $order)
    {
        $validate = $request->validate([
            'resi' => ['required','string']
        ]);

        $order->update([
            'resi' => $validate['resi'],
            'delivery_status' => 'sent'
        ]);

        Alert::success('Sukses','Berhasil mengirim kopi');
        return redirect()->route('transaction.index');
    }

    public function confirm(Order $order)
    {
        $order->update([
            'delivery_status' => 'received'
        ]);
        Alert::success('Sukses', 'Berhasil konfirmasi pesanan');
        return back();
    }
}
