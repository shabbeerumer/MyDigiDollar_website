<?php

use App\Http\Controllers\Admin\AdminAuth\AdminLoginController;
use App\Http\Controllers\Admin\AdminAuth\AdminRegisterController;
use App\Http\Controllers\Admin\Admindashboar\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\user\demo\DemoPageController;
use App\Http\Controllers\user\about\AboutPageController;
use App\Http\Controllers\user\webpage\WebPageController;
use App\Http\Controllers\user\account\AccountPageController;
use App\Http\Controllers\user\contact\ContactPageController;
use App\Http\Controllers\user\dashboard\dashboardPageController;
use App\Http\Controllers\user\deposit\DepositPageController;
use App\Http\Controllers\user\depositeone\DepositeOnePageController;
use App\Http\Controllers\user\packages\PackagesPageController;
use App\Http\Controllers\user\privacy\privacyController;
use App\Http\Controllers\user\refarrel\RefarrelPageController;
use App\Http\Controllers\user\resetpass\ResetPassController;
use App\Http\Controllers\user\subscribe\subscribeController;
use App\Http\Controllers\user\withdraw\WithDrawController;
use App\Http\Middleware\auth\authentication;
use App\Models\user_packages;
use App\Models\WithdrawRequest;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('user.webpage');
});



// for user auth
Route::get('auth/register', [RegisterController::class, 'register'])->name('register');
Route::post('auth/processregister', [RegisterController::class, 'processregister'])->name('processregister');
Route::get('auth/login', [LoginController::class, 'login'])->name('login');
Route::post('auth/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
// user auth end

// for admin auth
// Route::get('admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');
// Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
// Route::post('admin/processregister', [AdminRegisterController::class, 'processregister'])->name('admin.processregister');
// Route::post('admin/authenticate', [AdminLoginController::class, 'authenticate'])->name('login.authenticate');

// admin auth end
Route::get('user/resetpass', [ResetPassController::class, 'index'])->name('resetpass');
Route::get('user/webpage', [WebPageController::class, 'index'])->name('webpage');









Route::middleware([authentication::class])->group(function () {
    Route::get('user/about', [AboutPageController::class, 'index'])->name('about');
    Route::get('user/contact', [ContactPageController::class, 'index'])->name('contact');
    Route::get('user/account', [AccountPageController::class, 'index'])->name('account');
    Route::get('user/dashboard', [DashboardPageController::class, 'index'])->name('dashboard');
    Route::get('user/depositeone', [DepositeOnePageController::class, 'index'])->name('depositeone');
    Route::get('user/packages', [PackagesPageController::class, 'index'])->name('packages');
    Route::get('user/refarrel', [RefarrelPageController::class, 'index'])->name('refarrel');
    Route::get('user/subscribe', [subscribeController::class, 'index'])->name('subscribe');
    Route::get('user/privacy', [privacyController::class, 'index'])->name('privacy');
    Route::get('user/account', [AccountPageController::class, 'index'])->name('account');
    Route::get('auth/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/requests', [WebPageController::class, 'showRequests'])->name('admin.requests');
    Route::get('/admin/cards', [AdminDashboardController::class, 'cardsindex'])->name('admin.cards');
    Route::get('/admin/withdraw', [AdminDashboardController::class, 'withdrawindex'])->name('admin.withdraw');
    Route::get('user/withdraw', [WithDrawController::class, 'index'])->name('withdraw');
    Route::post('user/dashboard/buyPackage', [dashboardPageController::class, 'buyPackage'])->name('buyPackage');
    Route::post('/admin/respond-request/{id}', [PackagesPageController::class, 'respondRequest']);
    Route::post('/user/submitWithdrawRequest', [WithDrawController::class, 'submitWithdrawRequest'])->name('user.submitWithdrawRequest');
    Route::post('/submit-request', [PackagesPageController::class, 'submitRequest'])->name('submit-request');

    Route::patch('/admin/requests/{id}', [WebPageController::class, 'updateRequest'])->name('admin.requests.update');
    Route::patch('/admin/withdraw/{id}', [AdminDashboardController::class, 'updateWithdrawRequest'])->name('admin.updateWithdrawRequest');
});




// Route::get('/log',function(){
//  Log::info("this is my log");

// });

