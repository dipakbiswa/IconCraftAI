<?php

use App\Http\Controllers\AIController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RazorpayController;
use App\Models\User;
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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/auth/google', [GoogleController::class, 'loginWithGoogle'])->name('login');
Route::any('/auth/google/callback', [GoogleController::class, 'callBack'])->name('callback');

Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/generate', [AIController::class, 'index'])->name('generate');
    Route::post('/generate', [AIController::class, 'work'])->name('generate.post');
    Route::view('/pricing', 'pricing')->name('pricing');
    Route::get('/openai', [AIController::class, 'openai']);
    Route::post('/pricing', [PayPalController::class, 'paypalPay'])->name('pricing.post');
    Route::get('/paypalSuccess', [PayPalController::class, 'paypalSuccess'])->name('paypalSuccess');
    Route::get('/paypalCancel', [PayPalController::class, 'paypalCancel'])->name('paypalCancel');
    Route::get('/images', function(){
        return view('images');
    })->name('images');
    Route::get('/feedback', [ProfileController::class, 'feedback'])->name('feedback');
    Route::post('/feedback', [ProfileController::class, 'feedbackPost'])->name('feedback.post');
    Route::get('/collection', [Controller::class, 'collection'])->name('collection');
    Route::get('/community', [Controller::class, 'community'])->name('community');
});

require __DIR__.'/auth.php';
