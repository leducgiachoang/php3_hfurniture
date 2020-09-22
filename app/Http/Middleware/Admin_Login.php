<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin_Login
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
            $user = Auth::user();
            if($user->id_vai_tro == 1){
                return $next($request);
            }else{
                return redirect('taikhoan/dang-nhap')->with('thongbao','Vui lòng đăng nhập tài khoản Admin để tiến hành quản lý trang website !');
            }
            
        }else{
            return redirect('taikhoan/dang-nhap')->with('thongbao','Vui lòng đăng nhập tài khoản Admin để tiến hành quản lý trang website !');
        }
        
    }
}
