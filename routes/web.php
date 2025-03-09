<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\CardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\WardAdmin\NewMemberController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\SuperAdmin\RestBalanceController;
use App\Http\Controllers\SuperAdmin\TransactionController;
use App\Http\Controllers\WardAdmin\WardAdminDashboardController;
use App\Http\Controllers\SuperAdmin\SuperAdminDashboardController;
use App\Http\Controllers\UnionAdmin\UnionAdminDashboardController;
use App\Http\Controllers\UpozilaAdmin\UpozilaAdminDashboardController;
use App\Http\Controllers\DistrictAdmin\DistrictAdminDashboardController;
use App\Http\Controllers\SuperAdmin\NoticeSettingController;
use App\Http\Controllers\SuperAdmin\OfferSettingController;
use App\Http\Controllers\SuperAdmin\SuperAdminIncomeAndExpenseController;
use App\Http\Controllers\SuperAdmin\SuperAdminReportController;

Route::get('/', function () {
    return view('front.index');
});

Route::get('/dashboard', function () {
    setPageMeta('Home');
    return view('SuperAdmin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

Route::get('user/list', [UserController::class, 'userList'])->name('user.list');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('user/{id}/status', [UserController::class, 'status'])->name('user.status');


Route::get('/get-districts/{division_id}', [LocationController::class, 'getDistricts']);
Route::get('/get-upozilas/{district_id}', [LocationController::class, 'getUpozilas']);
Route::get('/get-unions/{upozila_id}', [LocationController::class, 'getUnions']);



Route::middleware(['role:super_admin'])->group(function () {
    Route::prefix('super-admin')->name('super-admin.')->group(function () {
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index']);
        Route::get('/profile', [ProfileController::class, 'profileEdit'])->name('profile.index');
        Route::resource('/transactions', TransactionController::class);
        Route::get('/transaction-number-search/{search}', [TransactionController::class, 'searchNumber']);
        Route::get('/add-money', [TransactionController::class, 'addMoney'])->name('add-money');
        Route::post('/add-money', [TransactionController::class, 'addMoneyStore'])->name('add-money.store');
        Route::resource('/notice', NoticeSettingController::class);
        Route::resource('/offer', OfferSettingController::class);
        Route::get('/download-notice/{file}', function ($file) {
            $filePath = public_path("upload/notices/{$file}");

            if (File::exists($filePath)) {
                return Response::download($filePath);
            } else {
                return abort(404, 'File not found');
            }
        })->name('notice.download');

        //user
        Route::resource('/users', UserController::class);
        Route::post('/user/store', [UserController::class, 'userDatastore'])->name('user.store');
        Route::get('/get-union-admins/{upozila_id}', [UserController::class, 'getUnionAdmins']);
        Route::get('/get-upozila-admins/{district_id}', [UserController::class, 'getUpozilaAdmins']);
        Route::get('/user-manage', [UserController::class, 'userManage'])->name('user.manage');
        Route::post('/users/active-status-update', [UserController::class, 'activeStatusUpdate'])->name('user.active-status-update');

        Route::controller(RestBalanceController::class)
            ->prefix('rest-balance')->as('rest-balance.')->group(function () {
                Route::get('/', 'restBalances')->name('index');
                Route::get('/{id}/details', 'restBalanceDetails')->name('details');
                Route::get('/{id}/collect', 'restBalanceCollect')->name('collect');
                Route::post('/{id}/collect', 'restBalanceStore')->name('collect.store');
            });

        Route::get('/report-at-a-glance', [SuperAdminReportController::class, 'reportGlance'])->name('report.summery');
        Route::get('/report-user', [SuperAdminReportController::class, 'reportUser'])->name('report.user');
        Route::get('/search-admin-report', [SuperAdminReportController::class, 'searchAdmin'])->name('admin.report.search');
        Route::get('/income-expense', [SuperAdminIncomeAndExpenseController::class, 'incomeExpense'])->name('income-expense');
        Route::post('/income-expense', [SuperAdminIncomeAndExpenseController::class, 'store'])->name('income-expense.store');
    });
});

Route::middleware(['role:admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    });
});

Route::middleware(['role:dis_admin'])->group(function () {
    Route::prefix('district')->name('district.')->group(function () {
        Route::get('/dashboard', [DistrictAdminDashboardController::class, 'index']);
    });
});

Route::middleware(['role:upo_admin'])->group(function () {
    Route::prefix('upozila')->name('upozila.')->group(function () {
        Route::get('/dashboard', [UpozilaAdminDashboardController::class, 'index'])->name('dashboard');
    });
});

Route::middleware(['role:uni_admin'])->group(function () {
    Route::prefix('union')->name('union.')->group(function () {
        Route::get('/dashboard', [UnionAdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/add-money', [UnionAdminDashboardController::class, 'addMoney'])->name('addmoney');
        Route::get('/send-money', [UnionAdminDashboardController::class, 'sendMoney'])->name('sendmoney');
        Route::get('/send-money-report', [UnionAdminDashboardController::class, 'sendMoneyReport'])->name('sendmoneyReport');
        Route::get('/cash-out', [UnionAdminDashboardController::class, 'cashOut'])->name('cashOut');
        Route::get('/summary-report', [UnionAdminDashboardController::class, 'summaryReport'])->name('summaryReport');
        Route::get('/user-manage', [UnionAdminDashboardController::class, 'userManage'])->name('userManage');
        Route::get('/ward-admin-report', [UnionAdminDashboardController::class, 'wardAdminReport'])->name('wardAdminReport');
        Route::get('/team-list', [UnionAdminDashboardController::class, 'teamList'])->name('teamList');
        Route::get('/my-profile', [UnionAdminDashboardController::class, 'myProfile'])->name('myProfile');
        Route::get('/help-line', [UnionAdminDashboardController::class, 'helpLine'])->name('helpLine');
    });
});

Route::middleware(['role:ward_admin'])->group(function () {
    Route::controller(App\Http\Controllers\WardAdmin\CardController::class)
        ->prefix('ward-admin-cards')->as('ward_admin.cards.')->group(function () {
            Route::get('/', 'index')->name('list');
            Route::get('/create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::delete('delete/{id}', 'destroy')->name('destroy'); // Changed to DELETE
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::post('update/{id}', 'update')->name('update'); // Added {id} parameter
            Route::get('/verify', 'verify')->name('verify');
            Route::get('/search', 'searchCustomer')->name('search');
        });

    Route::controller(App\Http\Controllers\WardAdmin\BalanceController::class)
        ->prefix('ward-admin-balance')->as('ward_admin.balance.')->group(function () {
            Route::get('/request', 'create')->name('create');
            Route::post('store', 'store')->name('store');
        });
});


Route::prefix('ward-admin')->name('ward.')->group(function () {
    Route::get('/dashboard', [WardAdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/new-members', NewMemberController::class);
    Route::get('/offer', [WardAdminDashboardController::class, 'offer'])->name('offer');
    Route::get('/balance-statement', [WardAdminDashboardController::class, 'balanceStateMent'])->name('balance-statement');
    Route::get('/report', [WardAdminDashboardController::class, 'report'])->name('report');
    Route::get('/mobile-recharge', [WardAdminDashboardController::class, 'mobileRecharge'])->name('mobile-recharge');
    Route::get('/cash-out', [WardAdminDashboardController::class, 'cashout'])->name('cashout');
});

Route::controller(CardController::class)
    ->prefix('cards')->as('cards.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::get('/request', 'prndingCard')->name('request');
        Route::post('store', 'store')->name('store');
        Route::delete('delete/{id}', 'destroy')->name('destroy'); // Changed to DELETE
        Route::get('edit/{id}', 'edit')->name('edit');
        Route::post('update/{id}', 'update')->name('update'); // Added {id} parameter
        Route::post('/{id}/approve', [CardController::class, 'approveCard'])->name('cards.approve');
        Route::get('/search', [CardController::class, 'searchCard']);
    });










require __DIR__ . '/auth.php';
