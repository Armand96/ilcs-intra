<?php

use App\Http\Controllers\CKUploaderController;
use App\Http\Controllers\cms\CalendarCMSController;
use App\Http\Controllers\cms\KnowledgeCMSController;
use App\Http\Controllers\cms\KPICMSController;
use App\Http\Controllers\CMS\LaporanRapatCMSController;
use App\Http\Controllers\CMS\LeaderCMSController;
use App\Http\Controllers\CMS\LinkCMSController;
use App\Http\Controllers\cms\NewsCMSController;
use App\Http\Controllers\CMS\RegulasiCMSController;
use App\Http\Controllers\CMS\UserCMSController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\LaporanRapatController;
// use App\Http\Controllers\EventController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
// use Illuminate\Support\Facades\Auth;
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
    'middleware' => ['admin', 'auth', 'checkz'],
    'prefix' => 'cms_admin'
], function() {
    Route::get('home', [CMSController::class, 'index'])->name('cms.home');
    Route::get('user_search', [UserCMSController::class, 'userSearch'])->name('cms.user.search');
    Route::resource('users', UserCMSController::class);
    Route::resource('regulasis', RegulasiCMSController::class);
    Route::resource('links', LinkCMSController::class);
    Route::resource('leaders', LeaderCMSController::class);
    Route::resource('news', NewsCMSController::class);
    Route::resource('calendars', CalendarCMSController::class);
    Route::resource('kpis', KPICMSController::class);
    Route::resource('knowledges', KnowledgeCMSController::class);
    Route::resource('laporans', LaporanRapatCMSController::class);
});

Route::post('ckupload', [CKUploaderController::class, 'upload']);

/* INTRANET */
Route::group(['middleware' =>['auth', 'checkz']], function() {
    // GET CURRENT USER
    Route::get('/currentUser', [UserController::class, 'currentUser'])->name('curr.user');

    /* PAGES */
    Route::get("/dashboard", [DashboardController::class, 'home'])->name('dashboard');
    Route::get("/our-leader", [LeaderController::class, 'ourLeader'])->name('our_leader');
    Route::get("/our-team", [TeamController::class, 'teams'])->name('our_team');
    Route::get("/our-regulation", [RegulasiController::class, 'ourRegulations'])->name('our_regulation');
    Route::get("/calendar", function() {
        return view('intranet.pages.calendar');
    })->name('intra.calendar');

    Route::get('/employee-forum', function() {
        return view('intranet.pages.employee_forum_reactjs');
    })->name('employee.forum');

    Route::get('/employee-forum/detail', function() {
        return view('intranet.pages.employee_forum_reactjs');
    })->name('employee.forum.detail');

    Route::get('/employee-forum/detail/{id}', function() {
        return view('intranet.pages.employee_forum_reactjs');
    })->name('navigate.post');

    // Route::get("/regulations", function(){
    //     return view('regulations');
    // });

    Route::get('/knowledge-management', [KnowledgeController::class, 'knowledge'])->name('knowledge.management');

    /* PROFILE */
    Route::get('/profile', function() {
        return view('intranet.pages.profile');
    })->name('profile');

    Route::post('/updateProfile', [UserController::class, 'update'])->name('update.profile');

    Route::get('/laporan-management', [LaporanRapatController::class, 'laporanRapat'])->name('laporan.management');

    Route::get('/notifRead/{notifId}', [NotificationController::class, 'readNotif'])->name('notif.read');
    /* ================== DATA FETCH ================== */
    Route::get('/news-detail/{news}', [NewsController::class, 'show'])->name('news.modal');
    Route::get('/leader-detail/{leader}', [LeaderController::class, 'show'])->name('leader.modal');

    /* EMPLOYEE FORUM */
    Route::get('/allNotif', [NotificationController::class, 'allNotif'])->name('allnotif');
    Route::get('/listPost', [PostController::class, 'listPost'])->name('list.post');
    Route::get('/listPost/{post}', [PostController::class, 'singlePost']);
    Route::post('/makePost', [PostController::class, 'makePost'])->name('make.post');
    Route::post('/updatePost/{post}', [PostController::class, 'updatePost']);
    Route::get('/deletePost/{postId}', [PostController::class, 'deletePost']);
    Route::post('/makeComment', [PostController::class, 'comment'])->name('make.comment');
    Route::post('/updateComment/{comment}', [PostController::class, 'editComment']);
    Route::get('/deleteComment/{commentId}', [PostController::class, 'deleteComment']);
    Route::post('/like', [PostController::class, 'like'])->name('like');
    Route::post('/unlike', [PostController::class, 'unlike']);
    Route::get('/seePost/{post}', [PostController::class, 'seePost']);
});

Route::any("*", function() {
    throw new NotFoundHttpException("Halaman Tidak Ditemukan");
});

Route::get("/comming-soon", function(){
    return view('comming_soon');
}) ->name('comming_soon');

Route::get("/login", [UserController::class, 'loginView']) ->name('login');

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
Route::get('unread_notif', [NotificationController::class, 'unreadNotif']);
Route::get('unread_count_notif', [NotificationController::class, 'unreadCount']);
Route::get('unread_chat', [NotificationController::class, 'unreadChat']);
Route::get('unread_count_chat', [NotificationController::class, 'unreadCount']);

/* NANTI DIBERESIN SUSUNAN ROUTENYA */
Route::post('login_user', [UserController::class, 'login'])->name('login_user');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('wifi_login', [DashboardController::class, 'apiRedirect']);
