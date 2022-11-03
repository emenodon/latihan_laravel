<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     // return view('welcome');
//     return view('login.index');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

//POSTINGAN
Route::resource('post', PostController::class)->middleware(['auth', 'verified']);
// Route::post('post', [PostController::class, 'store']);
// Route::get('/tambah', function () {
//     return view('dashboard.post.tambah');
// });
// Route::get('/edit', function () {
//     return view('dashboard.post.edit', $val->id);
// });

Route::resource('category', CategoryController::class)->middleware(['auth', 'verified']);

// Route::get('/latihan', [LatihanController::class, 'showMyname']);
