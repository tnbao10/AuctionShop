<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\StoreController;
use App\Http\Controllers\Store\BrandController;
use App\Http\Controllers\Store\CategoryController;
use App\Http\Controllers\Store\TypeController;
use App\Http\Controllers\Store\ProductController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Store\StatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Store\AuditController;
use App\Http\Controllers\Client\PaymentController;
use Carbon\Carbon;
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
Route::get('/pusher-view', function () {
    return view('pusher-testing.showNotification');
});

Route::get('/getPusher', function () {
    return view('pusher-testing.form_pusher');
})->name('event.get-pusher');

Route::get('/pusher', function (Illuminate\Http\Request $request) {
    event(new App\Events\AuditPusherEvent($request));
    return redirect()->route('event.get-pusher');
})->name('event.pusher');

/* End test pusher */
// Route::view('/about', 'client/about');
// Route::get('about',function()
// {
//     return view('client.about');
// });
// Route::get('/about', 'client/about');
// Route::get('about', function () {
//     return about('client.about');
// });
Route::middleware(['autoGetPrice'])->group(function () {
    Route::prefix('/')->name('client.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::get('/{id}/san-pham', [ClientController::class, 'auditDetail'])->name('product.detail');
        Route::get('/dau-gia', [AuditController::class, 'auditProgress'])->name('product.audit');
        Route::get('{id}/cua-hang',[ClientController::class,'storeInfo'])->name('product.by.store');
        Route::get('/tim-kiem', [ClientController::class, 'search'])->name('search');
    });

    Route::prefix('/bai-viet')->name("post.")->group(function () {
        Route::get('/danh-sach', [PostController::class, 'list'])->name('list');
        Route::get('/chi-tiet/{baiviet}', [PostController::class, 'detail'])->name('detail');

    });

    Route::view('/about', 'client/about');
    Route::view('/quan-tri', 'admin/template/layout');

    Route::get('/dang-ky', [AuthController::class, 'registerView'])->name('register.view');
    Route::post('/xu-ly-dang-ky', [AuthController::class, 'registerHandle'])->name('register.handle');
    Route::get('/xac-thuc/{id}',[AuthController::class,'authVerify'])->name('register.auth.verify');
    Route::get('/dang-nhap', [AuthController::class, 'loginView'])->name('login.view');
    Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
    Route::get('/xu-ly-dang-nhap', [AuthController::class, 'loginHandle'])->name('login.handle');

    //xu ly quen mat khau
    Route::get('/quen-mat-khau', [AuthController::class, 'viewForgetPassword'])->name('forget.pass');
    Route::post('/xu-ly-quen-mat-khau', [AuthController::class, 'forgetPassword'])->name('handle.forget.password');
    Route::get('/xac-thuc-mat-khau/{id}', [AuthController::class, 'viewConfirmPassword'])->name('validate.password');
    Route::post('/xac-nhan-mat-khau-thay-doi', [AuthController::class, 'handleConfirmPassword'])->name('handle.confirm.password');


    Route::get('/chinh-sua-thong-tin', [AuthController::class, 'viewChangeInfo'])->name('view.change.info');
    Route::post('/xu-ly-chinh-sua-thong-tin', [AuthController::class, 'changeInfo'])->name('handle.change.info');
    Route::group(['middleware' => 'checkUser'], function () {
        Route::get('/danh-sach-tat-ca-cua-hang', [StoreController::class, 'listStore'])->name('listStore');
        Route::get('/chi-tiet/{cuahang}', [StoreController::class, 'detailStore'])->name('admin.detailStore');
        Route::post('/cap-nhat/{cuahang}', [StoreController::class, 'updateStore'])->name('admin.updateStore');

    Route::prefix('/nguoi-dung')->group(function () {
        Route::get('/danh-sach-tat-ca-nguoi-dung', [UserController::class, 'listUser'])->name('listUser');
        Route::post('/cap-nhat/{nguoidung}', [UserController::class, 'updateUser'])->name('updateUser');
    });

    Route::prefix('/thanh-toan')->name('payment.')->group(function () {
        Route::get('{idCart}/gio-hang/',[PaymentController::class, 'index'])->name('index');
        Route::post('/{idCart}/thanh-toan',[PaymentController::class, 'payment'])->name('handle');
    });

    Route::prefix('/bai-viet')->name('post.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/them', [PostController::class, 'create'])->name('create');
        Route::post('/luu', [PostController::class, 'store'])->name('store');
        Route::get('/sua/{baiviet}', [PostController::class, 'edit'])->name('edit');
        Route::post('/cap-nhat/{baiviet}', [PostController::class, 'update'])->name('update');
        Route::post('/xoa/{baiviet}', [PostController::class, 'delete'])->name('delete');
    });
        Route::group(['middleware' => 'checkSession'], function () {

            Route::get('/thong-tin-ca-nhan', [AuthController::class, 'info'])->name('user.info');
            Route::post('/dang-ky-cua-hang', [StoreController::class, 'handleRegisterStore'])->name('store.register');

            Route::prefix('/cua-hang')->group(function () {
                Route::get('/', [StoreController::class, 'storeDetail'])->name('store.detail');
                Route::get('/thong-tin', [StoreController::class, 'info'])->name('store.info');
                Route::post('/cap-nhat/{cuahang}', [StoreController::class, 'update'])->name('store.update');
            });

            Route::prefix('/don-hang')->name('order.')->group(function () {
                Route::get('/danh-sach-don-hang',  [OrderController::class, 'getList'])->name('getList');
                Route::post('/cap-nhat--don-hang/{donhang}',  [OrderController::class, 'update'])->name('update');
            });


            Route::get('/danh-sach-cua-hang', [AdminController::class, 'shoplist'])->name('admin.shoplist');

            Route::prefix('/thuong-hieu')->name('brand.')->group(function () {
                Route::get('/', [BrandController::class, 'index'])->name('index');
                Route::get('/them-moi', [BrandController::class, 'add'])->name('add');
                Route::post('/xu-ly-them-moi', [BrandController::class, 'store'])->name('store');
                Route::get('/chinh-sua/{id}', [BrandController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}', [BrandController::class, 'update'])->name('update');
                Route::get('/xoa/{id}', [BrandController::class, 'delete'])->name('delete');
            });

            Route::prefix('/danh-muc')->name('category.')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::get('/them-moi', [CategoryController::class, 'add'])->name('add');
                Route::post('/xu-ly-them-moi', [CategoryController::class, 'store'])->name('store');
                Route::get('/chinh-sua/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}', [CategoryController::class, 'update'])->name('update');
                Route::get('/xoa/{id}', [CategoryController::class, 'delete'])->name('delete');
            });

            Route::prefix('/loai-san-pham')->name('type.')->group(function () {
                Route::get('/', [TypeController::class, 'index'])->name('index');
                Route::get('/them-moi', [TypeController::class, 'add'])->name('add');
                Route::post('/xu-ly-them-moi', [TypeController::class, 'store'])->name('store');
                Route::get('/chinh-sua/{id}', [TypeController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}', [TypeController::class, 'update'])->name('update');
                Route::get('/xoa/{id}', [TypeController::class, 'delete'])->name('delete');
            });


            Route::prefix('/san-pham')->name('product.')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('index');
                Route::get('/them-moi', [ProductController::class, 'add'])->name('add');
                Route::post('/xu-ly-them-moi', [ProductController::class, 'store'])->name('store');
                Route::get('/chi-tiet/{id}', [ProductController::class, 'show'])->name('show');
                Route::post('/them-dau-gia/{id}', [ProductController::class, 'setupAudit'])->name('setup.audit');
                Route::get('/sua-san-pham/{id}',[ProductController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}',[ProductController::class, 'update'])->name('update');
                // Route::get('/xoa/{id}',[ProductController::class, 'delete'])->name('delete');
            });

            Route::prefix('/thong-ke')->name('stat.')->group(function () {
                Route::get('/thong-ke-doanh-thu', [StatController::class, 'revenue'])->name('revenue');
                Route::get('/thong-ke-don-hang', [StatController::class, 'order'])->name('order');
                Route::get('/thong-ke-san-pham', [StatController::class, 'product'])->name('product');
                Route::get('/thong-ke-nguoi-dung', [StatController::class, 'user'])->name('user');
                Route::get('/thong-ke-cua-hang', [StatController::class, 'store'])->name('store');
            });
        });
    });
});

