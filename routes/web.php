<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Invoices;
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
});


Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/invoices', Invoices::class)->name('invoices');
});



Route::get('/post', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('post');

require __DIR__ . '/auth.php';