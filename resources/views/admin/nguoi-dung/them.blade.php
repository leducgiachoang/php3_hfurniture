

@extends('master.back-endMaster')

@section('xcontent')
@section('title')
    Thêm mới người dùng
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif

<form method="post" enctype="multipart/form-data">
    @csrf
   
    <div class="alert alert-primary" role="alert">
        Thêm người dùng
    </div>
   <div style="margin: auto" class="row col-lg-12">
    
    <div class="form-group col-lg-12">
        <label>ID người dùng</label>
        <input type="text" class="form-control input-group-text" placeholder="Tự động.." readonly>
      </div>
 
      <div class="form-group col-lg-12">
         <label>Họ và tên</label>
         <input name="hoten" type="text" class="form-control">
         @error('hoten')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
       </div>

       <div class="form-group col-lg-12">
        <label>Tên tài khoản</label>
        <input name="username" type="text" class="form-control">
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-lg-12">
        <label>Mật khẩu</label>
        <input name="matkhau" type="text" class="form-control">
        @error('matkhau')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-lg-12">
        <label>Nhập lại mật khẩu</label>
        <input name="matkhau2" type="text" class="form-control">
        @error('matkhau2')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-lg-12">
        <label>Email</label>
        <input name="email" type="text" class="form-control">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-lg-12">
        <label>Số điện thoại</label>
        <input name="sodienthoai" type="text" class="form-control">
        @error('sodienthoai')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      
        <div class="form-group col-lg-6">
            <label>Ảnh đại diện</label>
            <input name="anhdaidien" type="file" class="form-control">
            @error('anhdaidien')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group col-lg-6">
            <label>Vai trò</label>
            <select class="custom-select" name="id_vai_tro" >
              @foreach ($vaitro as $item)
              <option value="{{ $item->id }}">{{ $item->TenVaiTro }}</option>
              @endforeach
              
            </select>
            @error('id_vai_tro')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>       
   </div>
   <button type="submit" class="btn btn-primary">Thêm mới</button>
   <a class="btn btn-primary" href="admin/nguoi-dung/danh-sach">Danh sách</a>
     
     
    
    
   </form>

@endsection 

  




