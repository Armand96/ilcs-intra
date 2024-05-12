<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    return view('welcome');
});

Route::get('/staff_of_the_month', [UserController::class, 'getAllNilaiKaryawan']);
Route::get('/birthday_today', [UserController::class, 'getKaryawanBirthdayToday']);

/* ROUTE UNTTUK LOGGED IN USER */
Route::group(['middleware' => 'role.access'], function() {

});


/* ROUTE UNTUK ADMIN CMS */
Route::group(['middleware' => 'admin', 'prefix' => 'cms_admin'], function() {

});

Route::any("*", function() {
    throw new NotFoundHttpException("Halaman Tidak Ditemukan");
});

Route::get("/test", function(){
    return view('test');
});

Route::get("/login", function(){
    return view('login');
}) ->name('login');

Route::get("/dashboard", function(){
    return view('dashboard');
});
