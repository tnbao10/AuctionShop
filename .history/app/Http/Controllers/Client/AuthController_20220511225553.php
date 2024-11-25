<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nguoidung;
use App\Models\Cuahang;
use Hash;
use Auth;
use Toastr;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthNotify;
use App\Mail\ForgetPassword;
use DB;
class AuthController extends Controller
{
    public function registerView()
    {
        // Toastr::success('Đăng ký tài khoản thành công', 'Thông báo', ["positionClass" => "toast-top-center"]);
        return view('client.auth.register');
    }

    public function registerHandle(Request $request)
    {
        $data = [
            'nd_hoten' => $request->nd_hoten,
            'nd_email' => $request->nd_email,
            'nd_sdt' => $request->nd_sdt,
            'nd_namsinh' => $request->nd_namsinh,
            'nd_diachi' => $request->nd_diachi,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];

        if ($request->password != $request->re_password) {
            toastr()->error('Mật khẩu không trùng khớp');
            return redirect()->back();
        }

        $checkEmail = Nguoidung::where('nd_email',$request->nd_email)->first();

        if($checkEmail != null || $checkEmail != "") {
            toastr()->error('Email đã được sử dụng');
            return redirect()->back();
        }

        $checkUsername = Nguoidung::where('username',$request->username)->first();

        if($checkUsername != null || $checkUsername != "") {
            toastr()->error('Tên đăng nhập đã được sử dụng');
            return redirect()->back();
        }

        $checkPhone = Nguoidung::where('nd_sdt',$request->nd_sdt)->first();

        if($checkPhone != null || $checkPhone != "") {
            toastr()->error('Số điện thoại đã được sử dụng');
            return redirect()->back();
        }

        $userInsert = Nguoidung::insertGetId($data);

        //send mail for authenticate
        $toMail = $request->nd_email;
        $link = url('/').'/xac-thuc/'.$userInsert;
        Mail::to($toMail)->send(new AuthNotify($request->nd_hoten,$link));
        toastr()->success('Đăng ký thành công | Vui lòng kiểm tra Gmail kích hoạt tài khoản');
        return redirect()->route('login.view');
    }

    public function viewForgetPassword() {
        return view('client.auth.forget-password');
    }

    public function forgetPassword(Request $request) {
        $email = $request->nd_email;
        $id = DB::table('nguoidung')->where('nd_email', $email)->first();
        $link = url('/').'/xac-thuc-mat-khau/'.$id->nd_id;
        Mail::to($email)->send(new ForgetPassword($link));
        return redirect()->back();
    }

    public function viewConfirmPassword($id) {
        $idUser = $id;
        return view('client.auth.view-confirm-password', compact('idUser'));
    }

    public function handleConfirmPassword(Request $request) {
        $userId = $request->nd_id;
        if ($request->password != $request->re_password) {
            toastr()->error('Mật khẩu không trùng khớp');
            return redirect()->back();
        }
        $update = Nguoidung::where('nd_id',$userId)->update(
            [
                'password' => Hash::make($request->password)
            ]
        );
        return view('client.auth.login');
    }

    public function loginView()
    {
        return view('client.auth.login');
    }

    public function authVerify($id) {
        DB::table('nguoidung')->where('nd_id',$id)->update(['nd_trangthai'=> 1]);
        toastr()->success('Tài khoản đã được kích hoạt');
        return redirect()->route('login.view');
    }

    public function loginHandle(Request $request)
    {
        $arrLogin = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $check = Nguoidung::where('username',$request->username)->where('nd_trangthai',0)->first();
        if($check != null) {
            toastr()->error('Tài khoản chưa được kích hoạt | Vui lòng vào Gmail kích hoạt tài khoản | Hoặc liên hệ với admin');
            return redirect()->back();
        }

        if (Auth::guard('nguoidung')->attempt($arrLogin)) {
            return redirect()->route('user.info');
        } else if (Auth::guard('quantrivien')->attempt($arrLogin)) {
            return redirect()->route('listStore');
        } else {
            toastr()->error('Sai tài khoản hoặc mật khẩu');
            return redirect()->back();
        }
    }

    public function info()
    {
        $userId = Auth::guard('nguoidung')->user()->nd_id;
        $storeInfo = Cuahang::where('nd_id', $userId)->first();
        $cart = DB::table('giohang')->join('sanpham','sanpham.sp_id','giohang.sp_id')->where('nd_id', $userId)->get();
        $bill = DB::table('donhang')->join('chitietdonhang','chitietdonhang.dh_id','donhang.dh_id')->join('sanpham','sanpham.sp_id','chitietdonhang.sp_id')
        ->where('nd_id', $userId)->get();
        return view('client.auth.info', compact('storeInfo','cart','bill'));
    }

    public function logout()
    {
        Auth::guard('nguoidung')->logout();
        Auth::guard('quantrivien')->logout();

        return redirect()->route('client.index');
    }

    public function viewChangeInfo() {
        return view('client.auth.change-info');
    }

    public function changeInfo(Request $request) {
        $userId = Auth::guard('nguoidung')->user()->nd_id;
        $data = [
            'nd_hoten' => $request->nd_hoten,
            'nd_email' => $request->nd_email,
            'nd_sdt' => $request->nd_sdt,
            'nd_namsinh' => $request->nd_namsinh,
            'nd_diachi' => $request->nd_diachi,
        ];
        $update = Nguoidung::find($userId)->update(
            $data
        );
        return redirect()->back();
    }
}
