<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
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


/* ROUTE UNTTUK LOGGED IN USER */
Route::group(['middleware' => 'role.access'], function() {

});


/* ROUTE UNTUK ADMIN CMS */
Route::group(['middleware' => 'admin', 'prefix' => 'cms_admin'], function() {

});

Route::any("*", function() {
    throw new NotFoundHttpException("Halaman Tidak Ditemukan");
});



Route::get("/login", function(){
    return view('login');
}) ->name('login');

Route::get("/dashboard", function(){
    return view('dashboard');
});

Route::get("/our-leader", function(){
    return view('our_leader');
});

Route::get("/regulations", function(){
    return view('regulations');
});

// ==========================================
Route::get('link_sosmed', [LinkController::class, 'sosmedLink']);
Route::get('link_apps', [LinkController::class, 'appLink']);
Route::get('new_employee', [UserController::class, 'newEmployee']);
Route::get('staff_of_the_month', [UserController::class, 'getAllNilaiKaryawan']);
Route::get('upcoming_birthday', [UserController::class, 'getUpcomingBirthday']);
Route::get('latest_news', [NewsController::class, 'latestNews']);
Route::get('latest_events', [EventController::class, 'latestEvents']);
Route::get('unread_notif', [NotificationController::class, 'unreadNotif']);
Route::get('unread_count_notif', [NotificationController::class, 'unreadCount']);
Route::get('unread_chat', [NotificationController::class, 'unreadChat']);
Route::get('unread_count_chat', [NotificationController::class, 'unreadCount']);

