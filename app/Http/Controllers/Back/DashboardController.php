<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderCoffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Coffee;
use App\Models\Comment;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('M');
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $order_coffees = OrderCoffee::where('order_id', $orders->id)->get();

        $transactions = Order::orderByDesc('created_at')->get();
        $transaction_count = $transactions->count();

        $list_transactions = Order::with('user')->limit(5)->get();

        $order_coffees = OrderCoffee::with('coffee')->get(['coffee_id','qty']);

        $total_pembayaran = 0;

        foreach ($order_coffees as $item) {
            $harga = $item->coffee->price * $item->qty;
            $total_pembayaran += $harga;
        }

        $coffee_trends = DB::table('order_coffees')
        ->select('order_coffees.coffee_id', DB::raw('count(*) as total'), 'coffees.name','coffees.code')
        ->join('coffees','coffees.id','=','order_coffees.coffee_id')
        ->groupBy('coffee_id')
        ->get();

        $pelanggan = Role::withCount('users')->where('name','Pelanggan')->get();
        $kasir = Role::withCount('users')->where('name','Kasir')->get();

        $article = Article::get();
        $category = Category::get();
        $comment = Comment::get();
        $coffee = Coffee::get();
        $type = Type::get();

        return view('back.dashboard',[
            'transaction_count' => $transaction_count,
            'orders' => $orders,
            'total_pembayaran' => $total_pembayaran,
            'list_transactions' => $list_transactions,
            'coffee_trends' => $coffee_trends,
            'pelanggan_count' => $pelanggan[0]->users_count,
            'kasir_count' => $kasir[0]->users_count,
            'article_count' => $article->count(),
            'category_count' => $category->count(),
            'comment_count' => $comment->count(),
            'coffee_count' => $coffee->count(),
            'type_count' => $type->count(),
        ]);
    }
}
