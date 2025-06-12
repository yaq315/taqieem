<?php

use App\Http\Controllers\UserControllwe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\RatingController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\DashboardController;

// use App\Http\Controllers\UserController;

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
// Route::get('/dashboard', function () {
//     return view('dashboard.layout.dash');
// })->middleware('auth');



Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Route::resource('schools', SchoolController::class)->only(['index', 'show']);
Route::resource('schools.ratings', RatingController::class)->only(['store'])->middleware('auth');

Route::get('/ratings', [SchoolController::class, 'index']);
Route::get('/ratings/{school}', [SchoolController::class, 'show'])->name('ratings.show');


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Routes for Dashboard
Route::middleware(['auth', 'role:manager'])->group(function (){
       Route::get('/profile', [AuthController::class, 'profile'])->name('profile.show');
         Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
    // Parents Management (using UserController)
    Route::get('/parents', [AuthController::class, 'parents'])->name('users.parents');
    Route::get('/parents/{user}/edit', [AuthController::class, 'editParent'])->name('users.parents.edit');
    Route::put('/parents/{user}', [AuthController::class, 'updateParent'])->name('users.parents.update');
    // Schools Management
      Route::get('/schools/manage', [SchoolController::class, 'manage'])->name('schools.manage');
    Route::get('/schools/create', [SchoolController::class, 'create'])->name('schools.create');
    Route::post('/schools', [SchoolController::class, 'store'])->name('schools.store');
    Route::get('/schools/{school}/edit', [SchoolController::class, 'edit'])->name('schools.edit');
    Route::put('/schools/{school}', [SchoolController::class, 'update'])->name('schools.update');
    
    // Contacts Management
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');


