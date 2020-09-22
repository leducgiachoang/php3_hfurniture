@extends('master.font-endMaster')

@section('content')
@section('title')
    Lấy lại mật khẩu
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
              {{ session('thongbaook') }}
            </div>
          @endif
         <div class="alert alert-primary" role="alert">
            Cập nhập mật khẩu mới
          </div>
          
        <form method="post">
            @csrf
            
            <div class="form-group">
                <label for="exampleInputEmail1">
                  Mật khẩu mới
                </label>
                <input type="password" name="matkhau" class="form-control">
                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">
                  Nhập lại mật khẩu
                </label>
                <input type="password" name="matkhau2" class="form-control">
                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            
            

            <button type="submit" class="btn btn-primary">Cập nhập</button>
            <a style="margin: 0px 10px" class="btn btn-outline-primary" href="taikhoan/dang-nhap">Đăng nhập</a>
            <a style="margin: 0px 10px" class="btn btn-outline-primary" href="taikhoan/dang-ky">Đăng ký tài khoản</a>

            
          </form>
    </div>
    
</div>

@endsection