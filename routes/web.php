<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Back\Blog\ArticleController;
use App\Http\Controllers\Back\Blog\CategoryController;
use App\Http\Controllers\Back\Cofee\CoffeeController;
use App\Http\Controllers\Back\Cofee\TypeController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\Permissions\AssignPermissionController;
use App\Http\Controllers\Back\Permissions\AssignUserController;
use App\Http\Controllers\Back\Permissions\PermissionController;
use App\Http\Controllers\Back\Permissions\RoleController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\TransactionController;
use App\Http\Controllers\Back\UserController as BackUserController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\OngkirController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);

// Socialite
Route::get('sign-in-google',[UserController::class,'google'])->name('user.login');
Route::get('auth/google/callback',[UserController::class,'handleProviderCallback'])
->name('user.google.callback');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('kopimin')->middleware(['auth','has.role'])->group(function(){
   Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

   // Users
   Route::resource('users', BackUserController::class)
   ->only('index','create','store','destroy');

   //roles
   Route::prefix('role-and-permission')->group(function(){

        Route::prefix('roles')->group(function(){
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::post('/', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/{role}/update', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/{role}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::prefix('permissions')->group(function(){
            Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('/', [PermissionController::class, 'store'])->name('permissions.store');
            Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('/{permission}/update', [PermissionController::class, 'update'])->name('permissions.update');
            Route::delete('/{permission}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        });

        Route::prefix('assign-permissions')->group(function(){
            Route::get('/', [AssignPermissionController::class, 'index'])->name('assign-permissions.index');
            Route::post('/', [AssignPermissionController::class, 'store'])->name('assign-permissions.store');
            Route::get('/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign-permissions.edit');
            Route::put('/{role}/edit', [AssignPermissionController::class, 'update'])->name('assign-permissions.update');
        });

        Route::prefix('assign-users')->group(function(){
            Route::get('/', [AssignUserController::class, 'index'])->name('assign-users.index');
            Route::post('/', [AssignUserController::class, 'store'])->name('assign-users.store');
            Route::get('/{user}/edit', [AssignUserController::class, 'edit'])->name('assign-users.edit');
            Route::put('/{user}/edit', [AssignUserController::class, 'update'])->name('assign-users.update');
        });
   });

   Route::prefix('transaction')->group(function(){
       Route::get('/',[TransactionController::class,'index'])->name('transactions.index');
        Route::get('/{order:order_code}',[TransactionController::class,'show'])->name('transactions.show');
    });

   // Blog
   Route::prefix('blog')->group(function(){
        // Kategori
        Route::resource('categories',CategoryController::class);
        Route::resource('articles',ArticleController::class);
   });

   // Coffee
   Route::prefix('coffee')->group(function(){
      Route::resource('coffees',CoffeeController::class);
      Route::resource('types',TypeController::class);
   });

   // Profile
   Route::prefix('profile')->group(function(){
        Route::get('/',[ProfileController::class,'index'])->name('profiles.index');
        Route::put('/',[ProfileController::class,'update'])->name('profiles.update');
        Route::post('/',[ProfileController::class,'destroy'])->name('profiles.delete');
   });

});


// Blog
Route::prefix('blog')->group(function(){
    Route::get('/',[BlogController::class,'index'])->name('blogs.index');
    Route::get('/{article:slug}',[BlogController::class,'show'])->name('blogs.show');

    Route::post('/{article:slug}',[CommentController::class,'store'])->name('comments.store');
    Route::post('/{article:slug}/{comment}',[CommentController::class,'reply'])->name('comments.reply');

});

Route::get('category/{category:slug}', [BlogController::class, 'category'])->name('blogs.category');

// Catalog
Route::prefix('/catalog')->group(function(){
    Route::get('/',[CatalogController::class,'index'])->name('catalogs.index');

    Route::get('/all',[CatalogController::class,'all'])->name('catalogs.all');
    Route::get('/{type:slug}',[CatalogController::class,'type'])->name('catalogs.type');

    Route::get('/{coffee:code}/coffee', [CatalogController::class, 'show'])->name('catalogs.show');
    Route::post('/{coffee:code}/coffee', [CatalogController::class, 'addToCart'])->name('catalogs.cart');
});

// cart
Route::prefix('cart')->middleware('auth')->group(function(){
    Route::get('/',[CartController::class,'index'])->name('carts.index');
    Route::post('/',[CartController::class,'store'])->name('carts.store');
    Route::delete('/{cart}',[CartController::class,'destroy'])->name('carts.destroy');
});

// Checkout
Route::prefix('checkout')->middleware('auth')->group(function(){
    Route::get('/{order:order_code}',[CheckoutController::class,'index'])->name('checkouts.index');
    Route::post('/ongkir',[CheckoutController::class,'cekOngkir']);
    Route::post('/{order:order_code}',[CheckoutController::class,'store'])->name('checkouts.store');
});

// midtrans
Route::get('payment/success',[CheckoutController::class,'midtransCallback']);
Route::post('payment/success',[CheckoutController::class,'midtransCallback']);

Route::get('/cities/{province_id}', [CheckoutController::class,'getCities']);

Route::get('/about',function(){
    return view('front.about');
})->name('about');

Route::get('/ongkir', [OngkirController::class,'index']);
Route::post('/ongkir', [OngkirController::class,'check_ongkir']);
Route::get('/cities/{province_id}', [OngkirController::class,'getCities']);
