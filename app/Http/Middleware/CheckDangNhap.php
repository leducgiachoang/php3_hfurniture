<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDangNhap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }else{
            return redirect('taikhoan/dang-nhap')->with('thongbao','Thông Báo! Bạn chưa đăng đăng nhập. Vui lòng đăng nhập và thử lại');
        
        }

        
    }
}
