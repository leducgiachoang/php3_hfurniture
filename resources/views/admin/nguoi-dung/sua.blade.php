

@extends('master.back-endMaster')

@section('xcontent')
@section('title')
    Sửa người dùng
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif

@foreach ($db as $i)
    

<form method="post" enctype="multipart/form-data">
    @csrf
   
    <div class="alert alert-primary" role="alert">
        Thêm người dùng
    </div>
   <div style="margin: auto" class="row col-lg-12">
    
    <div class="form-group col-lg-12">
        <label>ID người dùng</label>
        <input name="id" value="{{ $i->id }}" type="text" class="form-control input-group-text" placeholder="Tự động.." readonly>
        
      </div>
 
      <div class="form-group col-lg-12">
         <label>Họ và tên</label>
         <input value="{{ $i->HoTen }}" name="hoten" type="text" class="form-control">
         @error('hoten')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
       </div>

       <div class="form-group col-lg-12">
        <label>Tên tài khoản</label>
        <input value="{{ $i->TenTK }}" name="username" type="text" class="form-control">
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      
        <input value="{{ $i->password }}" name="matkhau" type="hidden" class="form-control">
        

      <div class="form-group col-lg-12">
        <label>Email</label>
        <input value="{{ $i->email }}" name="email" type="text" class="form-control">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group col-lg-12">
        <label>Số điện thoại</label>
        <input value="{{ $i->SoDienThoai }}" name="sodienthoai" type="text" class="form-control">
        @error('sodienthoai')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      
         <div class="form-group col-lg-3">
            <label>Ảnh đại diện</label>
            <input name="anhdaidienx" type="file" class="form-control">
            <input name="anhdaidien" value="{{ $i->AnhDaiDien }}"  type="hidden">
            @error('anhdaidienx')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          </div>

          <div class="form-group col-lg-3">
           <img width="100%" src="public/images/users/{{ $i->AnhDaiDien }}" alt="">
          </div>

          <div class="form-group col-lg-3">
            <label>Vai trò</label>
            <select class="custom-select" name="id_vai_tro" >
              <option selected value="{{ $i->id_vai_tro }}">{{ $i->vaitro->TenVaiTro }}</option>
              @foreach ($vaitro as $item)
              <option value="{{ $item->id }}">{{ $item->TenVaiTro }}</option>
              @endforeach
              
            </select>
            
        </div> 
        
        <div class="form-group col-lg-3">
          <label>Trạng thái người dùng</label>
          <select class="custom-select" name="id_trang_thai" >
            <option selected value="{{ $i->id_trang_thai  }}">{{ $i->trangthai->TrangThaiNguoiDung }}</option>
            @foreach ($trangthai as $tt)
            <option value="{{ $tt->id }}">{{ $tt->TrangThaiNguoiDung }}</option>
            @endforeach
            
          </select>
          
      </div>
      
   </div>
   <button type="submit" class="btn btn-primary">Cập nhập</button>
   <a class="btn btn-primary" href="admin/nguoi-dung/danh-sach">Danh sách</a>
     
     
    
    
   </form>
   @endforeach
@endsection 

  




