<?php

use App\Http\Controllers\CMS\LeaderCMSController;
use App\Http\Controllers\CMS\LinkCMSController;
use App\Http\Controllers\CMS\RegulasiCMSController;
use App\Http\Controllers\CMS\UserCMSController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('dashboard');
});


/* ROUTE UNTTUK LOGGED IN USER */
Route::group(['middleware' => 'role.access'], function() {

});


/* ROUTE UNTUK ADMIN CMS */
Route::group(
    [
    'middleware' => ['admin', 'auth'],
    'prefix' => 'cms_admin'
], function() {
    Route::get('home', [CMSController::class, 'index'])->name('cms.home');
    Route::resource('users', UserCMSController::class);
    Route::resource('regulasis', RegulasiCMSController::class);
    Route::resource('links', LinkCMSController::class);
    Route::resource('leaders', LeaderCMSController::class);
    // Route::get('users', [UserCMSController::class, 'index'])->name('cms.user');
});

Route::group(['middleware' =>'auth'], function() {
    Route::get("/dashboard", [DashboardController::class, 'home'])->name('dashboard');
});

Route::any("*", function() {
    throw new NotFoundHttpException("Halaman Tidak Ditemukan");
});

Route::get("/comming-soon", function(){
    return view('comming_soon');
}) ->name('comming_soon');

Route::get("/login", function(){
    return view('login');
}) ->name('login');


Route::get("/our-leader", function(){
    return view('intranet.pages.our_leader');
})->name('our_leader');

Route::get("/our-team", [TeamController::class, 'teams'])->name('our_team');

Route::get("/our-regulation", function(){
    return view('intranet.pages.our_regulation');
})->name('our_regulation');


Route::get("/regulations", function(){
    return view('regulations');
});

Route::get('testtailwind', function() {
    return view('test_tailwind');
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

/* NANTI DIBERESIN SUSUNAN ROUTENYA */
Route::post('login_user', [UserController::class, 'login'])->name('login_user');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('wifi_login', [DashboardController::class, 'apiRedirect']);
Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
