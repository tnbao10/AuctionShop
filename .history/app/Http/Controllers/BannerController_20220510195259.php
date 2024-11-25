<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = DB::table('banner')->get();
        return view('admin.banner.index',compact('data'));
    }
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add-banner');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $now = Carbon::now();

            $hinhanh = $request->file('hinhanh');
            if ($request->file('hinhanh')->isValid()) {
                # code...
                $uploadPath = public_path('/upload/banner');
                $random = rand(1,1000);
                $tenHA = $hinhanh->getClientOriginalName();
                $hinhanh->move($uploadPath,$random.$tenHA);
                $banner = DB::table('banner')
                ->insert(
                    [
                        'bn_tieude' => $request->tieude,
                        'bn_hinhanh' => $random.$tenHA,
                        'bn_noidung' => $request->noidung,
                        'bn_trangthai' => 1,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
                if($banner)
                {
                    $success = Session::put('alert-info', 'Thêm dữ liệu thành công');
                    return redirect()->route('banner');
                }
                else
                {
                    $success = Session::put('alert-info', 'Thêm dữ liệu không thành công');
                    return redirect()->route('banner');
                }
            }
            else {
                $success = Session::put('alert-info', 'Thêm dữ liệu không thành công');
                return redirect()->route('banner');
            }
        
        }
        catch (\Throwable $th)
        {
            $success = Session::put('alert-info', 'Thêm dữ liệu không thành công');
            return redirect()->route('banner');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = DB::table('banner')->where('bn_id','=',$id)->first();
        return view('admin.banner.detail',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $bn = DB::table('banner')->where('bn_id', $id)->first();
        return view('admin.banner.edit', compact('bn'));
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
        try{
            if($request->tieude == '' ){
                $success = Session::put('alert-del', 'Tên tiêu đề không được trống');
                return redirect()->back();
            }
            $hinhanh = $request->file('hinhanh');
            if ($request->file('hinhanh')->isValid()) {
                $now = Carbon::now();
                //$hinhanh = $request->file('hinhanh');
                $tenHA = $hinhanh->getClientOriginalName();
                $rd = rand(1000,9999);
                $thumuc = public_path('/upload/banner');
                $hinhanh->move($thumuc,$rd.$tenHA);
                $data = DB::table('banner')->where('bn_id',$id)
                ->update(
                    [
                        'bn_tieude' => $request->tieude,
                        'bn_hinhanh' => $random.$tenHA,
                        'bn_noidung' => $request->noidung,
                        'updated_at' => $now,
                    ]
                );
    
                //Cập nhật xong cập nhật lại loại để show ra kèm theo thông báo
                $success = Session::put('alert-info', 'Cập nhật dữ liệu thành công');
                return redirect()->route('banner');
            }else{
                $now = Carbon::now();
                $data = DB::table('banner')->where('bn_id',$id)
                            ->update(
                                [
                                    'bn_tieude' => $request->tenTH,
                                    'updated_at' => $now,
                                ]
                            );
                //Cập nhật xong cập nhật lại loại để show ra kèm theo thông báo
                $success = Session::put('alert-info', 'Cập nhật dữ liệu thành công');
                return redirect()->route('banner');
            }
        }
        catch (\Throwable $th)
        {
            $success = Session::put('alert-danger', 'Sửa không thành công');
            return redirect()->route('banner');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = DB::table('banner')->where('bn_id',$id)->delete();
        $success = Session::put('alert-del', 'Xóa dữ banner thành công');
        return redirect()->route('banner');
    }

    public function CapNhatTrangThai($id,$trangthai) {
        switch ($trangthai) {
            case '1':
                # code...
                DB::table('banner')->where('bn_id','=',$id)->update(['bn_trangthai' => '1']);
                return redirect()->route('banner');
                break;
            case '0':
                # code...
                DB::table('banner')->where('bn_id','=',$id)->update(['bn_trangthai' => '0']);
                return redirect()->route('banner');
                break;
        }
    }
}
