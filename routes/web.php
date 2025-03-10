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
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
        Route::put('/profile/update', 'updateProfile')->name('profile.update');
        Route::put('/profile/update-password', 'updatePassword')->name('profile.updatePassword');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::get('user/list', 'userList')->name('user.list');
    Route::post('user/store', 'store')->name('user.store');
    Route::get('user/{id}/edit', 'edit')->name('user.edit');
    Route::put('user/{id}/update', 'update')->name('user.update');
    Route::delete('user/{id}', 'destroy')->name('user.destroy');
    Route::get('user/{id}/status', 'status')->name('user.status');
});


Route::controller(LocationController::class)->group(function () {
    Route::get('/get-districts/{division_id}', 'getDistricts');
    Route::get('/get-upozilas/{district_id}', 'getUpozilas');
    Route::get('/get-unions/{upozila_id}', 'getUnions');
});



// Route::middleware(['role:super_admin'])->group(function () {
    Route::prefix('super-admin')->name('super-admin.')->group(function () {
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index']);
        Route::get('/profile', [ProfileController::class, 'profileEdit'])->name('profile.index');

        Route::controller(TransactionController::class)->group(function () {
            Route::resource('/transactions', TransactionController::class); // Resource routes
            Route::get('/transaction-number-search/{search}', 'searchNumber');
            Route::get('/add-money', 'addMoney')->name('add-money');
            Route::post('/add-money', 'addMoneyStore')->name('add-money.store');
        });
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

        Route::controller(UserController::class)->group(function () {
            Route::resource('/users', UserController::class);  // Resource routes
            Route::post('/user/store', 'userDatastore')->name('user.store');
            Route::put('/user/{id}/update', 'userDataUpdate')->name('user.update');
            Route::get('/get-union-admins/{upozila_id}', 'getUnionAdmins');
            Route::get('/get-upozila-admins/{district_id}', 'getUpozilaAdmins');
            Route::get('/user-manage', 'userManage')->name('user.manage');
            Route::post('/users/active-status-update', 'activeStatusUpdate')->name('user.active-status-update');
        });

        Route::controller(RestBalanceController::class)
            ->prefix('rest-balance')->as('rest-balance.')->group(function () {
                Route::get('/', 'restBalances')->name('index');
                Route::get('/{id}/details', 'restBalanceDetails')->name('details');
                Route::get('/{id}/collect', 'restBalanceCollect')->name('collect');
                Route::post('/{id}/collect', 'restBalanceStore')->name('collect.store');
            });

        Route::controller(SuperAdminReportController::class)->group(function () {
            Route::get('/report-at-a-glance', 'reportGlance')->name('report.summery');
            Route::get('/report-user', 'reportUser')->name('report.user');
            Route::get('/search-admin-report', 'searchAdmin')->name('admin.report.search');
        });

        Route::controller(SuperAdminIncomeAndExpenseController::class)->group(function () {
            Route::get('/income-expense', 'incomeExpense')->name('income-expense');
            Route::post('/income-expense', 'store')->name('income-expense.store');
        });
    });
// });

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

// Route::middleware(['role:uni_admin'])->group(function () {
    Route::prefix('union')->name('union.')->group(function () {
        Route::controller(UnionAdminDashboardController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/add-money', 'addMoney')->name('addmoney');
            Route::get('/send-money', 'sendMoney')->name('sendmoney');
            Route::get('/send-money-report', 'sendMoneyReport')->name('sendmoneyReport');
            Route::get('/cash-out', 'cashOut')->name('cashOut');
            Route::get('/summary-report', 'summaryReport')->name('summaryReport');
            Route::get('/user-manage', 'userManage')->name('userManage');
            Route::get('/ward-admin-report', 'wardAdminReport')->name('wardAdminReport');
            Route::get('/team-list', 'teamList')->name('teamList');
            Route::get('/my-profile', 'myProfile')->name('myProfile');
            Route::get('/help-line', 'helpLine')->name('helpLine');
        });
    Route::resource('/transactions', TransactionController::class);
    Route::controller(TransactionController::class)->group(function () {
            Route::post('/add-money/store', 'addMoneyStore')->name('add-money.store');
            Route::get('/transaction-number-search/{search}', 'UnionSearchNumber');
    });
    });
// });

// Route::middleware(['role:ward_admin'])->group(function () {
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
// });


Route::prefix('ward-admin')->name('ward.')->group(function () {
    Route::resource('/new-members', NewMemberController::class);
    Route::controller(WardAdminDashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/offer', 'offer')->name('offer');
        Route::get('/balance-statement', 'balanceStateMent')->name('balance-statement');
        Route::get('/report', 'report')->name('report');
        Route::get('/mobile-recharge', 'mobileRecharge')->name('mobile-recharge');
        Route::get('/cash-out', 'cashout')->name('cashout');
    });
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
