<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getList()
    {
        $store = $this->getStore();
        $data = Donhang::where('ch_id', $store->nd_id)
        // ->where('dh_trangthai',1)
        ->get();
        return view('store.order.index', compact('data'));
    }

    public function update(Request $request,Donhang $donhang)
    {
        $donhang->update([
            'dh_trangthai'=>$request->dh_trangthai
        ]);

        return back();
    }
}
