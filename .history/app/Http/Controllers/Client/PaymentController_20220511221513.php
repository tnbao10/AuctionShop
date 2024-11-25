<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Toastr;
class PaymentController extends Controller
{
    public function index($idCart) {
        $product = DB::table('giohang')->join('sanpham','sanpham.sp_id','giohang.sp_id')->first();
        return view('client.payment.index', compact('product'));
    }

    public function payment(Request $request ,$idCart) {

        $cart = DB::table('giohang')->join('sanpham','sanpham.sp_id','giohang.sp_id')->where('gh_id', $idCart)->first();

        $insert = DB::table('donhang')->insertGetId(
            [
                'dh_tongtien' => $cart->gh_dongia,
                'dh_ngaytao' => Carbon::now(),
                'dh_diachi' => $request->dh_diachi,
                'dh_sdt' => $request->dh_sdt,
                'nd_id' => $request->nd_id,
                'ch_id' => $cart->ch_id,
                'dh_trangthai' => 0
            ]
        );
        $removeCart = DB::table('giohang')->where('gh_id', $cart->gh_id)->delete();
        toastr()->success('Thanh toán thành công! Đơn hàng đang chờ xác nhận');
        $detail = DB::table('chitietdonhang')->insert(
            [
                'ctdh_dongia' => $cart->gh_dongia,
                'sp_id' => $cart->sp_id,
                'dh_id' => $insert
            ]
        );

        return redirect()->route('user.info');
    }
}
