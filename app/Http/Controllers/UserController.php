<?php

namespace App\Http\Controllers;

use App\Models\Nguoidung;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser()
    {
        $data=Nguoidung::all();
        return view('listUser',compact('data'));
    }   
    
    public function updateUser(Request $request,Nguoidung $nguoidung)
    {
        $nguoidung->update($request->all());

        return back();
    }
}
