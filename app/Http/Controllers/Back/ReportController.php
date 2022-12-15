<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Order::whereBetween('created_at', [$request->from, $request->to])->get();
        return view('back.report.index', [
            'transactions' => $transactions
        ]);
    }
}
