<?php

namespace App\Http\Controllers;

use App\Models\Cuahang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function shoplist(Request $request)
    {
        $shoplist=Cuahang::all();

        return view('shoplist',compact('shoplist'));
    }
}
