@extends('master.font-endMaster')

@section('content')
@section('title')
    Quên mật khẩu
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
            Quên mật khẩu
          </div>
          
        <form method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">
                Vui lòng cung cấp Email của bạn để lấy lại mật khẩu nha !
              </label>
              <input type="email" name="email" class="form-control">
              @error('email')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            

            <button type="submit" class="btn btn-primary">Xác nhận</button>
            <a style="margin: 0px 10px" class="btn btn-outline-primary" href="taikhoan/dang-ky">Đăng ký tài khoản</a>

            
          </form>
    </div>
    
</div>

@endsection