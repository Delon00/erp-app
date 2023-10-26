<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Storage;
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
Route::get('/css/{filename}', function ($filename) {
    return response()->file(public_path('css/'. $filename));
});
Route::get('/js/{filename}', function ($filename) {
    return response()->file(public_path('js/' . $filename));
});
Route::get('/media/{filename}', function ($filename) {
    return response()->file(public_path('media/' . $filename));
});





Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login');





// ------------ ROUTE MIDDLEWARE
Route::middleware(['redirect.if.authenticated'])->get('/', function () {
    return view('home');
})->name('home')->middleware('disable.back.btn');

Route::middleware(['auth'])->group(function () {
    Route::get('/admindash', [AdminController::class, 'ContentDashboard'])->name('admindash')->middleware('disable.back.btn');
    Route::get('/produits', [AdminController::class, 'ContentProduits'])->name('produits')->middleware('disable.back.btn');
    Route::get('/clients', [AdminController::class, 'ContentClients'])->name('clients')->middleware('disable.back.btn');
    Route::get('/commande', [AdminController::class, 'ContentCommande'])->name('commande')->middleware('disable.back.btn');
    Route::get('/review', [AdminController::class, 'ContentReview'])->name('review')->middleware('disable.back.btn');
    Route::get('/parametre', [AdminController::class, 'ContentParametre'])->name('parametre')->middleware('disable.back.btn');
    Route::get('/admission', [AdminController::class, 'admission'])->name('admission')->middleware('disable.back.btn');
    Route::get('/diagnostic', [AdminController::class, 'diagnostic'])->name('diagnostic')->middleware('disable.back.btn');
    Route::get('/reparation', [AdminController::class, 'reparation'])->name('reparation')->middleware('disable.back.btn');


    Route::post('/admissionform', [AdminController::class, 'admissionform'])->name('admissionform');
    Route::post('/piecesform', [AdminController::class, 'piecesform'])->name('piecesform');
    Route::post('/clientform', [AdminController::class, 'clientform'])->name('clientform');
    Route::post('/reparationform', [AdminController::class, 'reparationform'])->name('reparationform');
    Route::post('/diag', [AdminController::class, 'diag'])->name('diag');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});




