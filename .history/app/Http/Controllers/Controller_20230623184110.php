<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cuahang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStore() {
        if (Auth::guard('nguoidung')->check()) {
            $id = Auth::guard('nguoidung')->user()->nd_id;
            $store = Cuahang::where('nd_id', $id)->first();
            return $store;
        }elseif(session('ch_id')!=null){
            $store = Cuahang::where('ch_id', session('ch_id'))->first();
            return $store;
        }
    }

    public function error($content) {
        $alert = '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Thông báo!</h5>'.$content.'</div>';
        return $alert;
    }


    public function success($content) {
        $alert = '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Thông báo!</h5>'.$content.'</div>';
        return $alert;
    }
}
