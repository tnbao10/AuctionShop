<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaisanpham;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = $this->getStore();
        $data = Loaisanpham::where('ch_id', $store->ch_id)->where('lsp_trangthai',1)->get();
        return view('store.type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('store.type.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alert = '';
        $store = $this->getStore();
        $data = [
            'lsp_ten' => $request->lsp_ten,
            'ch_id' => $store->ch_id
        ];

        $checkValid = Loaisanpham::where('lsp_ten',$request->lsp_ten)->where('ch_id', $store->ch_id)->first();

        if($checkValid != null || $checkValid != "") {
            $alert = $this->error("Loại sản phẩm đã tồn tại");
            return redirect()->back();
        }else{
            try {
                //code...
                $insert = Loaisanpham::insert($data);
                $alert = $this->success("Tạo loại sản phẩm thành công");
            } catch (\Exception $ex) {
                //throw $th;
                $alert = $this->error($ex);
            }
        }


        return redirect()->back()->with("msg",$alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Loaisanpham::find($id);
        return view('store.type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'lsp_ten' => $request->lsp_ten,
            'lsp_mota' => $request->lsp_mota
        ];
        try {
            //code...
            $update = Loaisanpham::find($id)->update($data);
            $alert = $this->success("Cập nhật loại sản phẩm thành công");
        } catch (\Exception $ex) {
            //throw $th;
            $alert = $this->error($ex);
        }

        return redirect()->back()->with("msg",$alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $type = Loaisanpham::find($id);
        $type->lsp_trangthai = 0;
        $type->save();
        $alert = $this->success("Xoá loại sản phẩm thành công");
        return redirect()->back()->with("msg", $alert);
    }
}
