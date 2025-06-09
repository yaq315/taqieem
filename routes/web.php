<?php

use App\Http\Controllers\UserControllwe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RatingController;

use App\Http\Controllers\ContactController;

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
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/notice', function () {
    return view('notice');
});
// Route::get('/ratings', function () {
//     return view('ratings');
// });
Route::get('/ratings-single', function () {
    return view('ratings-single');
});
Route::get('/dashboard', function () {
    return view('dashboard.layout.dash');
})->middleware('auth');



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('schools', SchoolController::class)->only(['index', 'show']);
Route::resource('schools.ratings', RatingController::class)->only(['store'])->middleware('auth');

Route::get('/ratings', [SchoolController::class, 'index']);
Route::get('/ratings/{school}', [SchoolController::class, 'show'])->name('ratings.show');


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
