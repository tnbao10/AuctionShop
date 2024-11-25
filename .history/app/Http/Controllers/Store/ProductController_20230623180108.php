<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use App\Models\Thuonghieu;
use App\Models\Loaisanpham;
use App\Models\Daugia;
use DB;
use Carbon\Carbon;
use DateTime;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = $this->getStore();
        $data = Sanpham::where('sanpham.ch_id', $store->nd_id)->where('sp_trangthai',1)
                ->join('thuonghieu','thuonghieu.th_id','sanpham.th_id')
                ->join('loaisanpham','loaisanpham.lsp_id','sanpham.lsp_id')
                ->get();
        return view('store.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $store = $this->getStore();
        $type = Loaisanpham::where('lsp_id', $store->ch_id)->where('lsp_trangthai',1)->get();
        $cat = Danhmuc::where('ch_id', $store->ch_id)->where('dm_trangthai',1)->get();
        $brand = Thuonghieu::where('ch_id', $store->ch_id)->where('th_trangthai',1)->get();

        return view('store.product.add', compact('type','cat','brand','store'));
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
            'sp_ten' => $request->sp_ten,
            'sp_soluong' => $request->sp_soluong,
            'sp_mota' => $request->sp_mota,
            'sp_gia' => $request->sp_gia,
            'lsp_id' => $request->lsp_id,
            'th_id' => $request->th_id,
            'ch_id' => $store->ch_id
        ];

        try {
            //code...
            $insert = Sanpham::insertGetId($data);
            //add category
            if($request->dm_id != null || $request->dm_id != "") {
                $insertCat = DB::table('danhmuc_sanpham')->insert(
                    [
                        'sp_id' => $insert,
                        'dm_id' => $request->dm_id
                    ]
                );
            }


            foreach ($request->sp_hinhanh as $key => $value) {

                $nameFile = $value->getClientOriginalName('sp_hinhanh');
                $value->move('upload/images/product',$nameFile);

                if ($key == 0) {
                    # code...
                    DB::table('hinhanhsanpham')->insert(
                        [
                            'hasp_anhdaidien' => 1,
                            'hasp_duongdan' => 'upload/images/product/'.$nameFile,
                            'sp_id' => $insert
                        ]
                    );
                }else {
                    DB::table('hinhanhsanpham')->insert(
                        [
                            'hasp_anhdaidien' => 0,
                            'hasp_duongdan' => 'upload/images/product/'.$nameFile,
                            'sp_id' => $insert
                        ]
                    );
                }


            }

            $alert = $this->success("Tạo sản phẩm thành công");
        } catch (\Exception $ex) {
            //throw $th;
            $alert = $this->error($ex);
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
        $detail = Sanpham::find($id);
        $image = DB::table('hinhanhsanpham')->where('sp_id', $id)->get();
        $timeNow = Carbon::now();
        $auditCurrent = DB::table('daugia')
        ->where('daugia.dg_thoigianbatdau','<=',new DateTime($timeNow))
        ->where('daugia.dg_thoigianketthuc','>=',new DateTime($timeNow))
        ->where('sp_id',$id)
        ->count();
        $auditInfo = DB::table('daugia')
        ->join('chitietdaugia','chitietdaugia.dg_id','daugia.dg_id')
        ->join('nguoidung','nguoidung.nd_id','chitietdaugia.nd_id')
        ->where('daugia.dg_thoigianbatdau','<=',new DateTime($timeNow))
        ->where('daugia.dg_thoigianketthuc','>=',new DateTime($timeNow))
        ->where('sp_id',$id)
        ->get();

        $auditHistory = DB::table('daugia')->where('sp_id',$id)->get();
        return view('store.product.detail', compact('detail','image','auditCurrent','auditHistory','auditInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = $this->getStore();
        $type = Loaisanpham::where('lsp_id', $store->ch_id)->where('lsp_trangthai',1)->get();
        $cat = Danhmuc::where('ch_id', $store->ch_id)->where('dm_trangthai',1)->get();
        $brand = Thuonghieu::where('ch_id', $store->ch_id)->where('th_trangthai',1)->get();
        $product = Sanpham::join('danhmuc_sanpham','danhmuc_sanpham.sp_id','sanpham.sp_id')->where('danhmuc_sanpham.sp_id',$id)->where('sanpham.sp_id',$id)->first();
        // dd($product);
        return view('store.product.edit', compact('product','type','cat','brand','store'));
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
        $alert = '';
        $store = $this->getStore();
        $data = [
            'sp_ten' => $request->sp_ten,
            'sp_soluong' => $request->sp_soluong,
            'sp_mota' => $request->sp_mota,
            'sp_gia' => $request->sp_gia,
            'lsp_id' => $request->lsp_id,
            'th_id' => $request->th_id,
            'ch_id' => $store->ch_id
        ];
        try {
            //code...
            $insert = Sanpham::where('sp_id',$id)->update($data);
            //add category
            if($request->dm_id != null || $request->dm_id != "") {

                $delete = DB::table('danhmuc_sanpham')->where('sp_id', $id)->delete();

                $insertCat = DB::table('danhmuc_sanpham')->insert(
                    [
                        'sp_id' => $insert,
                        'dm_id' => $request->dm_id
                    ]
                );
            }

            if($request->sp_hinhanh != null && $request->sp_hinhanh != '') {
                foreach ($request->sp_hinhanh as $key => $value) {
                    $nameFile = $value->getClientOriginalName('sp_hinhanh');
                    $value->move('upload/images/product',$nameFile);

                    if ($key == 0) {
                        # code...
                        DB::table('hinhanhsanpham')->insert(
                            [
                                'hasp_duongdan' => 'upload/images/product/'.$nameFile,
                                'sp_id' => $insert
                            ]
                        );
                    }else {
                        DB::table('hinhanhsanpham')->insert(
                            [
                                'hasp_anhdaidien' => 0,
                                'hasp_duongdan' => 'upload/images/product/'.$nameFile,
                                'sp_id' => $insert
                            ]
                        );
                    }
                }
            }

            $alert = $this->success("Sửa sản phẩm thành công");
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
    public function destroy($id)
    {
        //
    }

    public function setupAudit(Request $request,$id) {
        $store = $this->getStore();
        $data = [
            'dg_thoigianbatdau' => $request->dg_thoigianbatdau,
            'dg_thoigianketthuc' => $request->dg_thoigianketthuc,
            'dg_giakhoidiem' => $request->dg_giakhoidiem,
            'dg_buocnhay' => $request->dg_buocnhay,
            'dg_giamax' => $request->dg_giamax,
            'sp_id' => $id,
            'ch_id' => $store->ch_id,
            'dg_trangthai' => 1
        ];
        $insert = Daugia::insert($data);
        $alert = $this->success("Tạo sản phẩm thành công");
        return redirect()->back()->with('msg',$alert);
    }
}
