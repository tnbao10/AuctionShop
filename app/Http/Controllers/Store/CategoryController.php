<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Danhmuc;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = $this->getStore();
        $data = Danhmuc::where('ch_id', $store->ch_id)->where('dm_trangthai',1)->get();
        return view('store.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('store.category.add');
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
            'dm_ten' => $request->dm_ten,
            'dm_mota' => $request->dm_mota,
            'ch_id' => $store->ch_id
        ];
        $checkValid = Danhmuc::where('dm_ten',$request->dm_ten)->where('ch_id', $store->ch_id)->first();

        if($checkValid != null || $checkValid != "") {
            $alert = $this->error("Danh mục đã tồn tại");
            return redirect()->back();
        }else{
            try {
                //code...
                $insert = Danhmuc::insert($data);
                $alert = $this->success("Tạo danh mục thành công");
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
        $data = Danhmuc::find($id);
        return view('store.category.edit', compact('data'));
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
            'dm_ten' => $request->dm_ten,
            'dm_mota' => $request->dm_mota
        ];
        try {
            //code...
            $update = Danhmuc::find($id)->update($data);
            $alert = $this->success("Cập nhật danh mục thành công");
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
        $category = Danhmuc::find($id);
        $category->dm_trangthai = 0;
        $category->save();
        $alert = $this->success("Xoá danh mục thành công");
        return redirect()->back()->with("msg", $alert);
    }
}
