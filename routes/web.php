<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/index', 'UserController@index')->name('index')->middleware('role:user');
Route::get('/orders', function (){
    return view('orders');});
Route::get('/order', function (){
    return view('orderservice');});
Route::get('/add', function (){
    return view('admin.add');});
Route::get('/home', 'AdminController@index')->name('index')->middleware('role:admin');
Route::get('/update', function (){
    return view('admin.update');});

require __DIR__.'/auth.php';

Route::resource('product', ProductController::class);
Route::resource('order', OrderServices::class);

Route::get('/indexadmin', function() {
    return view('add.admin');
});

Route::get('/indexuser', function() {
    return view('index');
});