<?php

use App\Http\Controllers\UserAuthController;
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



Route::middleware(['guest'])->group(function ()
{
    Route::get('/login', function () {
        return view('auth.login');
    })->name("auth.login");
    Route::get('/signup', function () {
        return view('auth.register');
    })->name("auth.signup");

    
    Route::post('/login', [UserAuthController::class, "userLogin"])->name("validate.login");
    Route::post('/signup', [UserAuthController::class, "userRegister"])->name("validate.signup");
});
Route::post('/logout', [UserAuthController::class, "userLogout"])->name("validate.logout");
Route::middleware(['auth'])->group(function ()
{
    Route::get('/', function () {
        return redirect('post');
    });
    
    Route::get('/post', function () {
        return view('pages.post');
    })->name("posts");

    Route::get('/chat', function () {
        return view('pages.chat');
    })->name("chats");
});