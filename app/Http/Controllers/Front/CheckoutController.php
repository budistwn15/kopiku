<?php

namespace App\Http\Controllers\Front;

use Exception;
use App\Models\City;
use App\Models\Order;
use App\Models\Province;
use App\Models\OrderCoffee;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Midtrans;

class CheckoutController extends Controller
{

    public function __construct()
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVERKEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        \Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function index(Order $order)
    {
        $orders = Order::where('order_code', $order->order_code)->get();
        $order_coffees = OrderCoffee::where('order_id', $order->id)->get();
        $provinces = Province::pluck('name', 'province_id');
        return view('front.checkout.index',[
            'order' => $order,
            'orders' => $orders,
            'order_coffees' => $order_coffees,
            'provinces' => $provinces
        ]);
    }

    public function store(Request $request, Order $order)
    {
        $request->validate([
            'name' => ['required','string'],
            'phone' => ['required','string'],
            'address' => ['required','string'],
            'province_destination' => ['required'],
            'city_destination' => ['required'],
            'courier' => ['required'],
            'weight' => ['required','numeric'],
            'total_harga' => ['required','numeric'],
            'ongkos_kirim' => ['required','numeric'],
            'total_pembayaran' => ['required','numeric']
        ]);

        $provinsi = Province::find($request->province_destination);
        $kota = City::find($request->city_destination);

        OrderDetail::create([
            'order_id' => $order->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'provinsi' => $provinsi['name'],
            'kota' => $kota['name'],
            'ekspedisi' => $request->courier,
            'weight' => $request->weight,
            'total_harga' => $request->total_harga,
            'ongkos_kirim' => $request->ongkos_kirim,
            'total_pembayaran' => $request->total_pembayaran,
        ]);

        $this->getSnapRedirect($order);
        Alert::success("Sukses","Berhasil melakukan pemesanan kopi");
        return redirect($this->getSnapRedirect($order));
    }

    // Midtrans
    public function getSnapRedirect(Order $order)
    {
        $orderId = $order->id . '-' . Str::random(5);
        $order_detail = OrderDetail::where('order_id', $order->id)->first();

        $totalPrice = 0;
        $order_coffees = OrderCoffee::where('order_id', $order->id)->get();

        // foreach ($order_coffees as $key => $value) {
        //     $subTotalPrice = $value->qty * $value->coffee->price;
        //     $totalPrice += $subTotalPrice;
        // }

        $order->midtrans_booking_code = $orderId;

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $order_detail->total_pembayaran
        ];

        foreach ($order_coffees as $key => $value) {
            $item_details[] = [
                'id' => $value->id,
                'price' => $value->coffee->price,
                'quantity' => $value->qty,
                'name' => $value->coffee->name
            ];
        }

        $item_details[] = [
            'id' => 100,
            'price' => $order_detail->ongkos_kirim,
            'quantity' => 1,
            'name' => 'Ongkos Kirim'
        ];

        $item_details[] = [
            'id' => 100,
            'price' => $order_detail->biaya_layanan,
            'quantity' => 1,
            'name' => 'Biaya Layanan'
        ];

        $user_data = [
            "first_name" => $order_detail->name,
            "last_name" => "",
            "address" => $order_detail->address,
            'city' => "$order_detail->kota",
            'postal_code' => "",
            'phone' => $order_detail->phone,
            'country_code' => "IDN"
        ];

        $customer_details = [
            "first_name" => $order->user->name,
            'last_name' => "",
            'email' => $order->user->email,
            'phone' => $order_detail->phone,
            'billing_address' => $user_data,
            'shipping_address' => $user_data
        ];

        $midtrans_params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details
        ];


        try {
            $payment_url = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;
            $order->midtrans_url = $payment_url;
            $order->save();

            return $payment_url;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function midtransCallback(Request $request)
    {
        $notif = $request->method() == 'POST' ? new \Midtrans\Notification() : \Midtrans\Transaction::status($request->order_id);

        $transaction_status = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        $order_id = explode('-', $notif->order_id)[0];
        $order = Order::find($order_id);

        if ($transaction_status == 'capture') {
            if ($fraud == 'challenge') {
                $order->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                $order->payment_status = 'paid';
            }
        } else if ($transaction_status == 'cancel') {
            if ($fraud == 'challenge') {
                $order->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                $order->payment_status = 'failed';
            }
        } else if ($transaction_status == 'deny') {
            $order->payment_status = 'failed';
        } else if ($transaction_status == 'settlement') {
            $order->payment_status = 'paid';
        } else if ($transaction_status == 'pending') {
            $order->payment_status = 'pending';
        } else if ($transaction_status == 'expire') {
            $order->payment_status = 'failed';
        }
        $order->save();
        return view('front.checkout.success');
    }

    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('name', 'city_id');
        return response()->json($city);
    }

    public function cekOngkir(Request $request)
    {
        $cost = RajaOngkir::ongkosKirim([
            'origin'        => $request->city_origin, // ID kota/kabupaten asal
            'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
            'weight'        => $request->weight, // berat barang dalam gram
            'courier'       => $request->courier // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();


        return response()->json($cost);
    }
}
