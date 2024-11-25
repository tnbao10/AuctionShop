<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\AuditPusherEvent;
use Toastr;
use DB;
class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function auditProgress(Request $request) {
        $audit = DB::table('daugia')->where('dg_id', $request->auditId)->first();
        $detail = DB::table('chitietdaugia')->where('dg_id', $request->auditId)->orderBy('ctdg_giatien', 'desc')->first();
        $buocNhay = 0;
        if ($detail != null) {
            # code...
            $buocNhay = $request->auditPrice - $detail->ctdg_giatien;
        }else {
            event(new AuditPusherEvent($request));
            toastr()->success('Đấu giá thành công');
            return redirect()->back();
        }

        if ($buocNhay < $audit->dg_buocnhay) {
            # code...
            toastr()->error('Giá tiền phải lớn hơn bước nhảy');
        }
        else {
            event(new AuditPusherEvent($request));
            toastr()->success('Đấu giá thành công');
        }
        return redirect()->back();
    }
}
