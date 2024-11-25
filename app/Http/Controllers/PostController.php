<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $data = Baiviet::all();

        return view('admin.post.index',compact('data'));
    }

    public function create()
    {
        return view('admin.post.add');
    }

    public function store(Request $request)
    {
        $nameFile = $request->bv_hinhanh->getClientOriginalName('bv_hinhanh');
        $request->bv_hinhanh->move('upload/images/post',$nameFile);
        $request->merge(['qt_id'=> Auth::guard('quantrivien')->id()]);
        Baiviet::create(['bv_hinhanh'=>'upload/images/post/'.$nameFile,'bv_tieude'=>$request->bv_tieude,'bv_noidung'=>$request->bv_noidung,
        'qt_id'=> Auth::guard('quantrivien')->id()
    ]);

        return redirect()->route('post.index');
    }

    public function edit(Request $request,Baiviet $baiviet)
    {
        return view('admin.post.edit',compact('baiviet'));
    }

    public function update(Request $request,Baiviet $baiviet)
    {
        $nameFile = $request->bv_hinhanh->getClientOriginalName('bv_hinhanh');
        $request->bv_hinhanh->move('upload/images/post',$nameFile);
        $baiviet->update([
            'bv_hinhanh'=>'upload/images/post/'.$nameFile,
        'bv_tieude'=>$request->bv_tieude,
        'bv_noidung'=>$request->bv_noidung,
    ]);

        return redirect()->route('post.index');
    }

    public function delete(Request $request,Baiviet $baiviet)
    {
        $baiviet->delete();

        return redirect()->route('post.index');
    }

    public function list()
    {
        $data=Baiviet::paginate(9);

        return view("client.post.list",compact("data"));
    }

    public function detail(Baiviet $baiviet)
    {
        return view("client.post.detail",compact("baiviet"));
    }
}
