<?php

use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CategoriesPage;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\SuccessPage;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class)->name('home');

Route::get('/categories', CategoriesPage::class)->name('categories');

Route::get('/products', ProductsPage::class)->name('products');

Route::get('/cart', CartPage::class)->name('cart');

Route::get('/products/{slug}', ProductDetailPage::class)->name('products.detail');



Route::get('/checkout', CheckoutPage::class);

Route::get('/my-orders', MyOrdersPage::class);

Route::get('/my-orders/{order}', MyOrderDetailPage::class)->name('orders.detail');




Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');
Route::get('/forgot', ForgotPasswordPage::class)->name('forgot');
Route::get('/reset', ResetPasswordPage::class)->name('reset');


Route::get('/success', SuccessPage::class)->name('success');
Route::get('/cancel', CancelPage::class)->name('cancel');
