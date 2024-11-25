<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cuahang;
use App\Models\Donhang;
use App\Models\Nguoidung;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{
    public function revenue(Request $request)
    {
        $store = $this->getStore();
        $month = range(0, 12);
        $request->year ?? $request->year = Carbon::now()->year;
        foreach ($month as $key => $value) {
            $temp[$value] = Donhang::where(DB::raw('YEAR(dh_ngaytao)'), $request->year)
                ->where(DB::raw('MONTH(dh_ngaytao)'), '=', $value)
                ->where('ch_id', $store->ch_id)
                ->get('dh_tongtien');
            $data[$value] = $temp[$value]->sum('dh_tongtien');
        }
        $min = Donhang::selectRaw(DB::raw('MIN(dh_ngaytao) AS min'))->first();
        $range = ['min' => date('Y', strtotime($min->min)), 'max' => date('Y')];
        return view('store.stat.revenue', compact('data', 'range', 'request'));
    }

    public function product(Request $request)
    {
        $month = range(0, 12);
        $request->year ?? $request->year = Carbon::now()->year;
        $store = $this->getStore();

        foreach ($month as $key => $value) {
            $temp[$value] = Donhang::where(DB::raw('YEAR(dh_ngaytao)'), $request->year)
                ->where(DB::raw('MONTH(dh_ngaytao)'), '=', $value)
                ->where('ch_id', $store->ch_id)
                ->count();

            $data[$value] = $temp[$value];
        }
        $min = Donhang::selectRaw(DB::raw('MIN(dh_ngaytao) AS min'))->first();
        $range = ['min' => date('Y', strtotime($min->min)), 'max' => date('Y')];

        return view('store.stat.product', compact('data', 'range', 'request'));
    }

    public function order(Request $request)
    {
        $month = range(0, 12);
        $request->year ?? $request->year = Carbon::now()->year;
        $store = $this->getStore();

        foreach ($month as $key => $value) {
            $temp[$value] = Donhang::where(DB::raw('YEAR(dh_ngaytao)'), $request->year)
                ->where(DB::raw('MONTH(dh_ngaytao)'), '=', $value)
                ->where('ch_id', $store->ch_id)
                ->count();

            $data[$value] = $temp[$value];
        }
        $min = Donhang::selectRaw(DB::raw('MIN(dh_ngaytao) AS min'))->first();
        $range = ['min' => date('Y', strtotime($min->min)), 'max' => date('Y')];

        return view('store.stat.order', compact('data', 'range', 'request'));
    }

    public function user(Request $request)
    {
        $month = range(0, 12);
        $request->year ?? $request->year = Carbon::now()->year;

        foreach ($month as $key => $value) {
            $temp[$value] = Nguoidung::where(DB::raw('YEAR(nd_ngaytao)'), $request->year)
                ->where(DB::raw('MONTH(nd_ngaytao)'), '=', $value)
                ->count();

            $data[$value] = $temp[$value];
        }
        $min = Nguoidung::selectRaw(DB::raw('MIN(nd_ngaytao) AS min'))->first();
        $range = ['min' => date('Y', strtotime($min->min)), 'max' => date('Y')];

        return view('store.stat.user', compact('data', 'range', 'request'));
    }

    public function store(Request $request)
    {
        $request->month ?? $request->month = Carbon::now()->month;
        $request->year ?? $request->year = Carbon::now()->year;

            $data= 
                Cuahang::with('donhangs')->where(DB::raw('YEAR(ch_ngaytao)'), $request->year)
                ->where(DB::raw('MONTH(ch_ngaytao)'), '=', $request->month)->get()->sortBy(function($ch)
                {  $ch->count=$ch->count();
                    return $ch->count();
                });
        
        $min = Cuahang::selectRaw(DB::raw('MIN(ch_ngaytao) AS min'))->first();
        $range = ['min' => date('Y', strtotime($min->min)), 'max' => date('Y')];
        return view('store.stat.store', compact('data', 'range', 'request'));
    }
}
