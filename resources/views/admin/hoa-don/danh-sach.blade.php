

@extends('master.back-endMaster')
@section('xcontent')
@section('title')
    Danh sách Hóa đơn
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif
<div style="text-align: right"> {{ $db->links() }}</div>
<div class="list-group-item list-group-item-action active">
  <div class="navbar row">
    <b class="navbar-brand">Danh các đơn đặt hàng</b>
    
    <div style="float: right" class="row col-lg-6">
     <div class="col-lg-8">
      <form method="POST" action="admin/hoa-don/timkiem" class="form-inline">
        @csrf
        <input name="tukhoa" class="form-control col-lg-12" type="search" placeholder='Từ khóa tìm kiếm'>
      </form>
     </div>
     <div class="col-lg-4">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tình trạng
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
          <a href="admin/hoa-don/tinh-trang/cho-xu-ly"><button class="dropdown-item" type="button">Chờ xử lý</button></a>
        <a href="admin/hoa-don/tinh-trang/dang-giao-hang"><button class="dropdown-item" type="button">Đang giao hàng</button></a>
        <a href="admin/hoa-don/tinh-trang/da-giao"><button class="dropdown-item" type="button">Đã giao hàng</button></a>
        <a href="admin/hoa-don/tinh-trang/da-huy"><button class="dropdown-item" type="button">Đã hủy</button></a>
        </div>
      </div>
     </div>
    </div>
  </div>   
</div>

    

<table class="table table-hover">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Tên người dùng</th>
       <th scope="col">Số điện thoại</th>
       <th scope="col">Email</th>
       <th scope="col">Tổng giá</th>
       <th scope="col">Tình trạng</th>
       <th scope="col"></th>
       <th scope="col"></th>
       <th scope="col"></th>
 
       
     </tr>
   </thead>
   <tbody>
       @foreach ($db as $item)
         <tr>
           <th scope="row">{{ $item ->id }}</th>
           <td>{{ $item->nguoidung->HoTen }}</td>
           <td>{{ $item ->nguoidung->SoDienThoai }}</td>
           <td>{{ $item ->nguoidung->email }}</td>
           <td>{{ number_format($item ->TongGia,2,",",".") }} VNĐ</td>
           <td>{{ $item ->tinhtrang->TinhTrangDonHang }}</td>
           <td>
             @if (($item->id_tinh_trang) == 1 )
             <form action="gio-hang/xac-nhan-tinh-trang" method="POST">
              @csrf
              <input type="hidden" name="id_hoa_don" value="{{ $item->id }}">
             <input type="hidden" value="4" name="id_tinh_trang">
             <input class="btn btn-outline-dark" type="submit" value="Hủy đơn">
            </form>
             @else
                 <p></p>
             @endif
           
           </td>
           <td><a class="btn btn-success" href="admin/hoa-don/chi-tiet/{{ $item ->id }}">Chi tiết</a></td>
           <td><a class="btn btn-warning" href="admin/hoa-don/xoa/{{ $item ->id }}">Xóa</a></td>
           
         </tr>
       @endforeach
     
     
   </tbody>
 </table>

 <a class="btn btn-primary" href="admin/san-pham/them">Thêm mới</a>

 
@endsection 
