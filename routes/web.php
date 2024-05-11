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

Route::get('/test_nilai', [UserController::class, 'getAllNilaiKaryawan']);

/* ROUTE UNTTUK LOGGED IN USER */
Route::group(['middleware' => 'role.access'], function() {

});


/* ROUTE UNTUK ADMIN CMS */
Route::group(['middleware' => 'admin', 'prefix' => 'cms_admin'], function() {

});

Route::any("*", function() {
    throw new NotFoundHttpException("Halaman Tidak Ditemukan");
});
