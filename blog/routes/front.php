<?php

use App\Http\Controllers\front\BlogsController;
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

Route::get('/', [BlogsController::class, 'index']);
Route::get('blog/{blog}', [BlogsController::class, 'show'])->name('blog.show');

    