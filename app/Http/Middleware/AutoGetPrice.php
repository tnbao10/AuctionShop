<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;
use DB;
use DateTime;
use Illuminate\Http\Request;
class AutoGetPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $now = Carbon::now();
        $daugia = DB::table('daugia')
        ->where('daugia.dg_thoigianketthuc','<=',new DateTime($now))
        ->where('dg_trangthai',1)->get();
        foreach ($daugia as $key => $value) {
            $chitietdaugia=DB::table('chitietdaugia')->join('daugia','daugia.dg_id','chitietdaugia.dg_id')->where('chitietdaugia.dg_id',$value->dg_id)->orderBy('ctdg_giatien', 'desc')->first();
            if($chitietdaugia){
                DB::table('giohang')->insert([
                    'gh_soluong'=>1,
                    'gh_dongia'=>$chitietdaugia->ctdg_giatien,
                    'nd_id'=>$chitietdaugia->nd_id,
                    'gh_ngaythem'=>$now,
                    'sp_id' => $chitietdaugia->sp_id
                ]);

                DB::table('daugia')->where('dg_id',$value->dg_id)->update([
                    'dg_trangthai'=>3
                ]);
            }
        }
        // $cart = DB::table('giohang')->get();
        // foreach ($cart as $key => $value) {
        //     # code...
        //     $cartCreatedDate = Carbon::create($value->gh_ngaythem)->subDays(3);
        //     if($cartCreatedDate < $date) {
        //         DB::table('giohang')->where('gh_id', $value->gh_id)->delete();
        //     }
        // }
        return $next($request);
    }
}
