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
        Route::get('/', [ClientController::class, 'index'])->name('index');    //HOME
        Route::get('/tim-kiem', [ClientController::class, 'search'])->name('search');  //show sản phẩm
        Route::get('/{id}/san-pham', [ClientController::class, 'auditDetail'])->name('product.detail'); //chi tiết sản phẩm
        Route::get('/dau-gia', [AuditController::class, 'auditProgress'])->name('product.audit');
        Route::get('{id}/cua-hang',[ClientController::class,'storeInfo'])->name('product.by.store'); // chi tiết của hàng
    });

   
    Route::prefix('/bai-viet')->name('post.')->group(function () {
        Route::get('/danh-sach', [PostController::class, 'list'])->name('list');  //danh sách bài viết
        Route::get('/chi-tiet/{baiviet}', [PostController::class, 'detail'])->name('detail'); //chi tiết bìa viết

        Route::get('/', [PostController::class, 'index'])->name('index'); //bài viết góc nhìn trong info
        Route::get('/them', [PostController::class, 'create'])->name('create'); //thêm bài viết
        Route::post('/luu', [PostController::class, 'store'])->name('store');  //lưu bài viết
        Route::get('/sua/{baiviet}', [PostController::class, 'edit'])->name('edit'); 
        Route::post('/cap-nhat/{baiviet}', [PostController::class, 'update'])->name('update');
        Route::post('/xoa/{baiviet}', [PostController::class, 'delete'])->name('delete');
    });

    Route::view('/about', 'client/about'); //trang about
    Route::view('/quan-tri', 'admin/template/layout'); //trang quản trị

    Route::get('/dang-ky', [AuthController::class, 'registerView'])->name('register.view'); //view đăng ký
    Route::post('/xu-ly-dang-ky', [AuthController::class, 'registerHandle'])->name('register.handle'); //xử lý đăng ký
    Route::get('/xac-thuc/{id}',[AuthController::class,'authVerify'])->name('register.auth.verify'); // xác thực mail
    Route::get('/dang-nhap', [AuthController::class, 'loginView'])->name('login.view');  // view đăng nhập
    Route::get('/xu-ly-dang-nhap', [AuthController::class, 'loginHandle'])->name('login.handle'); //chưa kích hoặc tk hoặc vô được hoặc sai tk.mk
    Route::get('/dang-xuat', [AuthController::class, 'logout'])->name('logout'); //view đăng xuất

    //xu ly quen mat khau
    Route::get('/quen-mat-khau', [AuthController::class, 'viewForgetPassword'])->name('forget.pass'); //view quên mật khẩu
    Route::post('/xu-ly-quen-mat-khau', [AuthController::class, 'forgetPassword'])->name('handle.forget.password'); //xử lý
    Route::get('/xac-thuc-mat-khau/{id}', [AuthController::class, 'viewConfirmPassword'])->name('validate.password'); //xác thực
    Route::post('/xac-nhan-mat-khau-thay-doi', [AuthController::class, 'handleConfirmPassword'])->name('handle.confirm.password'); //xác nhận thay đổi


    Route::get('/chinh-sua-thong-tin', [AuthController::class, 'viewChangeInfo'])->name('view.change.info'); //view sửa thông tin 
    Route::post('/xu-ly-chinh-sua-thong-tin', [AuthController::class, 'changeInfo'])->name('handle.change.info'); //xử lý thông tin (nhập vô để chỉnh sửa)
    Route::group(['middleware' => 'checkUser'], function () {
        Route::get('/danh-sach-tat-ca-cua-hang', [StoreController::class, 'listStore'])->name('listStore'); //danh sách tất cả cửa hàng (phải đăng nhập info)
        Route::post('/cap-nhat/{cuahang}', [StoreController::class, 'updateStore'])->name('admin.updateStore'); //cập nhật khóa hay mở cửa hàng (Chỉnh sửa)

    Route::prefix('/nguoi-dung')->group(function () {
        Route::get('/danh-sach-tat-ca-nguoi-dung', [UserController::class, 'listUser'])->name('listUser'); //Danh sách tất cả người dùng
        Route::post('/cap-nhat/{nguoidung}', [UserController::class, 'updateUser'])->name('updateUser'); //Khóa hoặc mở (Chỉnh sửa)
    });

    Route::prefix('/thanh-toan')->name('payment.')->group(function () {
        Route::get('{idCart}/gio-hang/',[PaymentController::class, 'index'])->name('index'); //view thanh toán
        Route::post('/{idCart}/thanh-toan',[PaymentController::class, 'payment'])->name('handle'); //thanh toán
    });

    
        Route::group(['middleware' => 'checkSession'], function () {

            Route::get('/thong-tin-ca-nhan', [AuthController::class, 'info'])->name('user.info'); //view Thông tin cá nhân
            Route::post('/dang-ky-cua-hang', [StoreController::class, 'handleRegisterStore'])->name('store.register'); //Thực hiện đăng ký cửa hàng

            Route::prefix('/cua-hang')->group(function () { 
                Route::get('/', [StoreController::class, 'storeDetail'])->name('store.detail'); //Thông tin sàn đáu giá view (Info)
                Route::get('/thong-tin', [StoreController::class, 'info'])->name('store.info'); //thông tin sàn (Info)
                Route::post('/cap-nhat/{cuahang}', [StoreController::class, 'update'])->name('store.update'); //cập nhật cửa hàng (info)
            });

            Route::prefix('/don-hang')->name('order.')->group(function () {
                Route::get('/danh-sach-don-hang',  [OrderController::class, 'getList'])->name('getList'); // đơn hàng (Info)
                Route::post('/cap-nhat--don-hang/{donhang}',  [OrderController::class, 'update'])->name('update');
            });



            Route::prefix('/thuong-hieu')->name('brand.')->group(function () {
                Route::get('/', [BrandController::class, 'index'])->name('index'); // danh sách thương hiệu sản phẩm
                Route::get('/them-moi', [BrandController::class, 'add'])->name('add');  //thêm mới thương hiệu 
                Route::post('/xu-ly-them-moi', [BrandController::class, 'store'])->name('store');   //xử lý thêm mới thương hiệu 
                Route::get('/chinh-sua/{id}', [BrandController::class, 'edit'])->name('edit'); //chỉnh sửa tên thương hiệu
                Route::post('/xu-ly-chinh-sua/{id}', [BrandController::class, 'update'])->name('update'); //xử lý chỉnh sửa tên thương hiệu
                Route::get('/xoa/{id}', [BrandController::class, 'delete'])->name('delete'); //xóa thương hiêu
            });

            Route::prefix('/danh-muc')->name('category.')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index'); // Danh sách danh mục
                Route::get('/them-moi', [CategoryController::class, 'add'])->name('add'); 
                Route::post('/xu-ly-them-moi', [CategoryController::class, 'store'])->name('store');
                Route::get('/chinh-sua/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}', [CategoryController::class, 'update'])->name('update');
                Route::get('/xoa/{id}', [CategoryController::class, 'delete'])->name('delete');
            });

            Route::prefix('/loai-san-pham')->name('type.')->group(function () { 
                Route::get('/', [TypeController::class, 'index'])->name('index'); // Danh sách loại sản phẩm
                Route::get('/them-moi', [TypeController::class, 'add'])->name('add');
                Route::post('/xu-ly-them-moi', [TypeController::class, 'store'])->name('store');
                Route::get('/chinh-sua/{id}', [TypeController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}', [TypeController::class, 'update'])->name('update');
                Route::get('/xoa/{id}', [TypeController::class, 'delete'])->name('delete');
                Route::get('/xoa1/{id}', [TypeController::class, 'delete1'])->name('delete');
            });


            Route::prefix('/san-pham')->name('product.')->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('index'); //Danh sách sản phẩm
                Route::get('/them-moi', [ProductController::class, 'add'])->name('add');
                Route::post('/xu-ly-them-moi', [ProductController::class, 'store'])->name('store');
                Route::get('/chi-tiet/{id}', [ProductController::class, 'show'])->name('show');
                Route::post('/them-dau-gia/{id}', [ProductController::class, 'setupAudit'])->name('setup.audit');
                Route::get('/sua-san-pham/{id}',[ProductController::class, 'edit'])->name('edit');
                Route::post('/xu-ly-chinh-sua/{id}',[ProductController::class, 'update'])->name('update');
                Route::get('/xoa/{id}',[ProductController::class, 'delete'])->name('delete');
            });
            

          
        });
    });
});

