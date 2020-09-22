

@extends('master.back-endMaster')
@section('xcontent')
@section('title')
    Danh sách sản phẩm
@endsection
@if (session('thongbao'))
<div class="alert alert-danger">
 {{ session('thongbao') }}
</div>

@endif
<div class="list-group-item list-group-item-action active">
  <div class="navbar row">
    <b class="navbar-brand">Danh sách sản phẩm</b>
    
    <div style="float: right" class="col-lg-3">
      <form method="POST" action="admin/san-pham/timkiem" class="form-inline">
        @csrf
        <input name="tukhoa" class="form-control col-lg-12" type="search" placeholder='Từ khóa tìm kiếm'>
      </form>
    </div>
  </div>   
</div>
{{ $db->links() }}
<table class="table table-hover">
   <thead>
     <tr>
       <th scope="col">ID</th>
       <th scope="col">Tên sản phẩm</th>
       <th scope="col">Ảnh sản phẩm</th>
       <th scope="col">Giá</th>
       <th scope="col">Số lượt xem</th>
       <th scope="col">Số lượng</th>
       <th scope="col"></th>
       <th scope="col"></th>
       <th scope="col"></th>
       
     </tr>
   </thead>
   <tbody>
       @foreach ($db as $item)
         <tr>
           <th scope="row">{{ $item ->id }}</th>
           <td>{{ $item ->TenSP }}</td>
           <td><img width="50" src="public/images/sp/{{ $item ->AnhSP }}" alt=""></td>
           <td>{{ number_format($item ->GiaSP,2,",",".") }} VNĐ</td>
           <td>{{ $item ->SoLuotXem }}</td>
           <td>{{ $item ->SoLuong }}</td>
           <td><a class="btn btn-success" href="admin/san-pham/sua/{{ $item ->id }}">Sửa</a></td>
           <td><a class="btn btn-warning" href="admin/san-pham/xoa/{{ $item ->id }}">Xóa</a></td>
           <td><a href="san-pham/chi-tiet/{{ $item ->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
         </tr>
       @endforeach
     
     
   </tbody>
 </table>
 
 <a class="btn btn-primary" href="admin/san-pham/them">Thêm mới</a>
 
 
@endsection 
