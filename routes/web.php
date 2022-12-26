<?php

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
    return view('auth/login');
});
Route::get('/login', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/royalty', [App\Http\Controllers\HomeController::class, 'royalty'])->name('royalty');
Route::get('/library', [App\Http\Controllers\HomeController::class, 'library'])->name('library');
Route::get('/quiz', [App\Http\Controllers\HomeController::class, 'quiz'])->name('home');
Route::post('admin/quiz', [App\Http\Controllers\AdminController::class, 'quiz'])->name('home');
Route::get('/premium', [App\Http\Controllers\PremiumController::class, 'data'])->name('Subscribed');
Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'data'])->name('Admin');
Route::get('admin/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('Admin');
// Route::get('admin/admin', [App\Http\Controllers\AdminController::class, 'admin']);
Route::post('admin/dashboard', [App\Http\Controllers\AdminController::class, 'book'])->name('Admin');
Route::get('viewpdf', [App\Http\Controllers\AdminController::class, 'viewpdf'])->name('viewpdf');
Route::get('admin/done', [App\Http\Controllers\AdminController::class, 'done'])->name('success');
Route::get('admin/verify', [App\Http\Controllers\AdminController::class, 'verifying'])->name('verify');
Route::post('admin/verify', [App\Http\Controllers\AdminController::class, 'verify'])->name('verify');
Route::post('admin/verification', [App\Http\Controllers\AdminController::class, 'verification'])->name('admin');
Route::get('admin/verification', [App\Http\Controllers\AdminController::class, 'admin'])->name('Admin');
Route::get('admin/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete']);

   
/**
    * Logout Route
    */
Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
 });

