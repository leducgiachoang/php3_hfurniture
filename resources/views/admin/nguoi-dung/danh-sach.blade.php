

@extends('master.back-endMaster')
@section('xcontent')
@section('title')
    Danh sách người dùng
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif
<div class="list-group-item list-group-item-action active">
  <div class="navbar row">
    <b class="navbar-brand">Danh sách người dùng</b>
    
    <div style="float: right" class="col-lg-3">
      
      <form method="POST" action="admin/nguoi-dung/timkiem" class="form-inline">
        @csrf
        <input name="tukhoa" class="form-control col-lg-12" type="search" placeholder='Từ khóa tìm kiếm'>
      </form>
    </div>
  </div>   
</div>
<table class="table table-hover">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Họ và tên</th>
       <th scope="col">Ảnh đại điện</th>
       <th scope="col">Email</th>
       <th scope="col">Số điện thoại</th>
       <th scope="col">Tình trạng</th>
       <th scope="col">Vai trò</th>
       <th scope="col"></th>
       <th scope="col"></th>
     </tr>
   </thead>
   <tbody>
     <style>
       .nutbat{
         background:none;
         border: none;
       }
     </style>
       @foreach ($db as $item)
         <tr>
           <th scope="row">{{ $item ->id }}</th>
           <td>{{ $item ->HoTen }}</td>
           <td><img width="50" src="public/images/users/{{ $item ->AnhDaiDien }}" alt=""></td>
           <td>{{ $item ->email }}</td>
           <td>{{ $item ->SoDienThoai }}</td>
           <td>
                @if (($item ->trangthai->id)==2)
                <form method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <input type="hidden" name="hoten" value="{{ $item->HoTen }}">
                  <input type="hidden" name="username" value="{{ $item->TenTK }}">
                  <input type="hidden" name="matkhau" value="{{ $item->password }}">
                  <input type="hidden" name="email" value="{{ $item->email }}">
                  <input type="hidden" name="sodienthoai" value="{{ $item->SoDienThoai }}">
                  <input type="hidden" name="anhdaidien" value="{{ $item->AnhDaiDien }}">
                  <input type="hidden" name="id_trang_thai" value="1">
                  <input type="hidden" name="remember_token" value="{{ $item->remember_token }}">
                  <input type="hidden" name="id_vai_tro" value="{{ $item->id_vai_tro }}">
                  <button class="nutbat" type="submit"><i style="font-size: 30px" class="fa fa-toggle-off" aria-hidden="true"></i></button>
                </form>
                
                @else
                <form method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <input type="hidden" name="hoten" value="{{ $item->HoTen }}">
                  <input type="hidden" name="username" value="{{ $item->TenTK }}">
                  <input type="hidden" name="matkhau" value="{{ $item->password }}">
                  <input type="hidden" name="email" value="{{ $item->email }}">
                  <input type="hidden" name="sodienthoai" value="{{ $item->SoDienThoai }}">
                  <input type="hidden" name="anhdaidien" value="{{ $item->AnhDaiDien }}">
                  <input type="hidden" name="id_trang_thai" value="2">
                  <input type="hidden" name="remember_token" value="{{ $item->remember_token }}">
                  <input type="hidden" name="id_vai_tro" value="{{ $item->id_vai_tro }}">
                  <button class="nutbat" type="submit"><i style="font-size: 30px;color: green" class="fa fa-toggle-on" aria-hidden="true"></i> </button>
                </form>
                 
                @endif
           </td>
           <td>{{ $item ->vaitro->TenVaiTro }}</td>

           <td><a class="btn btn-success" href="admin/nguoi-dung/sua/{{ $item->id }}">Sửa</a></td>
           <td><a class="btn btn-warning" href="admin/nguoi-dung/xoa/{{ $item->id }}">Xóa</a></td>
         </tr>
       @endforeach
     
     
   </tbody>
 </table>
 
 <a class="btn btn-primary" href="admin/nguoi-dung/them">Thêm mới</a>
 {{ $db->links() }}
 
@endsection 
