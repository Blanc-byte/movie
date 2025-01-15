<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\customerController;



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
Route::middleware(['auth', 'isCustomer'])->group(function () {
    Route::get('/movies', [customerController::class, 'movies'])->name('movies');
    Route::get('/movie/details/{id}', [customerController::class, 'show'])->name('movie.details');
    Route::post('/movies/{movieId}', [customerController::class, 'purchase'])->name('movies.purchase');
    Route::get('/mypurchased', [customerController::class, 'showPurchases'])->name('mypurchased');
    Route::get('/location', [customerController::class, 'location'])->name('location');


});










Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/home', [adminController::class, 'home'])->name('home');
    Route::get('/remove', [adminController::class, 'remove'])->name('remove');
    Route::post('/movie/store', [adminController::class, 'store'])->name('movie.store');
    Route::delete('/movies/delete/{id}', [adminController::class, 'delete'])->name('movie.delete');
    Route::get('/movies/details/{id}', [adminController::class, 'details'])->name('movies.details');
    Route::put('/moviesed/{id}', [adminController::class, 'update'])->name('movieed.update');

    Route::delete('/movies/addAgain/{id}', [adminController::class, 'addAgain'])->name('movie.addAgain');
    Route::get('/customers', [adminController::class, 'customers'])->name('customers');


});



Route::get('/dashboard', function () {  
    $user = Auth::user(); 
    
    if ($user->role === 'admin') {
        return redirect()->route('home'); 
    } elseif ($user->role === 'customer') {
        return redirect()->route('movies'); 
    }
    abort(403, 'Unauthorized action.');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
