<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use DB;
use DateTime;
use Carbon\Carbon;
class ClientController extends Controller
{
    public function index() {
        $timeNow = Carbon::now();
        $product = DB::table('daugia')
        ->join('sanpham','sanpham.sp_id','daugia.sp_id')
        ->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('daugia.dg_thoigianbatdau','<=',new DateTime($timeNow))
        ->where('daugia.dg_thoigianketthuc','>=',new DateTime($timeNow))
        ->where('daugia.dg_trangthai',1)
        ->where('hinhanhsanpham.hasp_anhdaidien',1)
        ->get();
        foreach ($product as $key => $value) {
            $value->isAuction=true;
        }
        $post = DB::table('baiviet')->paginate(3);
        return view('client.index', compact('product', 'post'));
    }

    public function listProduct() {
        $product = DB::table('daugia')
        ->join('sanpham','sanpham.sp_id','daugia.sp_id')
        ->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('hinhanhsanpham.hasp_anhdaidien',1)
        ->get();

    }

    public function auditDetail($id) {
        $detail = DB::table('daugia')
        ->join('sanpham','sanpham.sp_id','daugia.sp_id')
        ->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->join('cuahang','cuahang.ch_id','daugia.ch_id')
        ->where('hinhanhsanpham.hasp_anhdaidien',1)
        ->where('daugia.dg_id',$id)
        ->first();

        // dd($detail);
        if($detail == null || $detail == "") {
            $detail = DB::table('sanpham')
            ->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
            ->join('cuahang','cuahang.ch_id','sanpham.ch_id')
            ->where('hinhanhsanpham.hasp_anhdaidien',1)
            ->where('sanpham.sp_id',$id)
            ->first();
        }

        // dd($detail);
        // dd();

        $imageProduct = DB::table('hinhanhsanpham')->where('sp_id',$detail->sp_id)->get();

        $audit = DB::table('chitietdaugia')->where('dg_id', $id)->orderBy('ctdg_thoigian','desc')->get();
        $maxPrice = DB::table('chitietdaugia')
        ->where('dg_id', $id)
        ->orderBy('ctdg_thoigian','desc')
        ->first();
        return view('client.product.detail', compact('detail','audit','maxPrice','imageProduct'));
    }


    public function storeInfo($id) {
        $storeInfo = DB::table('cuahang')->where('ch_id', $id)->first();
        $product = DB::table('sanpham')->where('ch_id', $id)->get();
        $category = DB::table('danhmuc')->where('ch_id',$id)->get();
        $productType = DB::table('loaisanpham')->where('ch_id',$id)->get();
        // Duongg
        //select * from `nguoidung` inner join `nguoidung`.`nd_id` on `cuahang` = `cuahang`.`nd_id` where `cuahang`.`ch_id` = 1
        // $user = DB::table('nguoidung')  
        // ->join('cuahang','cuahang.nd_id','=','nguoidung.nd_id')
        // ->where('cuahang.ch_id',$id)
        // ->get();

        $user = DB::table('nguoidung')
        ->join('cuahang','cuahang.nd_id','nguoidung.nd_id')
        ->where('cuahang.ch_id',$id)
        ->get();
        // Duongg
        //dd($storeInfo);
        return view('client.product.store', compact('product','storeInfo','category','productType','user'));
    }

    public function search(Request $request)
    {
        $condition = "%".$request->name."%";
        $timeNow = Carbon::now();
        $product = DB::table('daugia')
        ->join('sanpham','sanpham.sp_id','daugia.sp_id')
        ->join('hinhanhsanpham','hinhanhsanpham.sp_id','sanpham.sp_id')
        ->where('sp_ten','LIKE',$condition)
        ->where('hinhanhsanpham.hasp_anhdaidien',1)
        ->orderBy('dg_thoigianketthuc', 'desc')
        ->get();

        foreach ($product as $key => $value) {
            if($value->dg_thoigianbatdau <= Date('Y-m-d H:i:s') && $value->dg_thoigianketthuc >= Date('Y-m-d H:i:s')){
                $value->isAuction=true;
            }else{
                $value->isAuction=false;
            }
        }
        return view('client.product.list', compact('product'));
    }
}
