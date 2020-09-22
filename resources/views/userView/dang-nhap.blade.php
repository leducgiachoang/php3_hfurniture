@extends('master.font-endMaster')

@section('content')
@section('title')
    Đăng nhập tài khoản
@endsection
<div style="background-color: white;height: 150px;">
</div>

<div class="container">
    <div  class="bosxt col-lg-8">
          @if (session('thongbao'))
            <div class="alert alert-danger">
              {{ session('thongbao') }}
            </div>
          @endif

          @if (session('thongbaook'))
            <div class="alert alert-success">
              {{ session('thongbao') }}
            </div>
          @endif


        <div class="alert alert-primary" role="alert">
            Đăng nhập
          </div>
          
        <form method="post">
    @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email </label>
              <input type="email" name="email" class="form-control">
              @error('email')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="mat_khau" class="form-control">
              @error('mat_khau')
              <div class="alert alert-danger">{{ $message }}</div>
             @enderror
            </div>
            <div class="form-group form-check col-lg-6">
              <input name="nho" type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Ghi nhớ mật khẩu</label>
            </div>

            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            <a style="margin: 0px 10px" class="btn btn-outline-primary" href="taikhoan/dang-ky">Đăng ký tài khoản</a>

            <a style="margin: 0px 10px" class="btn-outline-primary" href="taikhoan/quen-mat-khau">Quên mật khẩu</a>
          </form>
    </div>
    
</div>

@endsection