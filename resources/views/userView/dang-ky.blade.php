@extends('master.font-endMaster')

@section('content')
<div style="background-color: white;height: 150px;">
</div>
@section('title')
    Đăng ký tài khoản
@endsection
<div class="container">
    <div  class="bosxt col-lg-8">
        <div class="alert alert-primary" role="alert">
            Đăng Ký
          </div>
          @if (session('thongbao'))
          <div class="alert alert-danger">
            {{ session('thongbao') }}
          </div>
 
          @endif
        <form method="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group">
              <label for="HoTen">Họ và tên</label>
              <input type='text' name="hoten" class="form-control">
              @error('hoten')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>
            <div class="form-group">
              <label>UserName</label>
              <input type="text" name="username" class="form-control">
              @error('username')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="matkhau" class="form-control">
                @error('matkhau')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="matkhau2" class="form-control">
                @error('matkhau2')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
                @error('email')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="tel" name="sodienthoai" class="form-control">
                @error('sodienthoai')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="anhdaidien" class="form-control">
                @error('anhdaidien')
               <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <input type="hidden" value="2" value="id_trang_thai">
            <input type="hidden" value="2" value="id_vai_tro">

            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Ghi nhớ tài khoản</label>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button><a style="margin: 0px 10px" class="btn btn-outline-primary" href="taikhoan/dang-nhap">Đăng nhập</a>
          </form>
    </div>
    
</div>

@endsection