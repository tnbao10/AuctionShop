<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thuonghieu;
use Toastr;
class BrandController extends Controller
{
    public function index() {
        $store = $this->getStore();
        $data = Thuonghieu::where('ch_id', $store->ch_id)->where('th_trangthai',1)->get();
        return view('store.brand.index', compact('data'));
    }

    #Bé Thư kêu để luôn
    public function add() {
        // Toastr::success('Đăng ký tài khoản thành công', 'Thông báo', ["positionClass" => "toast-top-center"]);
        toastr()->success('Tạo thương hiệu thành công');
        return view('store.brand.add');
    }

    public function store(Request $request) {
        $alert = '';
        $store = $this->getStore();
        $data = [
            'th_ten' => $request->th_ten,
            'ch_id' => $store->ch_id
        ];

        $checkValid = Thuonghieu::where('th_ten',$request->th_ten)->where('ch_id', $store->ch_id)->first();

        if($checkValid != null || $checkValid != "") {
            $alert = $this->error("Thương hiệu đã tồn tại");
            return redirect()->back();
        }else {
            try {
                //code...
                $insert = Thuonghieu::insert($data);
                $alert = $this->success("Tạo thương hiệu thành công");
            } catch (\Exception $ex) {
                //throw $th;
                $alert = $this->error($ex);
            }
        }


        return redirect()->back()->with("msg",$alert);
    }

    public function edit($id) {
        $data = Thuonghieu::find($id);
        return view('store.brand.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $data = [
            'th_ten' => $request->th_ten
        ];
        try {
            //code...
            $update = Thuonghieu::find($id)->update($data);
            $alert = $this->success("Cập nhật thương hiệu thành công");
        } catch (\Exception $ex) {
            //throw $th;
            $alert = $this->error($ex);
        }

        return redirect()->back()->with("msg",$alert);
    }

    public function delete($id) {
        $branch = Thuonghieu::find($id);
        $branch->th_trangthai = 0;
        $branch->save();
        $alert = $this->success("Xoá thương hiệu thành công");
        return redirect()->back()->with("msg", $alert);
    }

}
